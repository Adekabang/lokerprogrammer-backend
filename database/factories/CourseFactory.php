<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course\{Course, CategoryCourse};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Course::class, function (Faker $faker) {
    $course_name = $faker->companySuffix;
    return [
        'category_id' => factory(CategoryCourse::class),
        'course_name' => $course_name,
        'slug' => Str::slug($course_name),
        'course_author' => $faker->name,
        'label' => $faker->domainWord,
        'thumbnail' => 'assets/img/course/thumbnail.jpg',
        'description' => $faker->text(100),
        'status' => 'PENDING',
    ];
});
