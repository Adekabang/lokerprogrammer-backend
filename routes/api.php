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
                Route::resource('members', 'MemberController');
                Route::resource('memberSocial', 'MemberSocialController');
            });

        //For Authenticated User
        Route::middleware('auth:api')->group(function () {
            Route::post('logout', 'AuthController@logout');
            Route::get('show', 'UserController@show');
            Route::resource('lesson', 'Course\LessonController');
        });

        Route::get('/course/search/{keyword}', 'Course\CourseController@search');
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
    });
