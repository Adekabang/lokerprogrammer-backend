<?php

namespace App\Http\Controllers\API\Course;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course\Course;
use App\Http\Resources\Course\Course as CourseResource;

class CourseController extends BaseController
{

    public function index()
    {
        $courses = Course::all();

        return $this->sendResponse(CourseResource::collection($courses), 'Courses retrieved successfully.');
    }

    public function show($id)
    {
        $course = Course::find($id);

        if (is_null($course)) {
            return $this->sendError('Course not found.');
        }

        return $this->sendResponse(new CourseResource($course), 'Course retrieved successfully.');
    }
}