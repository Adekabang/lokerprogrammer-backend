<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Job\CategoryJob;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CategoryJob::class, function (Faker $faker) {
    $category_name = ucfirst($faker->unique(true)->colorName);
    $slug = Str::slug($category_name);
    return [
        'category_name' => $category_name,
        'slug' => $slug
    ];
});
