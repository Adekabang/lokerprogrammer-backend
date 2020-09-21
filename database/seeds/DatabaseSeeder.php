<?php

use App\Models\Blog\{Blog, CategoryBlog};
use Illuminate\Database\Seeder;
use App\Models\Course\{Course, CategoryCourse, SubCategoryCourse};
use App\Models\Company\{Company, CategoryCompany};
use App\Models\Job\{Job, CategoryJob, JobTag, Tag};
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
        $this->call(MemberSeeder::class);
        factory(Course::class, 3)->create();
        factory(Blog::class, 3)->create();
        factory(Company::class, 3)->create();
        factory(CategoryBlog::class)->create();
        factory(CategoryCourse::class)->create();
        factory(SubCategoryCourse::class)->create();
        factory(CategoryCompany::class)->create();
        factory(CategoryJob::class, 3)->create();
        factory(Tag::class, 3)->create();
        factory(Job::class, 3)->create();
        factory(JobTag::class, 3)->create();
        $this->call(CoursePackageSeeder::class);
        $this->call(CoursePackageFeatureSeeder::class);
        $this->call(CompanyPackageSeeder::class);
        $this->call(CompanyPackageFeatureSeeder::class);
    }
}
