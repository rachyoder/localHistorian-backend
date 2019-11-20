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


Route::middleware('auth:api')->group(function () {
    Route::resource('/fileupload', 'FileuploadController');
    Route::get('/logout','AuthenticationController@logout')->name('logout');
});