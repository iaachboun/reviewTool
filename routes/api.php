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

Route::put('/update/{id}', 'puppeteerController@update');
Route::put('/delete/{id}', 'puppeteerController@delete');

Route::post('/store', 'FakerController@store');
Route::get('/store', 'FakerController@test');

Route::post('/save', 'puppeteerController@postReview');

Route::get('/reviewData', 'puppeteerController@reviewData');

Route::post('/placeReview', 'puppeteerController@placeReview');
Route::get('/placeReview', 'puppeteerController@placeReview');

Route::prefix('faker')->group(function () {
    Route::get('combine/{options}', 'FakerController@combine');
    Route::get('name', 'FakerController@name');
    Route::get('email', 'FakerController@email');
    Route::get('company', 'FakerController@company');
});

Route::post('review', 'ReviewController@review');
Route::get('review', 'ReviewController@test');


Route::post('moreReviews', 'ReviewController@getReview');
Route::post('selectedreview', 'ReviewController@selectedreview');
Route::get('selectedreview', 'ReviewController@selectedreview');
