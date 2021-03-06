<?php
use Illuminate\Support\Facades\Route;




Route::group(['prefix'=>'admin', 'as'=> 'admin.'], function() {

    Route::group(['namespace'=> 'Admin'], function() {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');

    });

    Route::group(['namespace'=> 'Backend', 'middleware'=> 'auth:admin'], function () {
        Route::get('/', 'AdminController@index')->name('index');

        Route::group(['namespace'=>'Users', 'as'=>'users.', 'prefix'=>'user'], function () {
            Route::get('{account_type}/all', 'UserController@index')->name('index');
            Route::get('{account_type}/create', 'UserController@create')->name('create');
            Route::post('{account_type}/create', 'UserController@store');

            Route::get('{account_type}/{user}/show', 'UserController@show')->name('show');
            Route::get('{account_type}/{user}/edit', 'UserController@edit')->name('edit');
            Route::post('{account_type}/{user}/edit', 'UserController@update');

            Route::post('{account_type}/{user}/destroy', 'UserController@destroy')->name('destroy');
        });

    });


    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');
});
