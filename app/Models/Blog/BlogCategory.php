<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable =['category_name','slug'];

    public function categori()
    {
        return $this->hasMany(Blog::class);
    }
}
