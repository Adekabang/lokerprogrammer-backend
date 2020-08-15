<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable =['judul_blog','slug_blog_id','category_id','content_blog','image'];

    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }
    public function slug(){
        return $this->belongsTo(BlogCategory::class);
    }
}
