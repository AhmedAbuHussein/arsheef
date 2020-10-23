<?php
use Illuminate\Support\Facades\Route;




Route::group(['prefix'=>'admin', 'as'=> 'admin.'], function() {

    Route::group(['namespace'=> 'Admin'], function() {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');

    });

    Route::group(['namespace'=> 'Backend', 'middleware'=> 'auth:admin'], function () {
        Route::get('/', 'AdminController@index')->name('index');


        Route::group(['namespace'=>'Users', 'prefix'=>'users' ,'as'=> 'users.'], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/create', 'UserController@create')->name('create');
            Route::post('/create', 'UserController@store');
            Route::get('/{user}/edit', 'UserController@edit')->name('edit');
            Route::post('/{user}/edit', 'UserController@update');
            Route::get('/{user}/show', 'UserController@show')->name('show');
            Route::post('/{user}/destroy', 'UserController@destroy')->name('destroy');
        });

        Route::group(['namespace'=> 'Users\Information', 'as'=> 'info.'], function () {
            Route::get('/information', 'InfromationController@index')->name('index');
        });

    });


    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');
});
