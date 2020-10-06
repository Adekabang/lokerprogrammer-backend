<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class MyLesson extends JsonResource
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
            'lesson_name' => $this->lessons->lesson_name,
            'lesson_episode' => $this->lessons->episode,
            'lesson_video' => $this->lessons->video,
            'lesson_duration' => $this->lessons->duration,
        ];
    }
}
