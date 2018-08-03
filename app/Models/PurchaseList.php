<?php

namespace App\Models;

class PurchaseList extends Model
{
    protected $table = "purchase_lists";

    protected $fillable = [
        'purchases_id', 'product_specs_id', 'purchase_quantity', 'shops_id',
        'suppliers_id', 'purchase_cost', 'purchase_freight', 'warehouse_cost',
        'commission', 'discount', 'arrival_time', 'remark',
        'wooden_frame_costs'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchases_id');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_lists_id');
    }

    public function productSpec()
    {
        return $this->belongsTo(ProductSpec::class,'product_specs_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shops_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function stockInDetail()
    {
        return $this->hasOne(StockInDetail::class, 'purchase_lists_id');
    }

}
