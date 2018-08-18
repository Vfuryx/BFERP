<?php

namespace App\Models;

class PaymentDetail extends Model
{
    protected $table = 'payment_details';

    protected $fillable = [
        'payment', 'taobao_tid', 'taobao_oid', 'pay_time',
        'remark',
    ];


    protected $dates = [
        'pay_time'
    ];


    public function orders(){
        return $this->hasMany(Order::class,'payment_methods_id');
    }
}
