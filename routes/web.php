<?php

use Illuminate\Http\Request;
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
Route::middleware('is_open')->group(function (){

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
        Route::get('/account/orders/order-accepted', 'OrderAcceptedController@index')->name('account.orders.order-accepted');
        Route::get('/account/orders/create', 'OrderController@showOrderCreationForm')->name('account.orders.create');
        Route::post('/account/orders/store', 'OrderController@store')->name('account.orders.store');
        Route::get('/account/orders/{id}', 'OrderController@show')->name('account.orders.show');
        Route::get('/account/bills','BillController@index')->name('account.bills');
        Route::post('/account/comments/store','CommentController@store')->name('account.comments.store');
    });
    Route::prefix('employee')->group(function (){
        Route::get('/account', 'AccountController@index')->name('employee.account');
        Route::get('/account/edit', 'AccountController@edit')->name('employee.account.edit');
        Route::get('/account/orders', 'OrderController@index')->name('employee.account.orders');
        Route::get('/account/orders/{id}', 'OrderController@show')->name('employee.account.orders.show');
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
        auth()->guard('employee')->logout();
        return redirect()->route('home');
    })->name('account_logout');
    Route::post('DownloadFile',function (Request $request){
        return \Illuminate\Support\Facades\Storage::disk('public')->download($request['file']);
    })->name('DownloadFile');
    Route::post('EmployeeLogin','Admin\EmployeeController@login')->name('EmployeeLogin');
    Route::view('EmployeeLoginForm','site.employee.login.index')->name('EmployeeLoginForm');
    Route::get('Order/{order}/makeFinal','OrderController@makeFinal')->name('makeFinal');
    Route::get('Order/{order}/downloadAllImages','OrderController@downloadAllImages')->name('downloadAllImages');
});


Route::view('IsClose','site.closed')->name('isClosed');






















Route::get('/{title}',function ($title){
    $page = \App\Page::all()->where('title',$title)->first();
    return view('site.page',compact('page'));
})->name('page');
