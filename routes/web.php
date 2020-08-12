<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth', 'verified', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/course/show', 'Course\CourseController@showAll')->name('show-course');

        Route::resource('course', 'Course\CourseController');
        Route::resource('category', 'Course\CategoryController');
        Route::resource('lesson', 'Course\LessonController');
        Route::resource('company', 'Company\CompanyController');
        Route::resource('package', 'Company\PackageController');
        Route::resource('job', 'JobController');
        Route::resource('blog', 'BlogController');
    });
