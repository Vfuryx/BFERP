<?php

namespace App\Models;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [
        'warehouse_id','goods_id','pro_specs_id','quantity','status'
    ];

    public function stockDelLogs()
    {
        return $this->hasMany(StockDelLog::class,'stock_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }

    public function productSpec()
    {
        return $this->belongsTo(ProductSpec::class,'pro_specs_id');
    }

    public function suppliersReports()
    {
        return $this->hasMany(SuppliersReport::class);
    }

}
