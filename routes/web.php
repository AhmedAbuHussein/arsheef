<?php

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

Route::get('/', function (){


        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font_size' => 0,
            'default_font' => '',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 9,
            'margin_footer' => 9,
            'orientation' => 'P',
        ]);

        $view = view('pdf.contract');
        //dd(str_replace("\r\n","", $view->render()));
        $html = $view->render();
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output("test.pdf", "D");

    return view('pdf.contract');
});

Auth::routes();
Route::get('change-lang-to-{lang}', 'LanguageController@index')->name('change.lang');


Route::get('/home', 'HomeController@index')->name('home');

