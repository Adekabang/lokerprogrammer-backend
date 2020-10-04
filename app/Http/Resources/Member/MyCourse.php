<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class MyCourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_name' => $this->courses->course_name,
            'course_author' => $this->courses->course_author,
            'label' => $this->courses->label,
            'thumbnail' => $this->courses->thumbnail,
            'description' => $this->courses->description,
            'lesson_name' => $this->lessons->lesson_name,
            'lesson_episode' => $this->lessons->episode,
            'lesson_video' => $this->lessons->video,
            'lesson_duration' => $this->lessons->duration,
        ];
    }
}
