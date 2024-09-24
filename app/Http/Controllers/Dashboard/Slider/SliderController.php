<?php

namespace App\Http\Controllers\Dashboard\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Slider\SliderRequest;
use App\Models\Slider;
use App\Traits\FileManager;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:settings-read')->only('index');
        $this->middleware('permission:settings-create')->only('create', 'store');
        $this->middleware('permission:settings-update')->only('edit', 'update');
        $this->middleware('permission:settings-delete')->only('destroy');
    }
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('dashboard.site.sliders.index', compact('sliders'));
    }

    public function edit(Slider $slider)
    {
        return view('dashboard.site.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'profiles/users/images', $slider->image);
        }
        $data['is_active'] = $request->is_active == 'on';

        $slider->update($data);
        return redirect(route('sliders.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'sliders/images');
        }
        $data['is_active'] = $request->is_active == 'on';

        Slider::create($data);
        return redirect(route('sliders.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Slider $slider)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($slider->image);
            $slider->delete();
            DB::commit();
            return redirect()->route('sliders.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('sliders.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
