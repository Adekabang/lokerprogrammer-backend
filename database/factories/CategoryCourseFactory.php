<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course\CategoryCourse;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CategoryCourse::class, function (Faker $faker) {
<<<<<<< HEAD:database/factories/CategoryFactory.php
    $category_name = $faker->safeColorName;
=======
    $category_name = $faker->unique(true)->safeColorName;
>>>>>>> master:database/factories/CategoryCourseFactory.php
    $slug = Str::slug($category_name);
    return [
        'category_name' => $category_name,
        'slug' => $slug
    ];
});
