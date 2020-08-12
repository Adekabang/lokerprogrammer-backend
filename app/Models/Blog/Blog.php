<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable =['judul_blog','slug_blog_id','category_id','content_blog','image'];

    public function category(){
        return $this->belongsTo('App\BlogCategory');
    }
}
