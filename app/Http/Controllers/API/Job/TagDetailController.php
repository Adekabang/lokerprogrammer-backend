<?php

namespace App\Http\Controllers\API\Job;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Job\Tag;
use App\Http\Resources\Job\Tag as TagResource;
use Illuminate\Http\Request;

class TagDetailController extends BaseController
{
    public function index()
    {
        //
        $tag = Tag::all();
        return $this->sendResponse(TagResource::collection($tag), 'Tag retrieved successfully');
    }

    public function show($slug)
    {
        //
        $tag = Tag::where('slug', $slug)->first();
        
        if(is_null($tag)){
            return $this->sendError('Tag no found');
        }

        return $this->sendResponse(new TagResource($tag), 'Tag retrieved successfully');
    }
}
