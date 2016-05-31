<?php
    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */
    Route::get('/', 'LinkController@index');
    Route::post('/', 'LinkController@store');
    Route::auth();
    Route::get('about', function () {
        return view('links.about');
    });
    Route::get('contacts', function () {
        return view('links.contacts');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('cabinet', 'UserController@cabinet');
        Route::get('cabinet/mylinks', 'UserController@mylinks');
        Route::get('cabinet/profile', 'UserController@profile');
        Route::get('cabinet/profile/edit', 'UserController@editProfile');
        Route::post('cabinet/profile', 'UserController@storeProfile');
    });
    Route::get('/{shorturl}', 'LinkController@show');
