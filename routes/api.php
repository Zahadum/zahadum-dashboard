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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('reservations', 'Api\ReservationController')->only(['index','store','show'])->middleware('cors');
Route::post('contact', 'Api\ReservationController@sendContact')->middleware('cors');
Route::post('andolacontact','Api\ReservationController@andolaSendContact')->middleware('cors');
//Route::get('reservations','Api\ReservationController@index');
//Route::post('reservations','Api\ReservationController@store');
