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
    Route::get('/about', function () {
        return view('links.about');
    });
    Route::get('/contacts', function () {
        return view('links.contacts');
    });
    Route::get('/{shorturl}', 'LinkController@show');
    Route::auth();