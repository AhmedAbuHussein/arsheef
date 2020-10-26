<?php
namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function index($account_type)
    {
        $items = User::where('account_type', $account_type)->get();
        return view('backend.users.index', ['items'=> $items, 'type'=> $account_type]);
    }

    public function create($account_type)
    {
        $type = $account_type;
        return view('backend.users.create', compact('type'));
    }

    public function store(Request $request, $account_type)
    {
        $this->validate($request, [
            'name'=> 'required|min:3|max:50|string',
            'email'=> 'required|email|unique:users,email',
            'expired_at'=> 'required|string|date_format:Y-m-d H:i'
        ]);
        $data = $request->except('_token');
        $data['account_type']= $account_type;
        $data['password'] = Hash::make('password');
        User::create($data);
        return redirect()->route('admin.users.index', ['account_type'=> $account_type]);
    }

    public function edit($account_type,User $user)
    {
        $type = $account_type;
        return view('backend.users.edit', compact('type', 'user'));
    }

    public function update(Request $request,$account_type, User $user)
    {
        $this->validate($request, [
            'expired_at'=> 'required|string|date_format:Y-m-d H:i'
        ]);
        $user->update(['expired_at'=> $request->expired_at]);
        return redirect()->route('admin.users.index', ['account_type'=> $account_type]);
    }


    public function show($account_type, User $user)
    {
        $type = $account_type;
        $user->load(['information']);
        return view('backend.users.show', compact('type', 'user'));
    }
}