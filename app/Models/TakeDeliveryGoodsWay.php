<?php

namespace App\Models;

class TakeDeliveryGoodsWay extends Model
{
    protected $table = 'take_delivery_goods_ways';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'take_delivery_goods_ways_id');
    }
}
