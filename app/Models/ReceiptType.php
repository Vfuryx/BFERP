<?php

namespace App\Models;

class ReceiptType extends Model
{
    protected $table = 'receipt_types';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function returnOrderItems()
    {
        return $this->hasMany(ReturnOrderItem::class, 'receipt_types_id');
    }

}
