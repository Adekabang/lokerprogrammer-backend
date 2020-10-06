<?php

namespace App\Models\Course;

use App\Models\Member\MyCourse;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guard = [];

    public function category()
    {
        return $this->hasOne(CategoryCourse::class, 'id', 'category_id');
    }

    public function subCategory()
    {
        return $this->hasOne(SubCategoryCourse::class, 'id', 'sub_category_id');
    }

    public function myCourse()
    {
        return $this->hasMany(MyCourse::class);
    }
}
