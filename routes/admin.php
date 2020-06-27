<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
    });


    Route::middleware('auth:admin')->group(function () {
        Route::namespace('Auth')->group(function () {
            Route::post('/logout', 'LoginController@logout')->name('logout');
        });
        Route::resource('settings','SettingController')
            ->middleware('permission:settings');
        Route::resource('admins','AdminController')
            ->middleware('permission:admins');
        Route::get('/permission/{admin}','AdminController@permissions')->name('permissions');
        Route::post('/permission/update/{admin}','AdminController@updatePerms')->name('update_perms');
        Route::resource('categories', 'CategoryController')
            ->middleware('permission:categories');
        Route::resource('orders', 'OrderController')
            ->middleware('permission:orders');
        Route::resource('customers','CustomerController')
            ->middleware('permission:customers');
        Route::resource('employees','EmployeeController')
            ->middleware('permission:employees');
        Route::get('home', 'HomeController@index')->name('home');
    });
});
