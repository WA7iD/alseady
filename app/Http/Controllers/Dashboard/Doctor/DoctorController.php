<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Doctor\DoctorRequest;
use App\Models\Doctor;
use App\Traits\FileManager;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:doctors-read')->only('index');
        $this->middleware('permission:doctors-create')->only('create', 'store');
        $this->middleware('permission:doctors-update')->only('edit', 'update');
        $this->middleware('permission:doctors-delete')->only('destroy');
    }
    public function index()
    {
        $doctors = Doctor::paginate(10);
        return view('dashboard.site.doctors.index', compact('doctors'));
    }

    public function edit(Doctor $Doctor)
    {
        return view('dashboard.site.doctors.edit', compact('Doctor'));
    }

    public function update(DoctorRequest $request, Doctor $Doctor)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'profiles/users/images', $Doctor->image);
        }
        $data['is_active'] = $request->is_active == 'on';

        $Doctor->update($data);
        return redirect(route('doctors.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.doctors.create');
    }

    public function store(DoctorRequest $request)
    {
        $data =   $request->validated();

        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'doctors/images');
        }

        $data['is_active'] = $request->is_active == 'on';
        Doctor::create($data);
        return redirect(route('doctors.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Doctor $Doctor)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($Doctor->image);
            $Doctor->delete();
            DB::commit();
            return redirect()->route('doctors.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('doctors.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
