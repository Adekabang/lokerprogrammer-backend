<?php

namespace App\Models\Job;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guard = [];

    public function companies()
    {
        return $this->hasMany(Company::class, 'id', 'company_id');
    }

    public function category()
    {
        return $this->hasOne(CategoryJob::class, 'id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function job_tag()
    {
        return $this->belongsTo(JobTag::class);
    }
}
