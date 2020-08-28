<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog\{Blog, CategoryBlog};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Blog::class, function (Faker $faker) {
    $judul_blog = $faker->unique()->city;
    return [
        'category_id' => factory(CategoryBlog::class),
        'judul_blog' => $judul_blog,
        'slug_blog_id' => Str::slug($judul_blog),
        'content_blog' => $faker->text(100),
        'image' => 'assets/img/blog/thumbnail.jpg'
    ];
});
