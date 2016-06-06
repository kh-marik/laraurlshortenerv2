<?php
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
        Route::group(['middleware' => 'isadmin'], function() {
            Route::get('adminplace', 'Admin\MainController@index');
            Route::get('adminplace/users', 'Admin\MainController@users');
            Route::get('adminplace/users/{id}/edit', 'Admin\MainController@editUserProfile');
            Route::post('adminplace/users/{id}', 'Admin\MainController@storeUserProfile');
            Route::get('adminplace/users/{id}/delete', 'UserController@destroy');
            Route::get('adminplace/links', 'Admin\MainController@links');
            Route::get('adminplace/links/{id}/edit', 'Admin\MainController@editLink');
            Route::post('adminplace/links/{id}', 'Admin\MainController@storeLink');
            Route::get('adminplace/links/{id}/delete', 'LinkController@destroy');
            Route::get('adminplace/advert', 'Admin\MainController@advert');
            Route::get('adminplace/advert/new', 'Admin\MainController@addAdvert');
            Route::post('adminplace/advert/new', 'Admin\MainController@storeAdvert');
            Route::get('adminplace/advert/{id}/edit', 'Admin\MainController@editAdvert');
            Route::post('adminplace/advert/{id}', 'Admin\MainController@updateAdvert');
            Route::get('adminplace/advert/{id}/delete', 'Admin\MainController@deleteAdvert');
        });
    });
    Route::get('/{shorturl}', 'LinkController@show');
