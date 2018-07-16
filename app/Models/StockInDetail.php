<?php

namespace App\Models;

class StockInDetail extends Model
{
    protected $table = 'stock_in_details';

    protected $fillable = [
        'stock_ins_id', 'purchases_id', 'stock_in_quantity'
    ];

    public function stockIn()
    {
        $this->belongsTo(StockIn::class);
    }

}
