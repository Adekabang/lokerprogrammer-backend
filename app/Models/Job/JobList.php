<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    protected $guarded = [];

    public function job_categories()
    {
        return $this->belongsTo(JobCategory::class, 'category_id', 'id');
    }
}
