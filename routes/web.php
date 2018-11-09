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

Route::get('/', 'BaseController@index');

Route::prefix('faker')->group(function () {
    Route::get('combine/{options}', 'FakerController@combine');
    Route::get('name', 'FakerController@name');
    Route::get('phone', 'FakerController@phone');
    Route::get('email', 'FakerController@email');
    Route::get('company', 'FakerController@company');
});
