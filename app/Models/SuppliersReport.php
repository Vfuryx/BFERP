<?php

namespace App\Models;

class SuppliersReport extends Model
{
    protected $table = "suppliers_reports";

    protected $fillable = [
        'stock_id', 'supplier_id', 'purchase', 'warehousing_quantity', 'consignor',
        'delivery_time', 'fifo',
    ];

    protected $dates = [
        'delivery_time'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
