<?php

namespace App\Http\Controllers\API\Job;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Job\JobTag;
use App\Http\Resources\Job\JobTag as JobTagResource;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    public function index()
    {
        $jobTag = JobTag::with('tags')->get();
        return $this->sendResponse(JobTagResource::collection($jobTag), 'Job Tag retrieved successfully');
    }

    public function show($id)
    {
        $jobTag = JobTag::with('tags')->find($id);

        if(is_null($jobTag)){
            return $this->sendError('Job Tag Not Found.');
        }

        return $this->sendResponse(new JobTagResource($jobTag), 'Job Tag retrieved successfully');
    }
}
