<?php

namespace App\Http\Resources\Company;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageFeatur extends JsonResource
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
            'company_packages_id' => $this->company_packages_id,
            'feature_name' => $this->feature_name,
        ];
    }
}
