<?php

namespace App\Http\Resources\Blog;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchBlog extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $blogs = array();

        foreach($this->resource as $blog){
            $blogs[] =array(
            'id' => $blog->id,
            'category_id' => $blog->category_id,
            'judul_blog' => $blog->judul_blog,
            'slug_blog_id' => $blog->slug_blog_id,
            'content_blog' => $blog->content_blog,
            'image' => $blog->images,
            );
        }
        return $blogs;
    }
}
