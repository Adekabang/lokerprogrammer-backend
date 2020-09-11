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
        factory(User::class, 3)->create();
        $this->call(MemberSeeder::class);
        $this->call(CategoryBlogSeeder::class);
        factory(Blog::class, 3)->create();
        $this->call(CategoryCourseSeeder::class);
        $this->call(SubCategoryCourseSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CategoryCompanySeeder::class);
        factory(Company::class, 3)->create();
        $this->call(CategoryJobSeeder::class);
        $this->call(JobTagSeeder::class);
        $this->call(JobSeeder::class);
        factory(JobTag::class, 3)->create();
        $this->call(CoursePackageSeeder::class);
        $this->call(CoursePackageFeatureSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(CompanyPackageSeeder::class);
        $this->call(CompanyPackageFeatureSeeder::class);
    }
}
