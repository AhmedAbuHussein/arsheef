<?php
namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller {

    public function index()
    {
        $users = User::get();
        return view('backend.users.index', compact('users'));
    }
}