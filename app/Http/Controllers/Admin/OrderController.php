<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = Order::with('seller','transporter')->get();

        return view('admin.order.list',compact('user','data'));
    }

    public function edit($id){
        $user = Auth::user();
        $order = Order::with('seller','transporter')->find($id);

        return view('admin.order.index',compact('user','order'));
    }

    public function delete(Request $request){
        try{
            $id = $request->id;
            $result = Order::find($id);
            $result->delete();
            return response()->json(['result'=>true]);
        }catch (\Exception $e){
            return response()->json(['result'=>false]);
        }
    }
}
