<?php

namespace App\Models;

class StockIn extends Model
{
    protected $table = 'stock_ins';

    protected $fillable = [
        'stock_in_no', 'warehouse_id', 'stock_in_types_id', 'order_at', 'is_submit',
        'is_check'
    ];

    public function stockInType()
    {
        return $this->belongsTo(StockInType::class);
    }

    public function stockInDetails()
    {
        return $this->hasMany(StockInDetail::class);
    }

}
