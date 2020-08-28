<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $guarded = [];

    public function job_lists()
    {
        return $this->belongsTo(JobList::class, 'category_id', 'id');
    }
}
