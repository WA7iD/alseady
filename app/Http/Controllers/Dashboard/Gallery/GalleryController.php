<?php

namespace App\Http\Controllers\Dashboard\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Gallery\GalleryRequest;
use App\Models\Gallery;
use App\Traits\FileManager;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:Gallerys-read')->only('index');
        $this->middleware('permission:Gallerys-create')->only('create', 'store');
        $this->middleware('permission:Gallerys-update')->only('edit', 'update');
        $this->middleware('permission:Gallerys-delete')->only('destroy');
    }
    public function index()
    {
        $Gallerys = Gallery::paginate(10);
        return view('dashboard.site.Gallerys.index', compact('Gallerys'));
    }

    public function edit(Gallery $Gallery)
    {
        return view('dashboard.site.Gallerys.edit', compact('Gallery'));
    }

    public function update(GalleryRequest $request, Gallery $Gallery)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'profiles/users/images', $Gallery->image);
        }
        $data['is_active'] = $request->is_active == 'on';

        $Gallery->update($data);
        return redirect(route('Gallerys.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.Gallerys.create');
    }

    public function store(GalleryRequest $request)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'Gallerys/images');
        }
        $data['is_active'] = $request->is_active == 'on';

        Gallery::create($data);
        return redirect(route('Gallerys.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Gallery $Gallery)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($Gallery->image);
            $Gallery->delete();
            DB::commit();
            return redirect()->route('Gallerys.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('Gallerys.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
