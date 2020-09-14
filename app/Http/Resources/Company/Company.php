<?php

namespace App\Http\Resources\Company;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
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
           'company_name' => $this->company_name,
           'slug' => $this->slug,
           'logo' => $this->logo,
           'location' => $this->location,
            'contact' => $this->contact,
            'description' =>$this->description,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
       ];
    }
}
