<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request, $lang)
    {
        $request->session()->put('locale', $lang);
        return redirect()->back();
    }
}
