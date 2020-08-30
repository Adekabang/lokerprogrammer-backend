<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;

class CompanyMembership extends Model
{
    protected $fillable = ['users_id', 'course_packages_id', 'expires_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function course_package()
    {
        return $this->belongsTo(CompanyPackage::class, 'course_packages_id', 'id');
    }
}
