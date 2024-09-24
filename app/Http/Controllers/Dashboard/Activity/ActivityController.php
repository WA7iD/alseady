<?php

namespace App\Http\Controllers\Dashboard\Activity;

use Exception;
use App\Models\Activity;
use App\Traits\FileManager;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Activity\ActivityRequest;
use App\Models\ActivityImage;

class ActivityController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:activities-read')->only('index');
        $this->middleware('permission:activities-create')->only('create', 'store');
        $this->middleware('permission:activities-update')->only('edit', 'update');
        $this->middleware('permission:activities-delete')->only('destroy');
    }
    public function index()
    {
        $activties = Activity::with('Images')->paginate(10);
        return view('dashboard.site.activties.index', compact('activties'));
    }

    public function edit(Activity $activity)
    {
        return view('dashboard.site.activties.edit', compact('activity'));
    }

    public function update(ActivityRequest $request, Activity $activity)
    {

        $data = $request->except('images');
        $activity->update($data);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $image) {
                $path = $this->handle('images.' . $i, 'activity/images');
                ActivityImage::create([
                    'path' => $path,
                    'activity_id' => $activity->id
                ]);
            }
        }
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }


    public function create()
    {
        return view('dashboard.site.activties.create');
    }

    public function store(ActivityRequest $request)
    {

        $data = $request->except('images');
        $activity =   Activity::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $image) {
                $path = $this->handle('images.' . $i, 'activity/images');
                ActivityImage::create([
                    'path' => $path,
                    'activity_id' => $activity->id
                ]);
            }
        }
        return redirect(route('activities.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Activity $activity)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($activity->image);
            $activity->delete();
            DB::commit();
            return redirect()->route('activities.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('activities.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function activityImageDestroy($id)
    {
        $activity_image = ActivityImage::find($id);
        $this->deleteFile($activity_image->path);
        $activity_image->delete();
    }
}
