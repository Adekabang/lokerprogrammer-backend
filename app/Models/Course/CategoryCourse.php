<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    protected $fillable = ['category_name', 'slug'];

    public function subCategories()
    {
        return $this->hasMany(SubCategoryCourse::class);
    }
}
