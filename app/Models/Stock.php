<?php

namespace App\Models;

use Dingo\Api\Exception\UpdateResourceFailedException;
use phpDocumentor\Reflection\Types\Integer;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [
        'warehouse_id', 'goods_id', 'pro_specs_id', 'quantity', 'status'
    ];
    
    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * 增加库存
     * @param $amount   增加的数量
     */
    public function addQuantity($amount)
    {
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

    /**
     * 根据仓库获取库存信息
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function getStcokByWarehouseId($id ,Array $columns = ['*']){
        return $this->newQuery()->whereWarehouseId($id)->select($columns)->get();
    }

    public function stockDelLogs()
    {
        return $this->hasMany(StockDelLog::class, 'stock_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'supplier_id');
    }

    public function productComponent()
    {
        return $this->belongsTo(ProductComponent::class,'product_components_id');
    }

    public function suppliersReports()
    {
        return $this->hasMany(SuppliersReport::class);
    }

    public function purchaseReturnDetails()
    {
        return $this->hasMany(PurchaseReturnDetail::class,'stocks_id');
    }
}
