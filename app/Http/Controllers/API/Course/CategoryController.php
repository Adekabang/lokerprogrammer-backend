<?php

namespace App\Http\Controllers\API\Course;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course\CategoryCourse;
use App\Http\Resources\Course\Category as CategoryResource;

class CategoryController extends BaseController
{

    public function index()
    {
        $categories = CategoryCourse::all();

        return $this->sendResponse(CategoryResource::collection($categories), 'Course categories retrieved successfully.');
    }

    public function showCategory($slug)
    {
        $category = CategoryCourse::where('slug', $slug)->first();

        if (is_null($category)) {
            return $this->sendError('Category not found.');
        }

        return $this->sendResponse(new CategoryResource($category), 'Course category retrieved successfully.');
    }
}
