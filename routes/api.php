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

Route::group(['middleware' => 'auth:api', 'namespace' => 'API'], function() {
    Route::get('user', 'UserController@getUser')->name('api.user.me');
    Route::get('user/bikes', 'UserController@getBikes')->name('api.user.bikes');

    Route::get('bikes', 'BikeController@index')->name('api.bikes.index');
    Route::get('bikes/{bike}', 'BikeController@show')->name('api.bikes.show');
    Route::post('bikes', 'BikeController@store')->name('api.bikes.store');
    Route::put('bikes/{bike}', 'BikeController@update')->name('api.bikes.update');
    Route::delete('bikes/{bike}', 'BikeController@destroy')->name('api.bikes.destroy');

    Route::post('bikes/{bike}/consumptions', 'ConsumptionController@store')->name('api.consumptions.store');
    Route::put('bikes/{bike}/consumptions/{consumption}', 'ConsumptionController@update')->name('api.consumptions.update');
    Route::delete('bikes/{bike}/consumptions/{consumption}', 'ConsumptionController@destroy')->name('api.consumptions.delete');
});
