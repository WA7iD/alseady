<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Blog\BlogRequest;
use App\Models\Blog;
use App\Traits\FileManager;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:blogs-read')->only('index');
        $this->middleware('permission:blogs-create')->only('create', 'store');
        $this->middleware('permission:blogs-update')->only('edit', 'update');
        $this->middleware('permission:blogs-delete')->only('destroy');
    }
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('dashboard.site.blogs.index', compact('blogs'));
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.site.blogs.edit', compact('blog'));
    }

    public function update(blogRequest $request, Blog $blog)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'profiles/users/images', $blog->image);
        }
        $data['is_active'] = $request->is_active == 'on';

        $blog->update($data);
        return redirect(route('blogs.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.blogs.create');
    }

    public function store(BlogRequest $request)
    {
        $data =   $request->validated();
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'blogs/images');
        }
        $data['is_active'] = $request->is_active == 'on';

        Blog::create($data);
        return redirect(route('blogs.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Blog $blog)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($blog->image);
            $blog->delete();
            DB::commit();
            return redirect()->route('blogs.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('blogs.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
