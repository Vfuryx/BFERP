<?php

namespace App\Models;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    protected $fillable = [
        'name', 'province', 'city', 'district',
        'address', 'is_default', 'status'
    ];

    //设置类型
    protected $casts = [
        'is_default' => 'boolean',
        'status' => 'boolean'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function stockIns()
    {
        return $this->hasMany(StockIn::class, 'warehouse_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'warehouses_id');
    }

}
