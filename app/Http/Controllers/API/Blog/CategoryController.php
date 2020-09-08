<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\API\BaseController;
use App\Models\Blog\CategoryBlog;
use App\Http\Resources\Blog\Category as CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index(){

        $category = CategoryBlog::all();
        return $this->sendResponse(CategoryResource::collection($category),'Category Blog retrieved successfully.');
    }

    public function show($id){
        $category=CategoryBlog::find($id);

        if(is_null($category)){
            return $this->sendError('Category Blog Not Found.');
        }
        return $this->sendResponse(new CategoryResource($category),'Category Blog retrieved successfully.');
    }

}
