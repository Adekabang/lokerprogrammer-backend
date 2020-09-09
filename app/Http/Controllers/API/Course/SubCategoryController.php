<?php

namespace App\Http\Controllers\API\Course;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course\SubCategoryCourse;
use App\Http\Resources\Course\SubCategory as SubCategoryResource;

class SubCategoryController extends BaseController
{

    public function index()
    {
        $subcategories = SubCategoryCourse::with('category')->get();

        return $this->sendResponse(SubCategoryResource::collection($subcategories), 'Sub category courses retrieved successfully.');
    }

    public function show($id)
    {
        $subcategory = SubCategoryCourse::find($id);

        if (is_null($subcategory)) {
            return $this->sendError('Sub category not found.');
        }

        return $this->sendResponse(new SubCategoryResource($subcategory), 'Sub category courses retrieved successfully.');
    }
}
