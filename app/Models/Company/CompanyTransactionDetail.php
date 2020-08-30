<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyTransactionDetail extends Model
{
    protected $fillable = [
        'company_transactions_id', 'username'
    ];

    protected $hidden = [];

    public function transaction()
    {
        return $this->belongsTo(CompanyTransaction::class, 'company_transactions_id', 'id');
    }
}
