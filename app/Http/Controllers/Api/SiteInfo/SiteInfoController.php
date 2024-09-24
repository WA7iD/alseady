<?php

namespace App\Http\Controllers\Api\SiteInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SiteInfo\SiteInfoRequest;
use App\Http\Resources\Web\SiteInfoResource;
use App\Models\SiteInfo;
use App\Traits\FileManager;
use App\Traits\Responser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Thenextweb\PassGenerator;

class SiteInfoController extends Controller
{
    use Responser;
    public function info()
    {
        $info = SiteInfo::first();
        $info = new SiteInfoResource($info);
        return $this->returnData('data',  $info);
    }
}
