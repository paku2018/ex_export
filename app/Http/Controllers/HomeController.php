<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user){
            if($user->role=="seller")
                return redirect()->route('seller.dashboard');
            elseif($user->role=="transporter")
                return redirect()->route('transporter.dashboard');
            else
                return redirect()->route('admin.home');
        }else{
            return redirect()->route('login');
        }
    }
}
