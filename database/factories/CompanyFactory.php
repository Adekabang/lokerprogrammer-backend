<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company\{Company, CategoryCompany};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    $company_name = $faker->unique()->companySuffix;
    $slug = Str::slug($company_name);
    return [
        'category_id' => factory(CategoryCompany::class),
        'company_name' => $company_name,
        'slug' => $slug,
        'logo' => 'assets/img/company/thumbnail.jpg',
        'location' => $faker->address,
        'contact' => $faker->phoneNumber,
        'description' => $faker->text(100),
        'status' => 'NON-ACTIVATED',
    ];
});
