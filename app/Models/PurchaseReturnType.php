<?php

namespace App\Models;

class PurchaseReturnType extends Model
{
    protected $table = 'purchase_return_types';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean',
    ];

    public function purchaseReturnDetail()
    {
        return $this->hasMany(PurchaseReturnDetail::class, 'purchase_return_types_id');
    }
}
