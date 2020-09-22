<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class MemberEducation extends Model
{
    protected $fillable = ['members_id', 'nama_sekolah', 'jenjang', 'bidang_studi', 'tanggal_masuk', 'tanggal_keluar'];

    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'members_id');
    }
}
