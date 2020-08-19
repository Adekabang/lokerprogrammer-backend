<?php

namespace App\Models\Course;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CourseTransaction extends Model
{
    protected $fillable = [
        'course_packages_id', 'users_id', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [];

    public function details()
    {
        return $this->hasMany(CourseTransactionDetail::class, 'course_transactions_id', 'id');
    }
    public function course_package()
    {
        return $this->belongsTo(CoursePackage::class, 'course_packages_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
