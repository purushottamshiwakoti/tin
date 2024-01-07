<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin','middleware'=>['auth','backend.permissions'],'as'=>'admin.'], function() {

    // The controllers live in src/Services/Ratings/Http/Controllers
    // Route::get('/', 'UserController@index');

    Route::get('categories/get-data','CategoryController@getData')->name('categories.get-data');
    Route::resource('categories','CategoryController');

    Route::get('posts/get-data','PostController@getData')->name('posts.get-data');
    Route::resource('posts','PostController');

});
