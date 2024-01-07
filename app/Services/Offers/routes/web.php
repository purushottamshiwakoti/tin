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

    Route::get('offers/get-data','OfferController@getData')->name('offers.get-data');
    Route::resource('offers','OfferController');

});
