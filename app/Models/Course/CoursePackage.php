<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class CoursePackage extends Model
{
    protected $fillable = ['package_name', 'price'];

    public function features()
    {
        return $this->belongsTo(CoursePackageFeature::class, 'id', 'course_packages_id');
    }
}
