<?php

namespace App\Models;

class PurchaseDetail extends Model
{
    protected $table = "purchase_details";

    protected $fillable = [
        'purchases_id', 'product_specs_id', 'purchase_quantity', 'shops_id',
        'suppliers_id', 'purchase_cost', 'purchase_freight', 'warehouse_cost',
        'commission', 'discount', 'colour_num', 'paint', 'arrival_time', 'remark'
    ];

    public function purchases()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function productSpecs()
    {
        return $this->belongsTo(ProductSpec::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

}
