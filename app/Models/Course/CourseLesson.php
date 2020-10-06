<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    protected $fillable = ['course_id', 'lesson_name', 'slug', 'video', 'duration', 'episode', 'status'];

    public function courses()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function myCourse()
    {
        return $this->hasMany(MyCourse::class);
    }
}
