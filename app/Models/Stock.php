<?php

namespace App\Models;

use Dingo\Api\Exception\UpdateResourceFailedException;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [
        'warehouse_id','goods_id','pro_specs_id','quantity','status'
    ];


    /**
     * 增加库存
     * @param $amount   增加的数量
     */
    public function addQuantity($amount){
        if ($amount < 0) {
            throw new UpdateResourceFailedException('加库存不可小于0');
        }
        $this->increment('quantity', $amount);
    }

    /**
     * 减少库存
     * @param $amount   减少的数量
     * @return
     */
    public function decreaseQuantity($amount)
    {
        if ($amount < 0) {
            throw new InternalException('减库存不可小于0');
        }

        return $this->newQuery()->where('id', $this->id)->where('quantity', '>=', $amount)->decrement('quantity', $amount);
    }

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
