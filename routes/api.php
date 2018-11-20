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
Route::get('/echo', 'startPuppeteer@engine');

Route::post('/store', 'FakerController@store');
Route::get('/store', 'FakerController@test');
Route::get('/post', 'FakerController@post');
Route::post('/review', 'ReviewController@review');
