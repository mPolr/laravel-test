<?php

use Illuminate\Http\Request;
use Http\Controllers\Api\BookController;

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

Route::group(['prefix' => 'v1'], function() {

    Route::get('books/list', 'Api\BookController@index');
    Route::get('books/by-id/{id}', 'Api\BookController@show');
    Route::post('books/update/{id}', 'Api\BookController@update');
    Route::delete('books/{id}', 'Api\BookController@destroy');

});
