<?php

namespace App\Models\Company;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyTransaction extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_packages_id', 'users_id', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [];
    protected $dates = ['deleted_at'];

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
