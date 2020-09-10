<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LessonSeeder extends Seeder
{
    public function run()
    {
        DB::table('course_lessons')->insert([
            [
                'course_id' => 1,
                'lesson_name' => 'Bootstrap Fundamental',
                'slug' => Str::slug('Bootstrap Fundamental'),
                'video' => '6z-mmJa3NT0', // https://www.youtube.com/watch?v=6z-mmJa3NT0
                'duration' => '17:35',
                'episode' => 'Episode-1',
                'status' => 'PUBLISH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'course_id' => 2,
                'lesson_name' => 'Bootstrap Expert',
                'slug' => Str::slug('Bootstrap Expert'),
                'video' => 'z9UNSZf-0p0', // https://www.youtube.com/watch?v=z9UNSZf-0p0
                'duration' => '16:15',
                'episode' => 'Episode-2',
                'status' => 'PUBLISH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
