<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Blog\BlogRequest;
use App\Http\Resources\Web\BlogResource;
use App\Models\Blog;
use App\Traits\FileManager;
use App\Traits\Responser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
  use Responser;

  public function index()
  {
    $blogs = Blog::active()->paginate(15);
    $blogs =  BlogResource::collection($blogs)->response()->getData(true);
    return $this->returnData('data', $blogs);
  }

  public function show($id)
  {
    $blog = Blog::where('id', $id)->active()->first();
    if ($blog) {
      $blog = new BlogResource($blog);
      return $this->returnData('data', $blog);
    } else {
      return $this->returnError('404', __('dashboard.not_found'));
    }
  }
}
