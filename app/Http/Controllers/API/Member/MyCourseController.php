<?php

namespace App\Http\Controllers\API\Member;

use App\Models\Member\MyCourse;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Member\MyCourse as MyCourseResources;
use App\Http\Resources\Member\MyLesson as MyLessonResources;
use App\Models\Course\Course;
use App\Models\Course\CourseLesson;

class MyCourseController extends BaseController
{
    public function index()
    {
        $member = \auth()->user()->id;
        $myCourse = MyCourse::where('members_id', $member)->get();
        return $this->sendResponse(MyCourseResources::collection($myCourse), 'My courses retrieved successfully.');
    }

    public function showCourse($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $member = \auth()->user()->id;
        $myCourse = MyCourse::where('members_id', $member)->where('courses_id', $course->id)->firstOrFail();
        if (is_null($myCourse)) {
            return $this->sendError('Course not found.');
        }

        return $this->sendResponse(new MyCourseResources($myCourse), 'Course retrieved successfully.');
    }

    public function showLesson($slug)
    {
        $member = \auth()->user()->id;
        $course = Course::where('slug', $slug)->firstOrFail();
        $lesson = CourseLesson::where('course_id', $course->id)->get();
        $myCourse = MyCourse::where('members_id', $member)->where('courses_id', $lesson->first()->course_id)->get();

        if (is_null($myCourse)) {
            return $this->sendError('Course not found.');
        }

        return $this->sendResponse(MyLessonResources::collection($myCourse), 'My courses retrieved successfully.');
    }

    public function watchLesson($slug, $episode)
    {
        $member = \auth()->user()->id;
        $course = Course::where('slug', $slug)->firstOrFail();
        $lesson = CourseLesson::where('course_id', $course->id)->where('episode', $episode)->firstOrFail();
        $myCourse = MyCourse::where('members_id', $member)->where('lessons_id', $lesson->id)->first();

        if (is_null($myCourse)) {
            return $this->sendError('Course not found.');
        }

        return $this->sendResponse(new MyLessonResources($myCourse), 'Course retrieved successfully.');
    }
}
