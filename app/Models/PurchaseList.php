<?php

namespace App\Models;

class PurchaseList extends Model
{
    protected $table = "purchase_lists";

    protected $fillable = [
        'purchases_id', 'product_specs_id', 'purchase_quantity', 'shops_id',
        'commodity_code', 'suppliers_id', 'purchase_cost',
        'purchase_freight', 'warehouse_cost', 'commission', 'discount',
        'arrival_time', 'remark', 'wooden_frame_costs'
    ];

    /**
     * 添加入库数量
     *
     * @param $amount 数量
     */
    public function addStockInCount($amount)
    {
        if ($amount < 0) {
            throw new UpdateResourceFailedException('数量不可小于0');
        }
        if ($this->purchase_quantity - $this->stock_in_count < $amount) {
            throw new UpdateResourceFailedException('入库数量超过采购数量');
        }

        $this->increment('stock_in_count', $amount);

        $this->save();
        return true;
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchases_id');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_lists_id');
    }

    public function productComponent()
    {
        return $this->belongsTo(ProductComponent::class,'product_components_id');
    }


    public function shop()
    {
        return $this->belongsTo(Shop::class,'shops_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function stockInDetail()
    {
        return $this->hasOne(StockInDetail::class, 'purchase_lists_id');
    }

}
