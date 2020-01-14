<?php

namespace App\Models;

class StockInDetail extends Model
{
    protected $table = 'stock_in_details';

    protected $fillable = [
        'stock_ins_id', 'purchase_details_id', 'product_components_id', 'total_fee',
        'stock_in_quantity', 'remark'
    ];

    public function stockIn()
    {
        return $this->belongsTo(StockIn::class, 'stock_ins_id');
    }

    public function purchaseDetail()
    {
        return $this->belongsTo(PurchaseDetail::class, 'purchase_details_id');
    }

    public function productComponent()
    {
        return $this->belongsTo(ProductComponent::class,'product_components_id');
    }



}
