<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class Package extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package_name' => $this->coursePackage->package_name,
            'feature_name' => $this->feature_name,
            'price' => $this->coursePackage->price
        ];
    }
}
