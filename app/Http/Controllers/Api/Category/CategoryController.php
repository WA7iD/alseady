<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryRequest;
use App\Http\Resources\Web\CategoryResource;
use App\Models\Category;
use App\Traits\FileManager;
use App\Traits\Responser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
  use Responser;

  public function index()
  {
    $categories = Category::active()->get();
    $categories_data =  CategoryResource::collection($categories);
    return $this->returnData('data', $categories_data);
  }

  public function show($id)
  {
    $category = Category::where('id', $id)->active()->first();
    if ($category) {
      $category = new CategoryResource($category);
      return $this->returnData('data', $category);
    } else {
      return $this->returnError('404', __('dashboard.not_found'));
    }
  }
}
