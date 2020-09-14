<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Blog\Blog;
use App\Http\Resources\Blog\Blog as BlogResource;
use App\Http\Resources\Blog\SearchBlog;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function index(){
        $blog=Blog::with('category')->get();
        return $this->sendResponse(BlogResource::collection($blog),'Blog retrieved successfully.');
    }

    public function show($id){
        $blog=Blog::with('category')->find($id);
        if (is_null($blog)) {
            return $this->sendError('Blog not found.');
        }
        return $this->sendResponse(new BlogResource($blog),'Blog retrieved seccessfully.');
    }

    public function search(Request $request, $keyword) {
        $blog = Blog::with('category')
                ->Where('judul_blog', 'like', "%". $keyword . "%")
                ->get();

        if (is_null($blog)) {
            return $this->sendError('Blog Not Found. ');
        }

        return $this->sendResponse(new SearchBlog($blog), 'Blog retrieved seccessfully.');
    }
}
