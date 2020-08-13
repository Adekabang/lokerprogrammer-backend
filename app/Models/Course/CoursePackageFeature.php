<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class CoursePackageFeature extends Model
{
    protected $fillable = ['course_packages_id', 'feature_name'];

    public function coursePackge()
    {
        return $this->hasOne(CoursePackage::class, 'id', 'course_packages_id');
    }
}
