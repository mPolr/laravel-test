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

    Route::apiResource('books', 'Api\BookController', [
        'only' => ['list', 'by-id', 'update', 'destroy']
    ]);

});
