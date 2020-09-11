<?php

use App\Models\Course\CategoryCourse;
use App\Models\Course\SubCategoryCourse;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'category_id' => 1,
                'sub_category_id' => 1,
                'course_name' => 'Laravel 8 From Scratch',
                'slug' => 'laravel-8-from-scratch',
                'course_author' => 'Parsinta',
                'label' => 'FREE',
                'thumbnail' => 'assets/img/course/thumbnail.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero soluta omnis vel dolor, itaque recusandae.',
                'status' => 'PUBLISH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 3,
                'course_name' => 'Bangun Aplikasi Pertama Anda dengan NodeJS',
                'slug' => 'bangun-aplikasi-pertama-anda-dengan-nodeJS',
                'course_author' => 'Buildwithangga.com',
                'label' => 'PREMIUM',
                'thumbnail' => 'assets/img/course/thumbnail.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero soluta omnis vel dolor, itaque recusandae.',
                'status' => 'PENDING',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 2,
                'course_name' => 'Menjadi Fullstack dengan TALL Stack',
                'slug' => 'menjadi-fullstack-dengan-tall-stack',
                'course_author' => 'Jr Comp',
                'label' => 'PREMIUM',
                'thumbnail' => 'assets/img/course/thumbnail.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero soluta omnis vel dolor, itaque recusandae.',
                'status' => 'PUBLISH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
