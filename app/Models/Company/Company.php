<?php

namespace App\Models\Company;

use App\Models\Job\Job;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['users_id', 'category_id', 'company_name', 'slug', 'logo', 'location', 'contact', 'description', 'status'];

    public function category()
    {
        return $this->hasOne(CategoryCompany::class, 'id', 'category_id');
    }

    public function jobs()
    {
        return $this->belongsTo(Job::class);
    }
}
