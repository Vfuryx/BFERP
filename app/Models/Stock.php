<?php

namespace App\Models;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [

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
        return $this->belongsTo(ProductSpec::class);
    }

    public function suppliersReports()
    {
        return $this->hasMany(SuppliersReport::class);
    }

}
