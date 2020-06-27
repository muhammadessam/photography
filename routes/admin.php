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
        Route::resource('settings', 'SettingController');
        Route::resource('categories', 'CategoryController');
        Route::resource('orders', 'OrderController');
        Route::post('order-add-employee/{order}', 'OrderController@addEmployee')->name('order-add-employee');
        Route::post('order-remove-employee/{order}/{employee}', 'OrderController@removeEmployee')->name('order-remove-employee');
        Route::resource('customers', 'CustomerController');
        Route::resource('employees', 'EmployeeController');
        Route::get('home', 'HomeController@index')->name('home');
    });
});
