<?php

namespace App\Models;

class PurchaseList extends Model
{
    protected $table = "purchase_lists";

    protected $fillable = [
        'purchases_id', 'combinations_id', 'remark'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchases_id');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_lists_id');
    }

    public function combinations()
    {
        return $this->belongsTo(Combination::class,'combinations_id');
    }
}
