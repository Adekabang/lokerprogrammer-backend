<?php

namespace App\Http\Resources\Member;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Social extends JsonResource
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
            'gmail' => $this->gmail,
            'github' => $this->github,
            'whatsapp' => $this->whatsapp,
            'linkedin' => $this->linkedin
        ];
    }
}
