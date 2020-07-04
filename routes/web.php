<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){
    Route::view('/','admin.statics.index')->name('statics');

});

// Route::get("{pages?}", 'HomeController@pageTemplate')->name('loadPage');

// Only logged in users can reach this routes
Route::middleware(['auth'])->group( function ()
{
    Route::get('/account', 'AccountController@index')->name('account');
    Route::get('/account/orders', 'OrderController@index')->name('account.orders');
    Route::get('/account/orders/create', 'OrderController@showOrderCreationForm')->name('account.orders.create');
    Route::post('/account/orders/store', 'OrderController@store')->name('account.orders.store');
});
Route::prefix('galary')->group(function (){
    Route::view('images','site.galary.images')->name('images');
    Route::view('videos','site.galary.videos')->name('videos');
});
Route::resource('opinions','Admin\OpinionController')->only('store');
Route::get('/myBills','HomeController@bills')
    ->name('my_bills')->middleware('auth');
