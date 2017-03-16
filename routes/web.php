<?php

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

Route::get('/', 'HomeController@getIndex')->name('index');

Route::get('login/provider/{provider}', 'Auth\LoginController@redirectToProvider')->name('provider.login');
Route::get('login/provider/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('provider.login.callback');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::resource('bikes', 'BikeController');
    Route::resource('bikes.consumptions', 'ConsumptionController', ['except' => ['index', 'show']]);

    Route::group(['middleware' => 'admin'], function() {
        Route::get('passport', 'PassportController@getIndex')->name('passports.index');
    });
});