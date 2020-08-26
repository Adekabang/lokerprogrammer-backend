<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company\CategoryCompany;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CategoryCompany::class, function (Faker $faker) {
    $category_name = $faker->unique()->safeColorName;
    $slug = Str::slug($category_name);
    return [
        'category_name' => $category_name,
        'slug' => $slug
    ];
});
