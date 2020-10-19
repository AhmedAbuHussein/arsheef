<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('change-lang-to-{lang}', 'LanguageController@index')->name('change.lang');


Route::get('/home', 'HomeController@index')->name('home');


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

    });


    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');
});
