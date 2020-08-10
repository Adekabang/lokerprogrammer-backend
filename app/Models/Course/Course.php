<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guard = [];

    public function category()
    {
        return $this->hasOne(CategoryCourse::class, 'id', 'category_id');
    }
}
