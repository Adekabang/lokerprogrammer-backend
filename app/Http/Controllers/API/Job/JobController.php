<?php

namespace App\Http\Controllers\API\Job;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Job\Job;
use App\Http\Resources\Job\Job as JobResource;
use App\Http\Resources\Job\SearchJob;
use Illuminate\Http\Request;

class JobController extends BaseController
{
    public function index()
    {
        $job = Job::with('category', 'companies')->get();
        return $this->sendResponse(JobResource::collection($job), 'Job retrieved successfully');
    }

    public function show($slug)
    {
        $job = Job::with('category', 'companies')->where('slug', $slug)->first();

        if (is_null($job)) {
            return $this->sendError('Job not found');
        }

        return $this->sendResponse(new JobResource($job), 'Job retrieved successfully');
    }

    public function search(Request $request, $keyword)
    {
        $job = Job::with('companies', 'category')->where('name', 'like', '%' . $keyword . '%')->orWhere('location', 'like', '%' . $keyword . '%')->get();

        if (is_null($job)) {
            return $this->sendError('Job not found');
        }

        return $this->sendResponse(new SearchJob($job), 'Job retrieved successfully');
    }
}
