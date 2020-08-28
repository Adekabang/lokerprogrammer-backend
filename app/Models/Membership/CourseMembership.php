<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;

class CourseMembership extends Model
{
    protected $fillable = ['users_id', 'course_packages_id', 'expires_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function course_package()
    {
        return $this->belongsTo(CoursePackage::class, 'course_packages_id', 'id');
    }
}
