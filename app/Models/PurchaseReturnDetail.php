<?php

namespace App\Models;

class PurchaseReturnDetail extends Model
{
    protected $table = 'purchase_return_details';

    protected $fillable = [
        'stocks_id', 'purchase_return_quantity', 'suppliers_id', 'price_differences',
        'purchase_return_types_id'
    ];

    public function purchaseReturnType()
    {
        return $this->belongsTo(PurchaseReturnType::class, 'purchase_return_types_id');
    }

    public function purchaseReturn()
    {
        return $this->belongsTo(PurchaseReturn::class, 'purchase_returns_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class,'stocks_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'suppliers_id');
    }


}
