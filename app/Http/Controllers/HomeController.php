<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contracts = Contract::where('user_id', Auth::guard('web')->user()->id)->count();
        return view('frontend.index', compact('contracts'));
    }
}
