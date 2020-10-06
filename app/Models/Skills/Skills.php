<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'member_skills';
    protected $fillable = ['category_skills_id', 'slug','members_id', 'skill_name', 'skills_persentase'];

    public function category_skills()
    {
        return $this->belongsTo(Skills::class);
    }
}
