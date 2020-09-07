<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->namespace('API')
    ->group(function () {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');

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
    });
