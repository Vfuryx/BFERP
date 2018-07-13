<?php

namespace App\Models;

class StockDelLog extends Model
{
    protected $table="stock_del_logs";

    protected $fillable = [
        'stock_id', 'user_id', 'commodity_code', 'specs_code', 'warehouse_name',
        'stock_quantity'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class,'stock_id');
    }
}
