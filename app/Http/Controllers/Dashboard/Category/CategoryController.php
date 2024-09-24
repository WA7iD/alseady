<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryRequest;
use App\Models\Category;
use App\Traits\FileManager;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:categories-read')->only('index');
        $this->middleware('permission:categories-create')->only('create', 'store');
        $this->middleware('permission:categories-update')->only('edit', 'update');
        $this->middleware('permission:categories-delete')->only('destroy');
    }
    public function index()
    {
        $categories = Category::paginate(10);
        return view('dashboard.site.categories.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('dashboard.site.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'profiles/users/images', $category->image);
        }
        $data['is_active'] = $request->is_active == 'on';

        $category->update($data);
        return redirect(route('categories.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'categories/images');
        }
        $data['is_active'] = $request->is_active == 'on';

        Category::create($data);
        return redirect(route('categories.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Category $category)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($category->image);
            $category->delete();
            DB::commit();
            return redirect()->route('categories.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('categories.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
