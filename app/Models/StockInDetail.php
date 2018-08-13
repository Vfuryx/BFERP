<?php

namespace App\Models;

class StockInDetail extends Model
{
    protected $table = 'stock_in_details';

    protected $fillable = [
        'stock_ins_id', 'purchase_lists_id', 'product_specs_id', 'total_fee',
        'stock_in_quantity', 'remark'
    ];

    public function stockIn()
    {
        return $this->belongsTo(StockIn::class, 'stock_ins_id');
    }

    public function purchaseList()
    {
        return $this->belongsTo(PurchaseList::class, 'purchase_lists_id');
    }

    public function productComponent()
    {
        return $this->belongsTo(ProductComponent::class,'product_components_id');
    }



}
