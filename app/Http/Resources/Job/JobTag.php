<?php

namespace App\Http\Resources\Job;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class JobTag extends JsonResource
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
            'tag_id' => $this->tag_id,
        ];
    }
}
