<?php

namespace App\Models;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [];

    //设置类型
    protected $casts = [
        'is_printing' => 'boolean',
        'is_spot_goods' => 'boolean',
    ];


}
