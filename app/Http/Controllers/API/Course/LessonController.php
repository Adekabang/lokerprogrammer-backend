<?php

namespace App\Http\Controllers\API\Course;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course\CourseLesson;
use App\Http\Resources\Course\Lesson as LessonResource;

class LessonController extends BaseController
{

    public function index()
    {
        $courses = CourseLesson::all();
        return $this->sendResponse(LessonResource::collection($courses), 'Lessons retrieved successfully.');
    }

    public function showLesson($slug)
    {
        $course = CourseLesson::where('slug', $slug)->first();
        if (is_null($course)) {
            return $this->sendError('Lesson not found.');
        }

        return $this->sendResponse(new LessonResource($course), 'Lesson retrieved successfully.');
    }
}
