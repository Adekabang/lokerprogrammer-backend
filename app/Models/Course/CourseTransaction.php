<?php

namespace App\Models\Course;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CourseTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_status'
    ];

    protected $hidden = [];
    protected $dates = ['deleted_at'];

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
