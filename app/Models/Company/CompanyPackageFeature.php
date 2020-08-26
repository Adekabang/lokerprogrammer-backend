<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyPackageFeature extends Model
{
    protected $fillable = ['company_packages_id', 'feature_name'];

    public function companyPackage()
    {
        return $this->hasOne(CompanyPackage::class, 'id', 'company_packages_id');
    }
}
