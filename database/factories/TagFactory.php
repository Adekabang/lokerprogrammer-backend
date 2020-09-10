<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Job\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    $tag_name = ucfirst($faker->unique(true)->colorName);
    $slug = Str::slug($tag_name);
    return [
        'tag_name' => $tag_name,
        'slug' => $slug
    ];
});
