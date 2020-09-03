<?php

namespace App\Models\Course;

use App\Models\Course\CategoryCourse;
use Illuminate\Database\Eloquent\Model;

class SubCategoryCourse extends Model
{
    protected $fillable = ['category_id', 'subcategory_name', 'slug'];

    public function category()
    {
        return $this->belongsTo(CategoryCourse::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
