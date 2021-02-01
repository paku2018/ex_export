<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $orders = Order::all();
        $total = count($orders);
        $accept = 0;
        $refuse = 0;
        $deliver = 0;
        $pending = 0;
        $cancel = 0;
        foreach ($orders as $order){
            $status = $order->status;
            if($status=="accepted")
                $accept++;
            elseif ($status=="refused")
                $refuse++;
            elseif($status=="delivered")
                $deliver++;
            elseif($status=="pending")
                $pending++;
            elseif($status=="cancelled")
                $cancel++;
        }

        $sellers = User::where('role','seller')->count();
        $transporters = User::where('role','transporter')->count();
        return view('admin.dashboard',compact('user','total','accept','refuse','deliver','pending','cancel','sellers','transporters'));
    }
}
