<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Meli\Api\OAuth20Api;
use Meli\Api\RestClientApi;

class SellerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('seller_id',$user->id)->get();
        $total = count($orders);
        $accept = 0;
        $refuse = 0;
        $deliver = 0;
        $pending = 0;
        $inactive = 0;
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
            else
                $inactive++;
        }
        return view('user.dashboard.seller',compact('user','total','accept','refuse','deliver','pending','inactive'));
    }

    public function callback(Request $request){
        try{
            $data = $request->all();
            if($data['code']!=null && $data['code']!='')
            {
                if(Auth::user()->sync_status==0){
                    $user = User::find(Auth::user()->id);
                    $user->sync_status = 1;
                    $user->save();
                }
                $apiInstance =  new OAuth20Api(new Client());
                $grant_type = 'authorization_code';
                $client_id = env("MERCADO_APP_ID", "");
                $client_secret = env("MERCADO_SECRET_KEY", "");
                $redirect_uri = env("MRECADO_REDIRECT_URL", "");
                $code = $data['code'];
                $refresh_token = '';
                try {
                    //get access token
                    $result = $apiInstance->getToken($grant_type, $client_id, $client_secret, $redirect_uri, $code, $refresh_token);
                    $arr = json_decode($result[0]);
                    $access_token = $arr->access_token;
                    $api_user_id = $arr->user_id;

                    //get order list
                    $restApi = new RestClientApi(new Client());
                    $resource = "orders/search?seller=".$api_user_id;
                    $result = $restApi->resourceGet($resource,$access_token);
                    $arr = json_decode($result[0]);
                    $orders = $arr->results;
                    $ids = Order::pluck('api_id')->toArray();

                    //get order data and write in db
                    foreach ($orders as $order){
                        $data = array();
                        $data['api_id'] = $order->id;
                        $order_items = $order->order_items;
                        if(count($order_items)){
                            $data['order_desc'] = $order_items[0]->item->title;
                            $data['quantity'] = $order_items[0]->quantity;
                        }
                        $data['quantity'] = $order->total_amount;
                        $shipping_id = $order->shipping->id;
                        if($shipping_id!=null){
                            $restApi = new RestClientApi(new Client());
                            $resource = "shipments/".$shipping_id;
                            $result = $restApi->resourceGet($resource,$access_token);
                            $arr = json_decode($result[0]);
                            $shipping = $arr->destination;
                            if($shipping!=null){
                                $data['delivery_name'] = $shipping->receiver_name;
                                $address = $shipping->shipping_address;
                                $data['delivery_address'] = $address->address_line;
                                $data['delivery_number'] = $address->address_id;
                                $data['delivery_city'] = $address->city->name;
                                $data['delivery_state'] = $address->state->name;
                                $data['delivery_neighborhood'] = $address->neighborhood->name;
                                $data['delivery_zip'] = $address->zip_code;
                            }
                        }
                        $data['request_at'] = date('Y-m-d',strtotime($order->date_created));
                        $data['seller_id'] = Auth::user()->id;
                        $save = Order::updateOrCreate(['api_id'=>$data['api_id']],$data);
                    }
                    session()->flash('sync_api',true);
                    return redirect()->route('seller.order.view');
                } catch (Exception $e) {
                    echo 'Exception when calling OAuth20Api->getToken: ', $e->getMessage(), PHP_EOL;
                }
            }
        }catch (\Exception $e){
            return redirect()->route('seller.dashboard');
        }

    }
}
