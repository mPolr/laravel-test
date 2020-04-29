<?php

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
    Route::resource('books', 'BookController');
    Route::resource('authors', 'AuthorController');
});

Auth::routes();
