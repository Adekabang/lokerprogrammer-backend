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
                Route::resource('courseSubCategory', 'SubCategoryCourseController');
                Route::resource('lesson', 'LessonController');
                Route::resource('courseTransaction', 'CourseTransactionController');
            });
        // Special Routing for Company
        Route::namespace('company')
            ->group(function () {
                Route::get('/company/show', 'CompanyController@showAll')->name('show-company');
                Route::resource('company', 'CompanyController');
                Route::resource('companyPackage', 'CompanyPackageController');
                Route::resource('companyPackageFeature', 'CompanyPackageFeatureController');
                Route::resource('companyCategory', 'CategoryController');
                Route::resource('companyTransaction', 'CompanyTransactionController');
            });

        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/course/show', 'Course\CourseController@showAll')->name('show-course');
        Route::get('/company/show', 'Company\CompanyController@showAll')->name('show-company');

        // blogs
        Route::resource('blog', 'Blog\BlogController');
        Route::resource('category-blog', 'Blog\BlogCategorieController');
        Route::get('/table/category_blog', 'Blog\BlogCategorieController@dataTable')->name('table.category_blog');

        //Category Job
        Route::get('/job/show', 'Job\JobController@showAll')->name('show-job');
        Route::resource('jobCategory', 'Job\CategoryJobController');
        Route::resource('jobTag', 'Job\JobTagController');
        Route::resource('job', 'Job\JobController');
    });
Route::get('/company/register', function () {
    return view('auth.register-company');
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/demo-kelas', 'KelasController@index')->name('demo-langganan-course');
Route::get('/demo-company', 'CompanyController@index')->name('demo-langganan-company');

// Datatables Courses
Route::get('/table/courseCategory', 'Admin\Course\CategoryController@dataTable')->name('table.courseCategory');
Route::get('/table/courseSubCategory', 'Admin\Course\SubCategoryCourseController@dataTable')->name('table.courseSubCategory');
Route::get('/table/coursePackage', 'Admin\Course\CoursePackageController@dataTable')->name('table.coursePackage');
Route::get('/table/coursePackageFeature', 'Admin\Course\CoursePackageFeatureController@dataTable')->name('table.coursePackageFeature');
Route::get('/table/courseTransaction', 'Admin\Course\CourseTransactionController@dataTable')->name('table.courseTransaction');

// Midtrans
Route::namespace('Midtrans')->group(function () {
    Route::post('/checkout/{id}/for/{payment}', 'CheckoutController@process')
        ->name('checkout_process')
        ->middleware(['auth', 'verified']);
    Route::get('/checkout/confirm/{id}/for/{payment}', 'CheckoutController@success')
        ->name('checkout_success')
        ->middleware(['auth', 'verified']);
    Route::post('midtrans/callback', 'MidtransController@notificationHandler');
    Route::get('midtrans/finish', 'MidtransController@finishRedirect');
    Route::get('midtrans/unfinish', 'MidtransController@unfinishRedirect');
    Route::get('midtrans/error', 'MidtransController@errorRedirect');
});
// Datatables Company
Route::get('/table/companyCategory', 'Admin\Company\CategoryController@dataTable')->name('table.companyCategory');
Route::get('/table/companyPackage', 'Admin\Company\CompanyPackageController@dataTable')->name('table.companyPackage');
Route::get('/table/companyPackageFeature', 'Admin\Company\CompanyPackageFeatureController@dataTable')->name('table.companyPackageFeature');
Route::get('/table/jobCategory', 'Admin\Job\CategoryJobController@dataTable')->name('table.jobCategory');
Route::get('/table/jobTag', 'Admin\Job\JobTagController@dataTable')->name('table.jobTag');
Route::get('/table/companyTransaction', 'Admin\Company\CompanyTransactionController@dataTable')->name('table.companyTransaction');
