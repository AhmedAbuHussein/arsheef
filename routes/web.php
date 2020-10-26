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
/*
Route::get('/', function (){
     $number = 123456;
    $date = "2020/03/25";

    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf([
       
    ]);

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path('fonts'),
            ]),
            'fontdata' => $fontData + [
                'Scheherazade' => [
                    'R' => 'Scheherazade-Regular.ttf',
                    'B' => 'Scheherazade-Bold.ttf',
                ]
            ],
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font_size' => 0,
            'default_font' => 'Scheherazade',//'Scheherazade',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 9,
            'margin_footer' => 9,
            'orientation' => 'P',
        ]);
          
        $view = view('pdf.contract', ['number'=>$number, 'date'=> $date]);
        //dd(str_replace("\r\n","", $view->render()));
        $html = $view->render();
        //$mpdf->autoLangToFont = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output("test.pdf", "D"); 
        
    return view('pdf.contract', ['number'=> $number, 'date'=>$date]);
});
*/
Route::redirect('/home', '/');
Auth::routes();
Route::get('change-lang-to-{lang}', 'LanguageController@index')->name('change.lang');


Route::get('/', 'HomeController@index')->name('home');

