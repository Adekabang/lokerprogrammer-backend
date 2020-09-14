<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Company\CategoryCompany;
use App\Http\Resources\Company\Category as CategoryResource;

use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index() {
        $category = CategoryCompany::all();
        return $this->sendResponse(CategoryResource::collection($category),'Category Company retrieved successfully.');
    }

    public function show($id) {
        $category = CategoryCompany::find($id);

        if (is_null($category)) {
            return $this->sendError('Category Company Not Found.');
        }

        return $this->sendResponse(new CategoryResource($category), 'Category Company retrieved successfully.');
    }
}
