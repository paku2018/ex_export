<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $fillable = [
        'seller_id',
        'bill_name',
        'business_name',
        'full_address',
        'order_desc',
        'quantity',
        'order_count',
        'delivery_name',
        'delivery_address',
        'delivery_number',
        'delivery_complement',
        'delivery_city',
        'delivery_state',
        'delivery_zip',
        'delivery_neighborhood',
        'transporter_id',
        'track_key',
        'status',
        'request_at',
        'type',
        'api_id'
    ];

    public function seller(){
        return $this->belongsTo(User::class,'seller_id')->select('id','name');
    }

    public function transporter() {
        return $this->belongsTo(User::class,'transporter_id')->select('id','email','name');
    }
}
