<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\Doctor\DoctorResource;
use App\Models\Doctor;
use App\Traits\Responser;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use Responser;

    public function index(Request $request)
    {
        $doctors = Doctor::active()
        ->when($request->filled('category_id'), function ($query) use ($request) {
            return $query->where('category_id', $request->category_id);
        })
        ->when($request->filled('text'), function ($query) use ($request) {
    
            return $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->text}%")
                    ->orWhere('description', 'like', "%{$request->text}%")
                    ->orWhereHas('category', function ($q) use ($request) {
                        $q->where('title_ar', 'like', "%{$request->text}%")
                          ->orWhere('title_en', 'like', "%{$request->text}%")
                          ->orWhere('description_ar', 'like', "%{$request->text}%")
                          ->orWhere('description_en', 'like', "%{$request->text}%");
                    });
            });
        })
        ->paginate(8);
        $doctors_data =  DoctorResource::collection($doctors)->response()->getData(true);
        return $this->returnData('data', $doctors_data);
    }

    public function show($id)
    {
        $Doctor = Doctor::where('id', $id)->active()->first();
        if ($Doctor) {
            $Doctor = new DoctorResource($Doctor);
            return $this->returnData('data', $Doctor);
        } else {
            return $this->returnError('404', __('dashboard.not_found'));
        }
    }
}
