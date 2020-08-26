<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guard = [];

    public function category()
    {
        return $this->hasOne(CategoryCompany::class, 'id', 'category_id');
    }
}
