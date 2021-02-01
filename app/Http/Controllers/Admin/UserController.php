<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = User::where('id','!=',$user->id)->get();

        return view('admin.user.index',compact('user','data'));
    }

    public function create(){
        $user = auth::user();

        return view('admin.user.create',compact('user'));
    }

    public function edit($id){
        $user = auth::user();
        $data = User::find($id);

        return view('admin.user.create',compact('user','data'));
    }

    public function update(Request $request){
        try{
            $data = $request->only('id','name','email','password','country_code','role');
            if($data['id']==0){
                $email = User::where('email',$data['email'])->first();
                if($email!=null){
                    session()->flash('email_error',true);
                    return Redirect::back();
                }
                $data['password'] = Hash::make($data['password']);
            }
            $avatar = null;
            if($request->hasFile('avatar')){
                $avatar = $request->avatar->store('profile','public');
            }

//            $source = array();
//            $source['name'] = $data['name'];
//            $source['country_code'] = $data['country_code'];
//            if($data['password'])
//                $source['password'] = $data['password'];
            if($avatar){
                $data['avatar'] = asset('storage')."/".$avatar;
            }

            $result = User::updateOrCreate(['id'=>$data['id']],$data);

            return redirect('/manage/user/view');
        }catch (\Exception $e){
            session()->flash('server_error',true);
            return Redirect::back();
        }
    }
}
