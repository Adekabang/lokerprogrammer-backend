<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Job\{Job, Tag, JobTag};
use Faker\Generator as Faker;

$factory->define(JobTag::class, function (Faker $faker) {
    return [
        'job_id' => function () {
            return Job::all()->random();
        },
        'tag_id' => function () {
            return Tag::all()->random();
        },

    ];
});
