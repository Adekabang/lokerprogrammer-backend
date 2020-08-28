<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog\CategoryBlog;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CategoryBlog::class, function (Faker $faker) {
    $category_name = $faker->unique(true)->colorName;
    $slug = Str::slug($category_name);
    return [
        'category_name' => $category_name,
        'slug' => $slug
    ];
});
