<?php

namespace App\Http\Controllers\Api\Activity;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\Activity\ActivityResource;
use App\Models\Activity;
use App\Traits\Responser;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use Responser;
   public function index()
{
    $activities = Activity::with('images')->get();

    if ($activities->isEmpty()) {
    }

    $activitys_data = ActivityResource::collection($activities);
    return $this->returnData('data', $activitys_data);
}

    public function show($id)
    {
        $activity = Activity::where('id', $id)->first();
        if ($activity) {
            $activity = new ActivityResource($activity);
            return $this->returnData('data', $activity);
        } else {
            return $this->returnError('404', __('dashboard.not_found'));
        }
    }
}
