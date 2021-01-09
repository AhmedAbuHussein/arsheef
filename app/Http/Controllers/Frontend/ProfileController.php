<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $user->load(['information']);
        return view('frontend.profile.index', compact('user'));
    }

    public function edit($type)
    {
        $user = Auth::guard('web')->user();
        $user->load(['information']);
        return view("frontend.profile.edit-{$type}", compact('user', 'type'));
    }

    public function update(Request $request,$type)
    {
        $user = Auth::guard('web')->user();
       
        if($type == 'profile'){
            $this->validate($request, [
                'name'=> "required|string|min:3",
                'email'=> "required|email|unique:users,email," . $user->id,
                'phone'=> "required|numeric|min:6",
                'password'=> 'nullable|min:6|string|confirmed',
                'image'=> 'nullable|image|max:2048',
            ]);
            $data = $request->only(['name', 'email', 'phone']);
            if($request->has('password') && !is_null($request->password)){
                $data['password'] = Hash::make($request->password);
            }

            if($request->hasFile('image')){
                $old = public_path($user->image);
                $name = uploadImage('image', 'images/users', $old);
                $data['image'] = $name;
            }
            $user->update($data);
            return redirect()->route('profile')->with(['message'=> "تم تحديث البيانات الشخصية بنجاح", 'icon'=>'success']);
        }else{
            $user->load(['information']);
            $this->validate($request, [
                "bank_accounts"=> "nullable|array",
                "bank_accounts.*"=> "required|array",
                "bank_accounts.*.name"=> "required|string",
                "bank_accounts.*.account"=> "required|numeric",
                'establish_name'=> "required|string|min:3",
                'admin_name'=> "required|string|min:3",
                'commerical_register'=> "required|numeric",
                'license_number'=> "required|numeric",
                'phone'=> "required|numeric|min:6",
                'email'=> "required|email|unique:information,email,". optional($user->information)->id,
                'logo'=> 'nullable|image|max:1024',
            ]);
            $data = $request->except(['_token', 'logo']);
            if($request->hasFile('logo')){
                $old = public_path(optional($user->information)->logo);
                $name = uploadImage('logo', 'images/information', $old);
                $data['logo'] = $name;
            }
            $user->information()->updateOrCreate(['user_id'=>$user->id],$data);
            $user->update([
                'first_login'=> 0
            ]);
            return redirect()->route('profile')->with(['message'=> "تم تحديث بيانات المؤسسة بنجاح", 'icon'=>'success']);
        }
    }
}
