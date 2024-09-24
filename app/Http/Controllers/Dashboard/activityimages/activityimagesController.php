<?php

namespace App\Http\Controllers\Dashboard\activityimages;

use Exception;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use App\Models\ActivityImage;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Position\PositionRequest;
use App\Http\Requests\Dashboard\activityimages\activityimagesRequest;

class activityimagesController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:activityimages-read')->only('index');
        $this->middleware('permission:activityimages-create')->only('create', 'store');
        $this->middleware('permission:activityimages-update')->only('edit', 'update');
        $this->middleware('permission:activityimages-delete')->only('destroy');
    }
    public function index()
    {
        $activityimages = ActivityImage::paginate(10);
        return view('dashboard.site.activityimages.index', compact('activityimages'));
    }

    public function edit(ActivityImage $activityimage)
    {
        return view('dashboard.site.activityimages.edit', compact('activityimage'));
    }

    public function update(activityimagesRequest $request, ActivityImage $activityimage)
    {
        $data =   $request->validated();


        $activityimage->update($data);
        return redirect(route('activityimages.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.activityimages.create');
    }

    public function store(activityimagesRequest $request)
    {
        $data =   $request->validated();


        ActivityImage::create($data);
        return redirect(route('activityimages.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(ActivityImage $activityimage)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($activityimage->image);
            $activityimage->delete();
            DB::commit();
            return redirect()->route('activityimages.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('activityimages.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}


