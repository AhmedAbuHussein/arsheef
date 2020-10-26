<?php

namespace App\Http\Controllers\Backend\Camera;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function index()
    {
        $items = User::where('account_type', 'camera')->get();
        $type = 'camera';
        return view('backend.users.index', compact('items', 'type'));
    }
}
