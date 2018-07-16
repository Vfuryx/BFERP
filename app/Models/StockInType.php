<?php

namespace App\Models;

class StockInType extends Model
{
    protected $table = 'stock_in_types';

    protected $fillable = [
        'name', 'status'
    ];

    public function stockIns()
    {
        return $this->hasMany(StockIn::class);
    }

}
