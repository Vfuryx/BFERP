<?php

namespace App\Models;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    protected $fillable = [
        'name', 'province', 'city', 'district',
        'address', 'is_default', 'status'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function stockIns()
    {
        return $this->hasMany(StockIn::class, 'warehouse_id');
    }

}
