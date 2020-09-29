<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->namespace('API')
    ->group(function () {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');

        //Members
        Route::namespace('Member')
            ->middleware('auth:api')
            ->group(function () {
                Route::get('all-member', 'MemberController@index')->name('show-all-member');
                Route::get('detail-member', 'MemberController@detailMember')->name('show-member');

                //Member Socials
                Route::get('member-social', 'MemberSocialController@index')->name('member-social');
                Route::put('update-social', 'MemberSocialController@updateMemberSocial')->name('update-member-social');

                //Member Certifications
                Route::get('member-certification', 'MemberCertificationController@index')->name('member-certification');
                Route::post('update-certification', 'MemberCertificationController@updateMemberCertification')->name('update-member-certification');

                //Member Education
                Route::get('member-education',  'MemberEducationController@index')->name('member-education');
                Route::post('update-education/{id}', 'MemberEducationController@updateMemberEducation')->name('update-member-education');

                //Member Experience
                Route::get('member-experience', 'MemberExperienceController@index')->name('member-experience');
                Route::post('update-experience/{id}', 'MemberExperienceController@updateMemberExperience')->name('update-member-experience');
            });
        // Start Routing salah tempat
        //Member Language
        Route::get('member-language', 'MemberLanguage\LanguageController@index');
        Route::post('member-language/{id}', 'MemberLanguage\LanguageController@updateLanguage');

        // skills
        Route::resource('memberSkills', 'MemberSkills\SkillsController');
        Route::resource('categorySkill', 'MemberSkills\CategorySkillsController');
        Route::put('update-memberSkills/{id}', 'MemberSkills\SkillsController@update')->name('update-memberSkills');
        // End Routing salah tempat


        //For Authenticated User or Member
        Route::middleware('auth:api')->group(function () {
            Route::post('logout', 'AuthController@logout');
            Route::get('show', 'UserController@show');
            Route::get('/lesson/{slug}', 'Course\LessonController@showLesson');
            Route::resource('lesson', 'Course\LessonController');
        });

        // Courses
        Route::get('/course/search/{keyword}', 'Course\CourseController@search');
        Route::get('/course/{slug}', 'Course\CourseController@showCourse');
        Route::get('/courseCategory/{slug}', 'Course\CategoryController@showCategory');
        Route::get('/coursePackage/{slug}', 'Course\PackageController@showPackage');
        Route::resource('course', 'Course\CourseController');
        Route::resource('courseCategory', 'Course\CategoryController');
        Route::resource('courseSubCategory', 'Course\SubCategoryController');
        Route::resource('coursePackage', 'Course\PackageController');

        // Blog
        Route::resource('blog', 'Blog\BlogController');
        Route::resource('blogCategory', 'Blog\CategoryController');
        Route::get('blog/search/{keyword}', 'Blog\BlogController@search');

        // company
        Route::resource('company', 'Company\CompanyController');
        Route::resource('companyCategory', 'Company\CategoryController');
        Route::resource('companyPackage', 'Company\PackageController');
        Route::resource('companyPackageFeature', 'Company\PackageFeatureController');
        Route::get('company/search/{keyword}', 'Company\CompanyController@search');

        // Job
        Route::resource('job', 'Job\JobController');
        Route::resource('jobTag', 'Job\TagController');
        Route::resource('jobCategory', 'Job\CategoryController');
        Route::resource('jobTagDetail', 'Job\TagDetailController');
        Route::get('job/search/{keyword}', 'Job\JobController@search');
        Route::get('apply', 'Job\ApplyController@index');
        Route::post('apply/{id}', 'Job\ApplyController@update');
    });
