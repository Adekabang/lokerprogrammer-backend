<?php

namespace App\Models\Company;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function package(){
        return $this->hasOne(Package::class, 'id', 'package_id');
    }
}
