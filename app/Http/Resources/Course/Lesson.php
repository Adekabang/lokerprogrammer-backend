<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class Lesson extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_id' => $this->courses->id,
            'lesson_name' => $this->lesson_name,
            'episode' => $this->episode,
            'status' => $this->status,
            'video' => "https://www.youtube.com/embed/" . $this->video,
            'duration' => $this->duration
        ];
    }
}
