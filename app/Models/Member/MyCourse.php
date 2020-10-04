<?php

namespace App\Models\Member;

use App\Models\Course\Course;
use App\Models\Course\CourseLesson;
use Illuminate\Database\Eloquent\Model;

class MyCourse extends Model
{
    protected $table = 'my_courses';
    protected $fillable = ['courses_id', 'lessons_id', 'members_id'];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'courses_id', 'id');
    }

    public function lessons()
    {
        return $this->belongsTo(CourseLesson::class, 'lessons_id', 'id');
    }

    public $timestamps = false;
}
