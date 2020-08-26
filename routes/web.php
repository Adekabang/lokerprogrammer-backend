<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'verified']) //'admin'])
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
        Route::get('/course/show', 'Course\CourseController@showAll')->name('show-course');
        Route::resource('blog', 'Blog\BlogController');
        Route::resource('category_Blog', 'Blog\BlogCategorieController');

        Route::resource('company', 'Company\CompanyController');
        Route::resource('package', 'Company\PackageController');

        //Category Job
        Route::resource('category-job', 'JobCategoryController');
        Route::resource('joblist', 'JobListController');
        Route::post('category-job/getCategory', 'JobListController@getCategory')->name('category-job.getCategory');
    });
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/kelas', 'KelasController');

// Datatables
Route::get('/table/category', 'Admin\Course\CategoryController@dataTable')->name('table.category');
Route::get('/table/coursePackage', 'Admin\Course\CoursePackageController@dataTable')->name('table.coursePackage');
Route::get('/table/coursePackageFeature', 'Admin\Course\CoursePackageFeatureController@dataTable')->name('table.coursePackageFeature');

// Midtrans
Route::namespace('CheckoutCourse')->group(function () {
    Route::post('/checkout/{id}', 'CheckoutController@process')
        ->name('checkout_process')
        ->middleware(['auth', 'verified']);
    Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
        ->name('checkout_success')
        ->middleware(['auth', 'verified']);
    Route::post('midtrans/callback', 'MidtransController@notificationHandler');
    Route::get('midtrans/finish', 'MidtransController@finishRedirect');
    Route::get('midtrans/unfinish', 'MidtransController@unfinishRedirect');
    Route::get('midtrans/error', 'MidtransController@errorRedirect');
});
