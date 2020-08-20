<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Category_blog extends Model
{
    protected $table='categori_blogs';
    protected $fillable =['category_name','slug'];

    public function categori()
    {
        return $this->hasMany(Blog::class);
    }
}
