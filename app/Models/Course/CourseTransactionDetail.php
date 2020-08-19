<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class CourseTransactionDetail extends Model
{
    protected $fillable = [
        'course_transactions_id', 'username'
    ];

    protected $hidden = [];

    public function transaction()
    {
        return $this->belongsTo(CourseTransaction::class, 'course_transactions_id', 'id');
    }
}
