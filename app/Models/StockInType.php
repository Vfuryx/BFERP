<?php

namespace App\Models;

class StockInType extends Model
{
    protected $table = 'stock_in_types';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function stockIns()
    {
        return $this->hasMany(StockIn::class, 'stock_in_types_id');
    }

}
