<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Blog\Blog;
use App\Http\Resources\Blog\Blog as BlogResource;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function index(){
        $blog=Blog::all();
        return $this->sendResponse(BlogResource::collection($blog),'Blog retrieved successfully.');
    }

    public function show($id){
        $blog=Blog::find($id);
        if (is_null($blog)) {
            return $this->sendError('Blog not found.');
        }
        return $this->sendResponse(new BlogResource($blog),'Blog retrieved seccessfully.');
    }
}
