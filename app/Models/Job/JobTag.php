<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobTag extends Model
{
    protected $table = "job_tag";
    protected $fillable = ['job_id', 'tag_id'];

    public function tags()
    {
        return $this->hasMany(Tag::class, 'id', 'tag_id');
    }
}
