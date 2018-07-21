<?php

namespace App\Models;

class StockInDetail extends Model
{
    protected $table = 'stock_in_details';

    protected $fillable = [
        'stock_ins_id', 'purchases_id', 'product_specs_id', 'stock_in_quantity',
        'remark'
    ];

    public function stockIn()
    {
        return $this->belongsTo(StockIn::class,'stock_ins_id');
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class,'purchases_id');
    }

    public function productSpec()
    {
        return $this->belongsTo(ProductSpec::class,'product_specs_id');
    }


}
