<?php

namespace App\Models\Company;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'Company';

    public function user(){
        return $this->hasOne(User::class, 'user_id','id');
    }

    public function package(){
        return $this->hasOne(Package::class, 'id', 'package_id');
    }
}
