<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_name' => $this->course_name,
            'course_author' => $this->course_author,
            'label' => $this->label,
            'thumbnail' => $this->thumbnail,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'category' => $this->category,
            'sub_category' => $this->subCategory
        ];
    }
}
