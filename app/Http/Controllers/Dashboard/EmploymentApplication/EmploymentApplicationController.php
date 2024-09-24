<?php

namespace App\Http\Controllers\Dashboard\EmploymentApplication;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\EmploymentApplication;

class EmploymentApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employment_applications-read')->only('index', 'show');
        $this->middleware('permission:employment_applications-delete')->only('destroy');
    }

    public function index()
    {
        $employment_applications = EmploymentApplication::orderBy("created_at", 'DESC')->paginate();
        return view('dashboard.site.EmploymentApplications.index', [
            'employment_applications' => $employment_applications
        ]);
    }

    public function show(EmploymentApplication $employment_application)
    {

        return view('dashboard.site.EmploymentApplications.show', [
            'employment_application' => $employment_application
        ]);
    }

    public function destroy(EmploymentApplication $employment_applications)
    {
        // DB::beginTransaction();
        // try {
            $employment_applications->delete();
    
            return redirect()->route('employment_applications.index')->with('success', __('messages.deleted successfully'));
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     return redirect()->route('EmploymentApplications.show',  $employment_applications->id)->with(['error' => __('messages.Something went wrong')]);
        // }
    }
}
