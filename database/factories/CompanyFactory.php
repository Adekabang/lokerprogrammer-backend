<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company\{Company, CategoryCompany};
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    $company_name = $faker->unique(true)->company;
    $slug = Str::slug($company_name);
    return [
        'category_id' => function () {
            return CategoryCompany::all()->random();
        },
        'users_id' => function () {
            return User::all()->random();
        },
        'company_name' => $company_name,
        'slug' => $slug,
        'logo' => 'assets/img/company/thumbnail.jpg',
        'location' => $faker->streetAddress,
        'contact' => $faker->phoneNumber,
        'description' => $faker->text(100),
        'status' => 'NON-ACTIVATED',
    ];
});
