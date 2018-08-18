<?php

namespace App\Models;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'products_id', 'combinations_id', 'quantity', 'total_volume', 'paint',
        'is_printing', 'printing_fee', 'is_spot_goods', 'under_line_univalent',
        'under_line_total_amount', 'under_line_preferential', 'under_line_payment',
    ];

    //设置类型
    protected $casts = [
        'is_printing' => 'boolean',
        'is_spot_goods' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function combination()
    {
        return $this->belongsTo(Combination::class, 'combinations_id');
    }
}
