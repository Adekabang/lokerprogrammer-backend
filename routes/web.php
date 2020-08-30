<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'verified']) //'admin'])
    ->group(function () {
        // Special Routing for Courses
        Route::namespace('Course')
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
        Route::get('/company/show', 'Company\CompanyController@showAll')->name('show-company');

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
Route::get('/demo-kelas', 'KelasController@index')->name('demo-langganan-course');
Route::get('/demo-company', 'CompanyController@index')->name('demo-langganan-company');

// Datatables Courses
Route::get('/table/courseCategory', 'Admin\Course\CategoryController@dataTable')->name('table.courseCategory');
Route::get('/table/coursePackage', 'Admin\Course\CoursePackageController@dataTable')->name('table.coursePackage');
Route::get('/table/coursePackageFeature', 'Admin\Course\CoursePackageFeatureController@dataTable')->name('table.coursePackageFeature');

// Midtrans Course
Route::namespace('CheckoutCourse')->group(function () {
    Route::post('/checkout-course/{id}', 'CheckoutController@process')
        ->name('checkout_process_course')
        ->middleware(['auth', 'verified']);
    Route::get('/checkout-course/confirm/{id}', 'CheckoutController@success')
        ->name('checkout_success_course')
        ->middleware(['auth', 'verified']);
    Route::post('midtrans-course/callback', 'MidtransController@notificationHandler');
    Route::get('midtrans-course/finish', 'MidtransController@finishRedirect');
    Route::get('midtrans-course/unfinish', 'MidtransController@unfinishRedirect');
    Route::get('midtrans-course/error', 'MidtransController@errorRedirect');
});

// Midtrans Company
Route::namespace('CheckoutCompany')->group(function () {
    Route::post('/checkout-company/{id}', 'CheckoutController@process')
        ->name('checkout_process_company')
        ->middleware(['auth', 'verified']);
    Route::get('/checkout-company/confirm/{id}', 'CheckoutController@success')
        ->name('checkout_success_company')
        ->middleware(['auth', 'verified']);
    Route::post('midtrans-company/callback', 'MidtransController@notificationHandler');
    Route::get('midtrans-company/finish', 'MidtransController@finishRedirect');
    Route::get('midtrans-company/unfinish', 'MidtransController@unfinishRedirect');
    Route::get('midtrans-company/error', 'MidtransController@errorRedirect');
});

// Datatables Company
Route::get('/table/companyCategory', 'Admin\Company\CategoryController@dataTable')->name('table.companyCategory');
Route::get('/table/companyPackage', 'Admin\Company\CompanyPackageController@dataTable')->name('table.companyPackage');
Route::get('/table/companyPackageFeature', 'Admin\Company\CompanyPackageFeatureController@dataTable')->name('table.companyPackageFeature');
