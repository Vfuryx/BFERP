<?php

namespace App\Models;

class PurchaseReturnType extends Model
{
    protected $table = 'purchase_return_types';

    protected $fillable = [
        'name', 'status'
    ];

    public function purchaseReturnDetail()
    {
        return $this->hasMany(PurchaseReturnDetail::class, 'purchase_return_types_id');
    }
}
