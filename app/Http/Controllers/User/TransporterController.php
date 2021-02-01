<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransporterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('transporter_id',$user->id)->get();
        $total = count($orders);
        $accept = 0;
        $refuse = 0;
        $deliver = 0;
        $pending = 0;
        foreach ($orders as $order){
            $status = $order->status;
            if($status=="accepted")
                $accept++;
            elseif ($status=="refused")
                $refuse++;
            elseif($status=="delivered")
                $deliver++;
            else
                $pending++;
        }
        return view('user.dashboard.transporter',compact('user','total','accept','refuse','deliver','pending'));
    }

    public function view(){
        $user = Auth::user();
        $data = Order::with('seller')->where('transporter_id',$user->id)->get();

        return view('user.order.t_list',compact('user','data'));
    }

    public function edit($id){
        $user = Auth::user();
        $order = Order::with('seller')->where('id',$id)->first();

        return view('user.order.t_index',compact('user','order'));
    }

    public function change(Request $request){
        try{
            $order = Order::where('id',$request->id)->update(['status'=>$request->status]);
            session()->flash('status_update',true);

            return response()->json(['result'=>true]);
        }catch (\Exception $e){
            return response()->json(['result'=>false]);
        }
    }
}
