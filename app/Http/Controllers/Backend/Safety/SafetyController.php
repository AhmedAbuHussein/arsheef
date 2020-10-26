<?php

namespace App\Http\Controllers\Backend\Safety;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SafetyController extends Controller
{
    public function index()
    {
        $items = User::where('account_type', 'safety')->get();
        $type = 'safety';
        return view('backend.users.index', compact('items', 'type'));
    }
}
