<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyPackage extends Model
{
    protected $fillable = ['package_name', 'price'];

    public function features()
    {
        return $this->belongsTo(CompanyPackageFeature::class, 'id', 'company_packages_id');
    }
}
