<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class MemberSocial extends Model
{
    protected $fillable = ['members_id', 'gmail', 'github', 'whatsapp', 'linkedin'];

    public function getRouteKeyName()
    {
        return 'members_id';
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'members_id');
    }
}
