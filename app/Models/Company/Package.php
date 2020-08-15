<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';
    protected $fillable = ['package_name', 'price_package','package_expired'];

//    public function company(){
//        $this->hasOne(Company::class, 'package_id', 'id');
//    }
}
