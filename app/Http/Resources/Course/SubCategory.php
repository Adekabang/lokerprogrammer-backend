<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategory extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category_name' => $this->category->category_name,
            'subcategory_name' => $this->subcategory_name
        ];
    }
}
