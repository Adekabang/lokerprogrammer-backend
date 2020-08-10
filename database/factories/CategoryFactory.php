<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course\CategoryCourse;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CategoryCourse::class, function (Faker $faker) {
    $category_name = $faker->safeColorName;
    return [
        'category_name' => $category_name,
        'slug' => Str::slug($category_name)
    ];
});
