<?php

namespace App\Http\Resources\Skills;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Skills extends JsonResource
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
            'category_skills_id' => $this->category_skills_id,
            'skill_name' => $this->skill_name,
            'skills_persentase' => $this->skills_persentase,
            
        ];
    }
}
