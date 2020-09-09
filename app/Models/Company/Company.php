<?php

namespace App\Models\Company;

use App\Models\Job\Job;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guard = [];

    public function category()
    {
        return $this->hasOne(CategoryCompany::class, 'id', 'category_id');
    }

    public function jobs()
    {
        return $this->belongsTo(Job::class);
    }
}
