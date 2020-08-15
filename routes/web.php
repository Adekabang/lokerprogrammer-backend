<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth', 'verified', 'admin'])
    ->group(function () {
        // Special Routing for Courses
        Route::namespace('course')
            ->group(function () {
                Route::get('/course/show', 'CourseController@showAll')->name('show-course');
                Route::resource('course', 'CourseController');
                Route::resource('coursePackage', 'CoursePackageController');
                Route::resource('coursePackageFeature', 'CoursePackageFeatureController');
                Route::resource('category', 'CategoryController');
                Route::resource('lesson', 'LessonController');
            });
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('company', 'Company\CompanyController');
        Route::resource('package', 'Company\PackageController');
        Route::resource('company', 'CompanyController');
        Route::resource('job', 'JobController');
        Route::resource('blog', 'BlogController');

        //Category Job
        Route::resource('category-job','JobCategoryController');
        Route::resource('joblist','JobListController');
        Route::post('category-job/getCategory','JobListController@getCategory')->name('category-job.getCategory');        

    });
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/kelas', 'KelasController');
