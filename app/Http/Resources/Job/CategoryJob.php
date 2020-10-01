<?php

namespace App\Http\Resources\Job;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryJob extends JsonResource
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
            'category_name' => $this->category_name,
            'slug' => $this->slug,
        ];
    }
}
