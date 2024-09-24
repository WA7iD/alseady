<?php

namespace App\Http\Controllers\Dashboard\SiteInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SiteInfo\SiteInfoRequest;
use App\Models\SiteInfo;
use App\Traits\FileManager;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:settings-update')->only('edit', 'update');
    }


    public function edit()
    {
        $site_info = SiteInfo::first();
        return view('dashboard.site.site_infos.edit', compact('site_info'));
    }

    public function update(SiteInfoRequest $request)
    {
        $site_info = SiteInfo::first();
        $data =   $request->validated();
        if ($request->logo !== null) {
            $data['logo'] = $this->handle('logo', 'site_info', $site_info->logo);
        }
        if ($request->logo_footer !== null) {
            $data['logo_footer'] = $this->handle('logo_footer', 'site_info', $site_info->logo_footer);
        }
        if ($request->fav_icon !== null) {
            $data['fav_icon'] = $this->handle('fav_icon', 'site_info', $site_info->fav_icon);
        }

        $site_info->update($data);
        return redirect(route('site_info.edit'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }
}
