<?php

namespace App\Http\Controllers\API\Job;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Job\Job;
use App\Http\Resources\Job\Job as JobResource;
use App\Http\Resources\Job\SearchJob;
use Illuminate\Http\Request;

class JobController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $job = Job::with('category','companies')->get();
        return $this->sendResponse(JobResource::collection($job), 'Job retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $job = Job::with('category','companies')->find($id);

        if(is_null($job)){
            return $this->sendError('Job not found');
        }

        return $this->sendResponse(new JobResource($job), 'Job retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request, $keyword){
        $job = Job::with('companies','category')->where('name', 'like', '%' . $keyword . '%')->get();
        //toArray()
        //return $company

        if(is_null($job)){
            return $this->sendError('Job not found');
        }

        return $this->sendResponse(new SearchJob($job), 'Job retrieved successfully');
    }
}
