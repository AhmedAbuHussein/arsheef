<?php
namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Information;
use App\Models\Structure;
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
            'expired_at'=> 'required|string|date_format:Y-m-d H:i',
            'password'=> 'nullable|confirmed|min:6|string'
        ]);
        $user->update(['expired_at'=> $request->expired_at]);
        if($request->has('password') && !is_null($request->password) && strlen($request->password)>5){
            $user->update(['password'=> Hash::make($request->password)]);
        }
        return redirect()->route('admin.users.index', ['account_type'=> $account_type]);
    }


    public function show($account_type, User $user)
    {
        $type = $account_type;
        $user->load(['information']);
        return view('backend.users.show', compact('type', 'user'));
    }

    public function destroy($account_type, $user)
    {
        $user = User::findOrFail($user);
        switch ($account_type) {
            case 'consultation':
                $structures = Structure::where('user_id', $user->id)->get();
                foreach ($structures as  $item) {
                    for ($i=1; $i < 5; $i++) { 
                        if($item->{"attach_$i"}){
                            deleteFileFromStorage($item->{"attach_$i"});
                        }
                    }
                    $item->delete();
                }
               
                break;
            
            case 'camera':
                $contracts = Contract::where('user_id', $user->id)->get();
                foreach ($contracts as  $item) {
                    for ($i=1; $i < 5; $i++) { 
                        if($item->{"attach_$i"}){
                            deleteFileFromStorage($item->{"attach_$i"});
                        }
                    }
                    $item->delete();
                }
            break;
           
        }
        $info = Information::where('user_id', $user->id)->get();
        $this->deleteItems($info, 'logo');
        deleteFileFromStorage($user->image);
        $user->delete();

        return redirect()->back();
    }

    private function deleteItems($data, $filename){
        foreach ($data as $item) {
            deleteFileFromStorage($item->{$filename});
            $item->delete();
        }
    }   
}