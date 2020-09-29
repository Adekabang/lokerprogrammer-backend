<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_skills')->insert([
            [
                'id' => 1,
                'members_id' => 1,
                'category_skills_id' => 1,
                'skill_name' => 'React Native',
                'skills_persentase' => '98%',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'members_id' => 2,
                'category_skills_id' => 2,
                'skill_name' => 'Laravel, vue js',
                'skills_persentase' => '75%',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'members_id' => 3,
                'category_skills_id' => 3,
                'skill_name' => 'Laravel, vue js, React js, Restfull API',
                'skills_persentase' => '70%',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);
    }
}
