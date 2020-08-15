<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    protected $guarded = [];

    public function job_categories()
    {
        return $this->hasMany(JobCategory::class, 'category_id','id');
    }
}
