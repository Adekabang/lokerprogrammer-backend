<?php

use Illuminate\Support\Facades\Auth;
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
                Route::resource('courseCategory', 'CategoryController');
                Route::resource('lesson', 'LessonController');
            });
        // Special Routing for Company
        Route::namespace('company')
            ->group(function () {
                Route::get('/company/show', 'CompanyController@showAll')->name('show-company');
                Route::resource('company', 'CompanyController');
                Route::resource('companyPackage', 'CompanyPackageController');
                Route::resource('companyPackageFeature', 'CompanyPackageFeatureController');
                Route::resource('companyCategory', 'CategoryController');
            });

        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/course/show', 'Course\CourseController@showAll')->name('show-course');
        Route::get('/company/show', 'Copany\CompanyController@showAll')->name('show-company');

        // blogs
        Route::resource('blog', 'Blog\BlogController');
        Route::resource('category-blog', 'Blog\BlogCategorieController');
        Route::get('/table/category_blog', 'Blog\BlogCategorieController@dataTable')->name('table.category_blog');

        //Category Job
        Route::resource('category-job', 'JobCategoryController');
        Route::resource('joblist', 'JobListController');
        Route::post('category-job/getCategory', 'JobListController@getCategory')->name('category-job.getCategory');
    });
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/kelas', 'KelasController');

// Datatables Courses
Route::get('/table/courseCategory', 'Admin\Course\CategoryController@dataTable')->name('table.courseCategory');
Route::get('/table/coursePackage', 'Admin\Course\CoursePackageController@dataTable')->name('table.coursePackage');
Route::get('/table/coursePackageFeature', 'Admin\Course\CoursePackageFeatureController@dataTable')->name('table.coursePackageFeature');

// Datatables Company
Route::get('/table/companyCategory', 'Admin\Company\CategoryController@dataTable')->name('table.companyCategory');
Route::get('/table/companyPackage', 'Admin\Company\CompanyPackageController@dataTable')->name('table.companyPackage');
Route::get('/table/companyPackageFeature', 'Admin\Company\CompanyPackageFeatureController@dataTable')->name('table.companyPackageFeature');
