<?php

namespace App\Http\Resources\Company;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchCompany extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $companies =  array();
        foreach ($this->resource as $company) {
            $companies[] = array(
                'id' => $company->id,
                'category_id' => $company->category_id,
                'company_name' => $company->company_name,
                'slug' => $company->slug,
                'logo' => $company->logo,
                'location' => $company->location,
                 'contact' => $company->contact,
                 'description' =>$company->description,
                 'status' => $company->status,
                 'created_at' => Carbon::parse($company->created_at)->format('d-m-Y'),
                 'updated_at' => Carbon::parse($company->updated_at)->format('d-m-Y'),
            );
        }
        return $companies;
    }
}
