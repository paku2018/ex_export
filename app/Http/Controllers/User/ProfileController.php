<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }

    public function update(Request $request)
    {
        try{
            $user = Auth::user();
            $data = $request->only('name','current_password','password','country_code');
            if(password_verify($data['current_password'],$user->password)){
                if($data['password']!=null)
                    $data['password'] = Hash::make($data['password']);
            }
            else{
                session()->flash('error',true);
                return Redirect::back();
            }
            $avatar = null;
            if($request->hasFile('avatar')){
                $avatar = $request->avatar->store('profile','public');
            }

            $source = array();
            $source['name'] = $data['name'];
            $source['country_code'] = $data['country_code'];
            if($data['password'])
                $source['password'] = $data['password'];
            if($avatar){
                $source['avatar'] = asset('storage')."/".$avatar;
            }

            $result = User::where('id',$user->id)->update($source);
            session()->flash('success',true);
            return Redirect::back();
        }catch (\Exception $e){
            session()->flash('server_error',true);
            return Redirect::back();
        }
    }
}
