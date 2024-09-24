<?php

namespace App\Http\Controllers\Api\Position;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\Position\PositionResource;
use App\Models\Position;
use App\Traits\Responser;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    use Responser;
    public function index()
    {
        $positions = Position::isTopLevel()->get();
        $positions_data =  PositionResource::collection($positions);
        return $this->returnData('data', $positions_data);
    }
}
