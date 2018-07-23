<?php

namespace App\Models;

class CancelPurchaseDetail extends Model
{
    protected $table = 'cancel_purchase_details';

    protected $fillable = [
        'purchase_details_id', 'cancel_purchase_quantity'
    ];

    public function cancelPurchase()
    {
        return $this->belongsTo(CancelPurchase::class, 'cancel_purchases_id');
    }

    public function purchaseDetail()
    {
        return $this->belongsTo(PurchaseDetail::class,'purchase_details_id');
    }
}
