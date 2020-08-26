<?php

use Illuminate\Database\Seeder;
use App\Models\Course\{Course, CategoryCourse};
use App\Models\Company\{Company, CategoryCompany};
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LessonSeeder::class);
        factory(User::class, 3)->create();
        factory(Course::class, 3)->create();
        factory(Company::class, 3)->create();
        factory(CategoryCourse::class)->create();
        factory(CategoryCompany::class)->create();
        $this->call(CoursePackageSeeder::class);
        $this->call(CoursePackageFeatureSeeder::class);
        $this->call(CompanyPackageSeeder::class);
        $this->call(CompanyPackageFeatureSeeder::class);
    }
}
