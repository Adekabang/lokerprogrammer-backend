<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name', 'slug'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
