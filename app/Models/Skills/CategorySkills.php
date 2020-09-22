<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Model;

class CategorySkills extends Model
{
    protected $table = 'category_skills';
    protected $fillable=['category_name','slug'];

    public function categorySkill(){
        return $this->hasMany(Skills::class);
    }
}
