<?php

namespace App\Models;

class ReturnReason extends Model
{
    protected $table = 'return_reasons';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean',
    ];

    public function refundOrders()
    {
        return $this->hasMany(RefundOrder::class, 'payment_methods_id');
    }

}
