<?php

namespace App\Http\Resources\Job;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchJob extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $jobs = array();
        foreach ($this->resource as $job) {
            $jobs[] = array(
                'id' => $job->id,
                'category_id' => $job->category_id,
                'company_id' => $job->company_id,
                'name' => $job->name,
                'slug' => $job->slug,
                'status' => $job->status,
                'location' => $job->location,
                'requirement' => $job->requirement,
                'required_skill' => $job->required_skill,
                'description' => $job->description,
                'created_at' => Carbon::parse($job->created_at)->format('d-m-Y'),
                'updated_at' => Carbon::parse($job->updated_at)->format('d-m-Y')
            );
        }
        return $jobs;
    }
}
