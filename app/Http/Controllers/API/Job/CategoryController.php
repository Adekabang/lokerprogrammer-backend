<?php

namespace App\Http\Controllers\API\Job;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Job\CategoryJob;
use App\Http\Resources\Job\CategoryJob as CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        $category = CategoryJob::all();
        return $this->sendResponse(CategoryResource::collection($category), 'Category Job retrieved successfully.');
    }

    public function show($slug)
    {
        $category = CategoryJob::where('slug', $slug)->first();

        if(is_null($category)){
            return $this->sendError('Category Job Not Found');
        }

        return $this->sendResponse(new CategoryResource($category), 'Category Job retrieved successfully');
    }

}
