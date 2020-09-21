<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Member extends Model
{
    protected $fillable = ['users_id', 'profesi', 'no_handphone', 'about', 'address', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
