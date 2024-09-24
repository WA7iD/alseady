<?php

namespace App\Http\Controllers\Api\EmploymentApplication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Web\EmploymentApplication\EmploymentApplicationRequest;
use App\Models\EmploymentApplication;
use App\Traits\FileManager;
use App\Traits\Responser;
use Illuminate\Http\Request;

class EmploymentApplicationController extends Controller
{
    use Responser, FileManager;
    public function store(EmploymentApplicationRequest $request)
    {
        $data = $request->validated();
        if ($request->cv !== null) {
            $data['cv'] = $this->handle('cv', 'employment_applications/cvs');
        }
        EmploymentApplication::create($data);
        return $this->returnSuccessMassage(__('dashboard.sent_successfully'));
    }
}
