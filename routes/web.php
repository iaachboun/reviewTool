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
    Route::get('username', 'FakerController@username');
    Route::get('phone', 'FakerController@phone');
    Route::get('email', 'FakerController@email');
    Route::get('job', 'FakerController@jobdesc');
    Route::get('company', 'FakerController@company');
});

Route::get('review', function () {
    return view('Review');
});

/*Route::prefix('review')->group(function () {
    Route::get('combine.{options}', 'ReviewController@combine');
    Route::get('name', 'ReviewController@Robohost');
    Route::get('name', 'ReviewController@iXLhosting');
    Route::get('name', 'ReviewController@HostingNet');
    Route::get('name', 'ReviewController@Domeinwinkel');
    Route::get('name', 'ReviewController@Hosting2Go');
    Route::get('name', 'ReviewController@Mijndomein');
    Route::get('name', 'ReviewController@SoHosted');
    Route::get('name', 'ReviewController@Antagonist');
    Route::get('name', 'ReviewController@Hostnet');
    Route::get('name', 'ReviewController@Versio');
});*/
