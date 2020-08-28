<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Job\{JobList, JobCategory};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(JobList::class, function (Faker $faker) {
    $name = $faker->unique(true)->sentence($nbWords = 6, $variableNbWords = true);
    $slug = Str::slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
        'category_id' => function(){
                            return JobCategory::all()->random();
                            },
        'requirement' => $faker->sentence($nbWords = 7, $variableNbWords = true),
        'required_skill' => $faker->sentence($nbWords = 9, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true)
    ];
});
