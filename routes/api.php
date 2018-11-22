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

Route::put('/update/{id}', 'puppeteerData@update');

Route::post('/store', 'FakerController@store');
Route::get('/store', 'FakerController@test');

Route::post('/save', 'puppeteerData@postReview');

Route::get('/inlogData', 'puppeteerData@inlogData');
Route::get('/reviewData', 'puppeteerData@reviewData');
