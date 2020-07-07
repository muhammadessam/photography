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
        Route::resource('settings', 'SettingController')->middleware('permission:settings');
        Route::resource('services', 'ServiceController')->middleware('permission:services');
        Route::resource('achievements', 'AchievementController')->middleware('permission:achievements');
        Route::resource('admins', 'AdminController')->middleware('permission:admins');
        Route::get('/permission/{admin}', 'AdminController@permissions')->name('permissions');
        Route::post('/permission/update/{admin}', 'AdminController@updatePerms')->name('update_perms');
        Route::resource('categories', 'CategoryController')->middleware('permission:categories');
        Route::resource('orders', 'OrderController')->middleware('permission:orders');
        Route::resource('customers', 'CustomerController')->middleware('permission:customers');
        Route::resource('employees', 'EmployeeController')->middleware('permission:employees');
        Route::post('order-add-employee/{order}', 'OrderController@addEmployee')->name('order-add-employee');
        Route::post('order-remove-employee/{order}/{employee}', 'OrderController@removeEmployee')->name('order-remove-employee');
        Route::resource('page', 'PageController');
        Route::get('home', 'HomeController@index')->name('home');
        Route::get('customer/{customer}/orders', 'CustomerController@orders')->name('customer_orders');

        Route::post('employee-remove-order/{employee}/{order}', 'EmployeeController@removeOrder')->name('employee-remove-order');

        Route::post('order-star/{order}/{employee}', 'OrderController@starEmployee')->name('order-employee-star');
        Route::resource('country', 'CountryController');
        Route::resource('city', 'CityController');
        Route::resource('contact', 'ContactController');

        Route::get('customer/{customer}/videos','CustomerController@videos')->name('customer_videos');
        Route::get('customer/{customer}/images','CustomerController@images')->name('customer_images');
        Route::get('customer/{customer}/bills','CustomerController@bills')->name('customer_bills');
        Route::resource('videos','AdminVideoController');
        Route::resource('images','AdminImageController');
        Route::resource('customerImage','ImageController');
        Route::resource('customerVideo','VideoController');
        Route::resource('comments','CommentController');
        Route::get('order/{order}/comments','OrderController@comments')->name('order_comments');
        Route::resource('bills', 'BillController');
        Route::get('add-order-bill/{order}', 'BillController@createOrderBill')->name('add-order-bill');
        Route::get('employee/{employee}/orders','EmployeeController@orders')->name('emp_orders');
        Route::get('contact-reply/{contact}', 'ContactController@showReply')->name('showReplyForm');
        Route::post('contact-reply/{contact}', 'ContactController@sendReply')->name('sendReply');
        Route::resource('opinions','OpinionController')->only('index','destroy');
    });
});
