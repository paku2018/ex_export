<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index(){
        $user = Auth::user();
        $APP_ID = env("MERCADO_APP_ID", "");
        $URL = env("MRECADO_REDIRECT_URL","");
        $base_url = "http://auth.mercadolivre.com.br/";
        if($user->country_code=="ar")
            $base_url = "http://auth.mercadolibre.com.ar/";
        $site_url = $base_url."authorization?response_type=code&client_id=".$APP_ID."&redirect_uri=".$URL;
        $data = Order::with('transporter')->where('seller_id',$user->id)->orderBy('created_at','desc')->get();

        return view('user.order.list',compact('user','site_url','data'));
    }

    public function create(){
        $user = Auth::user();
        $transporters = User::where('role','=','transporter')->get();

        return view('user.order.index',compact('user','transporters'));
    }

    public function edit($id){
        $user = Auth::user();
        $transporters = User::where('role','=','transporter')->get();
        $order = Order::with('transporter')->find($id);

        return view('user.order.index',compact('user','transporters','order'));
    }

    public function save(Request $request){
        try{
            $data = $request->all();
            $data['seller_id'] = Auth::user()->id;
            if($data['id']!=0){
                $order = Order::find($data['id']);
                if(($order->status == "inactive"||$order->status == "cancelled") && $data['transporter_id']!=0){
                    $data['status'] = "pending";
                    $data['track_key'] = md5(date('ymdhis'));
                }
            }else{
                if ($data['transporter_id']!=0){
                    $data['track_key'] = md5(date('ymdhis'));
                    $data['status'] = "pending";
                }else{
                    $data['status'] = "inactive";
                }
                $data['type'] = "manual";
            }
            $order = Order::updateOrCreate(['id'=>$data['id']],$data);

            return redirect()->route('seller.order.view');
        }catch (\Exception $e){
            return abort(404);
        }
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

    public function cancel(Request $request){
        try{
            $id = $request->id;
            $result = Order::find($id);
            $result->transporter_id = 0;
            $result->track_key = null;
            $result->status = "cancelled";
            $result->save();
            return response()->json(['result'=>true]);
        }catch (\Exception $e){
            return response()->json(['result'=>false]);
        }
    }

    public function getList(Request $request){
        $id = Auth::user()->id;
        $result = Order::where('seller_id',$id)->get();

        return response()->json($result);
    }
}
