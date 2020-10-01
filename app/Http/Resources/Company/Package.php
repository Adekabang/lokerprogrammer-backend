<?php

namespace App\Http\Resources\Company;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Package extends JsonResource
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
            'package_name' => $this->package_name,
            'price' => $this->price,
        ];
    }
}
