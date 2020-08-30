<?php

namespace App\Models\Company;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CompanyTransaction extends Model
{
    protected $fillable = [
        'company_packages_id', 'users_id', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [];

    public function details()
    {
        return $this->hasMany(CompanyTransactionDetail::class, 'company_transactions_id', 'id');
    }
    public function company_package()
    {
        return $this->belongsTo(CompanyPackage::class, 'company_packages_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
