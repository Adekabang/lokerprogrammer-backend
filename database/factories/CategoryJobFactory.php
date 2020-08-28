<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Job\JobCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(JobCategory::class, function (Faker $faker) {
    $category_name = $faker->unique(true)->colorName;
    $slug = Str::slug($category_name);
    return [
        'name' => $category_name,
        'slug' => $slug
    ];
});
