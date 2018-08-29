<?php

namespace App\Models;

class PaymentDetail extends Model
{
    protected $table = 'payment_details';

    protected $fillable = [
        'payment_methods_id', 'orders_id', 'payment', 'taobao_tid', 'taobao_oid',
        'pay_time', 'remark',
    ];


    protected $dates = [
        'pay_time'
    ];

    public function order(){
        return $this->belongsTo(Order::class,'orders_id');
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_methods_id');
    }


}
