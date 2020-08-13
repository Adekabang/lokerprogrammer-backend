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
        Route::resource('company', 'CompanyController');
        Route::resource('job', 'JobController');
        Route::resource('blog', 'BlogController');

        //Category Job
        Route::resource('category-job','JobCategoryController');
        Route::resource('joblist','JobListController');
        Route::post('category-job/getCategory','JobListController@getCategory')->name('category-job.getCategory');        

    });
