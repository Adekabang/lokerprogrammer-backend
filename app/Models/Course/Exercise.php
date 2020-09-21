<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['course_id', 'question'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
