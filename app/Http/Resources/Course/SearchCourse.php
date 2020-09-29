<?php

namespace App\Http\Resources\Course;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchCourse extends JsonResource
{

    public function toArray($request)
    {
        $courses =  array();
        foreach ($this->resource as $course) {
            $courses[] = array(
                'id' => $course->id,
                'course_name' => $course->course_name,
                'course_author' => $course->course_author,
                'label' => $course->label,
                'thumbnail' => $course->thumbnail,
                'description' => $course->description,
                'category' => $course->category,
                'sub_category' => $course->subCategory
            );
        }
        return $courses;
    }
}
