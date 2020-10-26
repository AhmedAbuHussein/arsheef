<?php
namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller {

    public function create($account_type)
    {
        $type = $account_type;
        return view('backend.users.create', compact('type'));
    }
}