<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $camera = User::where('account_type', 'camera')->count();
        $consultation = User::where('account_type', 'consultation')->count();
        $safety = User::where('account_type', 'safety')->count();

        return view('backend.index', compact('camera', 'consultation', 'safety'));
    }
}
