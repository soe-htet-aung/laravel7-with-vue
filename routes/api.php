<?php

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

Route::get('getBus', 'Api\BusController@getBus')->name('getBus');  // get bus information

Route::get('getBusStop/{busId}', 'Api\BusController@getBusStops')->name('getBusStops');  // get bus stop information

Route::get('/UpdateBusStop', 'UpdateBusStopController@updateBusStop');  // YBS data upload api
