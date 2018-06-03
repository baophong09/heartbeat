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

Route::prefix('v1')->group(function() {
    Route::post('/user/login', function() {
        dd('hello');
    });

    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::get('user/me', 'UserController@me');
    });
});