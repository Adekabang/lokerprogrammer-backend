<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class Blog extends JsonResource
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
            'judul_blog' => $this->judul_blog,
            'slug_blog_id' => $this->slug_blog_id,
            'content_blog' => $this->content_blog,
            'image' => $this->images,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
