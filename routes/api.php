<?php

use App\Country;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/customer/{id}/orders',function ($id){
    $orders = \App\Customer::find($id)->orders;
    return $orders;
})->name('api_get_orders');
Route::get('/countries',function (){
    $orders = CountryResource::collection(Country::all());
    return $orders;
})->name('api_countries');
