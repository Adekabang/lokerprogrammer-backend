<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class CategoryJob extends Model
{
    protected $fillable = ['category_name', 'slug'];
}
