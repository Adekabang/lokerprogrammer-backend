<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company\Company;
use App\Models\Job\{Job, CategoryJob, JobTag};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Job::class, function (Faker $faker) {
    $name = $faker->unique(true)->sentence($nbWords = 6, $variableNbWords = true);
    $slug = Str::slug($name);
    $status = array("READY", "CLOSED");

    return [
        'name' => $name,
        'slug' => $slug,
        'category_id' => function () {
            return CategoryJob::all()->random();
        },
        'company_id' => function () {
            return Company::all()->random();
        },
        'status' => $status[array_rand($status)],
        'location' => $faker->address,
        'requirement' => $faker->sentence($nbWords = 7, $variableNbWords = true),
        'required_skill' => $faker->sentence($nbWords = 9, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true)
    ];
});
