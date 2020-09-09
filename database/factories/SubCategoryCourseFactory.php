<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course\{SubCategoryCourse, CategoryCourse};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SubCategoryCourse::class, function (Faker $faker) {
    $subcategory_name = ucfirst($faker->unique(true)->safeColorName);
    $slug = Str::slug($subcategory_name);
    return [
        'category_id' => factory(CategoryCourse::class),
        'subcategory_name' => $subcategory_name,
        'slug' => $slug
    ];
});
