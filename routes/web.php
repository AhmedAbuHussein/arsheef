<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
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

Route::redirect('/home', '/');
Auth::routes();
Route::get('change-lang-to-{lang}', 'LanguageController@index')->name('change.lang');

Route::group(['namespace'=>'Frontend','middleware'=> 'auth:web'], function () {
    
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/edit-{type}', 'ProfileController@edit')->name('profile.edit');
    Route::post('/edit-{type}', 'ProfileController@update');

    Route::group(['middleware'=> 'first-login'], function () {
        Route::get('/', 'HomeController@home')->name('home');
        Route::get('/{type}/index', 'HomeController@index')->name('index');
        Route::get('/{type}/create', 'CreateController@create')->name('create');
        Route::post('/{type}/create', 'CreateController@store');

        Route::get('/{type}/item/{item}/show', 'HomeController@show')->name('show');
        Route::get('/{type}/item/{item}/edit', 'EditController@edit')->name('edit');
        Route::post('/{type}/item/{item}/edit', 'HomeController@update');

        Route::post('/{type}/item/{item}/attach/{file}', 'CreateController@attachShow')->name('attach');
        Route::post('/{type}/item/{item}/items', 'ItemController@items')->name('items');

        Route::post('/{type}/item/{item}/delete', 'HomeController@destroy')->name('destroy');

        Route::get('/{type}/item/{item}/download-pdf', 'DownloadController@index')->name('download');

    });

});


