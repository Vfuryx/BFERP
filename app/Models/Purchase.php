<?php

namespace App\Models;

class Purchase extends Model
{
    protected $table = "purchases";

    protected $fillable = [
        'purchase_order_no', 'purchase_status', 'receiver', 'receiver_address',
        'remark', 'warehouse_id', 'order_no', 'user_id', 'promise_delivery_time',
        'salesman', 'source', 'client_name', 'buyer_nick', 'is_submit', 'is_print',
        'is_check', 'is_change', 'status', 'print_at'
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class,'purchases_id');
    }
}
