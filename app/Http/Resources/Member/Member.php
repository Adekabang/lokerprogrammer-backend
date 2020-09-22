<?php

namespace App\Http\Resources\Member;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Member extends JsonResource
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
            'profesi' => $this->profesi,
            'no_handphone' => $this->no_handphone,
            'about' => $this->about,
            'address' => $this->address,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
            'user' => $this->user
        ];
    }
}