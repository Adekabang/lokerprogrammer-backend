<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class MemberCertification extends Model
{
    protected $fillable = ['members_id', 'certification_name', 'description', 'attachment_image'];

    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'members_id');
    }
}
