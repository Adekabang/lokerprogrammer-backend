<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // protected $table ='blogs';
    protected $fillable =['judul_blog','slug_blog_id','category_id','content_blog','image'];

    protected $guard = [];

    public function category(){
        return $this->belongsTo(CategoryBlog::class);
    }
    
}
