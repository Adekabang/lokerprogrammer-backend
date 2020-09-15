<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard');

// Route::middleware(['auth', 'verified']) //'member'])->group(function () {
Route::resources([
    'mycourse' => 'MyCourseController',
    'resource' => 'ResourceController',
    'certificate' => 'CertificateController',
    'message' => 'MessageController',
    'group' => 'GroupController',
    'setting' => 'SettingController'
]);

Auth::routes();

// Datatables Members
Route::get('/table/myCourse', 'MyCourseController@dataTable')->name('table.myCourse');
