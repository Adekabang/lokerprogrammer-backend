<?php

namespace App\Http\Controllers\API\Course;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course\Course;
use App\Http\Resources\Course\Course as CourseResource;
use App\Http\Resources\Course\SearchCourse;
use Illuminate\Http\Request;

class CourseController extends BaseController
{

    public function index()
    {
        $courses = Course::with('category', 'subCategory')->get();
        return $this->sendResponse(CourseResource::collection($courses), 'Courses retrieved successfully.');
    }

    public function showCourse($slug)
    {
        $course = Course::with('category', 'subCategory')->where('slug', $slug)->first();

        if (is_null($course)) {
            return $this->sendError('Course not found.');
        }

        return $this->sendResponse(new CourseResource($course), 'Course retrieved successfully.');
    }

    public function search(Request $request, $keyword)
    {
        $courses = Course::with('category', 'subCategory')
            ->where('course_name', 'like', "%" . $keyword . "%")
            ->orWhere('course_author', 'like', '%' . $keyword . '%')
            ->get();
        // ->toArray();
        // return $courses;
        if (is_null($courses)) {
            return $this->sendError('Course not found.');
        }

        return $this->sendResponse(new SearchCourse($courses), 'Course retrieved successfully.');
    }
}
