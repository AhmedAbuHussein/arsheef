<?php

namespace App\Http\Controllers\Backend\Consultation;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $items = User::where('account_type', 'consultation')->get();
        $type = 'consultation';
        return view('backend.users.index', compact('items', 'type'));
    }
}
