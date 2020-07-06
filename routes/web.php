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
    Route::get('/account/edit', 'AccountController@edit')->name('account.edit');
    Route::post('/account/update/{id}', 'AccountController@update')->name('account.update');
    Route::get('/account/orders', 'OrderController@index')->name('account.orders');
    Route::get('/account/orders/create', 'OrderController@showOrderCreationForm')->name('account.orders.create');
    Route::post('/account/orders/store', 'OrderController@store')->name('account.orders.store');
    Route::get('/account/orders/{id}', 'OrderController@show')->name('account.orders.show');
    Route::get('/account/bills','BillController@index')->name('account.bills');
    Route::post('/account/comments/store','CommentController@store')->name('account.comments.store');
});

Route::prefix('gallery')->group(function (){
    Route::get('images','ImageController@index')->name('images');
    Route::get('images/{id}','ImageController@show')->name('images.show');
    Route::view('videos','site.gallery.videos')->name('videos');
});
Route::resource('opinions','Admin\OpinionController')->only('store');
Route::get('/myBills','HomeController@bills')
    ->name('my_bills')->middleware('auth');
Route::view('/terms','site.account.terms')->name('terms');
Route::resource('nots','NotificationController');

Route::post('/contact/store', 'ContactController@store')->name('contact.store');
Route::get('/account/logout',function (){
   auth()->logout();
   return redirect()->route('home');
})->name('account_logout');



























Route::get('/{title}',function ($title){
    $page = \App\Page::all()->where('title',$title)->first();
    return view('site.page',compact('page'));
})->name('page');
