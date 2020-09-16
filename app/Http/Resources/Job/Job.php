<?php

namespace App\Http\Resources\Job;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
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
            'category_id' => $this->category_id,
            'company_id' => $this->company_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'location' => $this->location,
            'requirement' => $this->requirement,
            'required_skill' => $this->required_skill,
            'description' => $this->description,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];
    }
}
