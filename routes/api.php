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

Route::post('/login', 'AuthenticationController@login')->name('login');
Route::post('/register', 'AuthenticationController@register')->name('register');
Route::get('/markers', 'FileuploadController@index');
Route::get('/markers/{imgName}', 'FileuploadController@getImg');

Route::middleware('auth:api')->group(function () {
    Route::post('/fileupload', 'FileuploadController@store');
    Route::post('/verify', 'FileuploadController@checkVerification');
    Route::post('/delete', 'FileuploadController@delete');
    Route::get('/logout','AuthenticationController@logout')->name('logout');
});