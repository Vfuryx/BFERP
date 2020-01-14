<?php

namespace App\Models;

class ReturnOrderItem extends Model
{
    protected $table = 'return_order_items';

    protected $fillable = [
        'order_items_id', 'suppliers_id', 'is_damage', 'receipt_types_id',
        'repair_price', 'factory_return_time', 'expected_return_time', 'warehouse_id',
        'remark',
    ];

    //设置类型
    protected $casts = [
        'is_damage' => 'boolean',
    ];

    public function returnOrder()
    {
        return $this->belongsTo(ReturnOrder::class, 'return_orders_id');
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_items_id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function receiptType()
    {
        return $this->belongsTo(ReceiptType::class, 'receipt_types_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

}
