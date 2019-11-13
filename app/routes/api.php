<?php

use Illuminate\Http\Request;

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


Route::get('restaurants/data-generate', "Api\RestaurantController@dataGenerate");

Route::group(['prefix' => 'v6'], function () {
    Route::get('restaurants', "Api\RestaurantController@getRestaurant");
});

Route::group(['prefix' => 'v5.12.300'], function () {
    Route::get('restaurants', "Api\RestaurantController5_12_300@getRestaurant");
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
