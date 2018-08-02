<?php

namespace App\Models;

use Dingo\Api\Exception\UpdateResourceFailedException;

class PurchaseDetail extends Model
{
    protected $table = "purchase_details";

    protected $fillable = [
        'product_specs_id', 'purchase_quantity', 'shops_id',
        'suppliers_id', 'purchase_cost', 'purchase_freight', 'warehouse_cost',
        'commission', 'discount', 'arrival_time', 'remark',
        'wooden_frame_costs'
    ];

    public function getPurchaseItemStatusAttribute($value)
    {
        return \App\Models\Purchase::$purchaseStatusMap[$value ? $value : \App\Models\Purchase::PURCHASE_STATUS_NEW];
    }

    //添加入库数
    public function addStockInCount($amount)
    {
        if (!in_array($this->getOriginal('purchase_item_status'), [\App\Models\Purchase::PURCHASE_STATUS_NEW, \App\Models\Purchase::PURCHASE_STATUS_SECTION])) {
            throw new UpdateResourceFailedException('入库错误，查看订单是否已经完成');
        }
        if ($amount < 0) {
            throw new UpdateResourceFailedException('数量不可小于0');
        }
        if ($this->purchase_quantity - $this->stock_in_count < $amount) {
            throw new UpdateResourceFailedException('入库数量超过采购数量');
        }
        $this->increment('stock_in_count', $amount);

        if($this->stock_in_count){

            //设置子订单状态
            if ($this->stock_in_count == $this->purchase_quantity) {
                $this->purchase_item_status = \App\Models\Purchase::PURCHASE_STATUS_FINISH;
            } else {
                $this->purchase_item_status = \App\Models\Purchase::PURCHASE_STATUS_SECTION;
            }

            $this->save();

            //设置父订单状态
            $itemFinishCount = $this->where('purchases_id', $this->purchases_id)->where('purchase_item_status', \App\Models\Purchase::PURCHASE_STATUS_FINISH)->count();
            $itemCount = $this->where('purchases_id', $this->purchases_id)->count();

            if ($this->purchases->getOriginal('purchase_status') == \App\Models\Purchase::PURCHASE_STATUS_NEW && $itemCount == $itemFinishCount) {
                $this->purchases->setPurchaseStatus(\App\Models\Purchase::PURCHASE_STATUS_FINISH);
            }

            if ($this->purchases->getOriginal('purchase_status') == \App\Models\Purchase::PURCHASE_STATUS_NEW && $itemCount != $itemFinishCount) {
                $this->purchases->setPurchaseStatus(\App\Models\Purchase::PURCHASE_STATUS_SECTION);
            }

            if ($this->purchases->getOriginal('purchase_status') == \App\Models\Purchase::PURCHASE_STATUS_SECTION && $itemCount == $itemFinishCount) {
                $this->purchases->setPurchaseStatus(\App\Models\Purchase::PURCHASE_STATUS_FINISH);
            }
        }
    }

    //减少采购数
    public function decreasePurchaseQuantity($amount)
    {
        if (!in_array($this->getOriginal('purchase_item_status'), [\App\Models\Purchase::PURCHASE_STATUS_NEW, \App\Models\Purchase::PURCHASE_STATUS_SECTION])) {
            throw new UpdateResourceFailedException('出错，查看订单是否已经完成');
        }

        if ($amount < 0) {
            throw new UpdateResourceFailedException('数量不可小于0');
        }

        if ($this->purchase_quantity - $this->stock_in_count < $amount) {
            throw new UpdateResourceFailedException('要减少的采购数不足');
        }

        $this->decrement('purchase_quantity', $amount);

        if($this->stock_in_count){
            //设置子订单状态
            if ($this->stock_in_count == $this->purchase_quantity) {
                $this->purchase_item_status = \App\Models\Purchase::PURCHASE_STATUS_FINISH;
            } else {
                $this->purchase_item_status = \App\Models\Purchase::PURCHASE_STATUS_SECTION;
            }

            $this->save();

            //设置父订单状态
            $itemFinishCount = $this->where('purchases_id', $this->purchases_id)->where('purchase_item_status', \App\Models\Purchase::PURCHASE_STATUS_FINISH)->count();
            $itemCount = $this->where('purchases_id', $this->purchases_id)->count();

            if ($this->purchases->getOriginal('purchase_status') == \App\Models\Purchase::PURCHASE_STATUS_NEW && $itemCount == $itemFinishCount) {
                $this->purchases->setPurchaseStatus(\App\Models\Purchase::PURCHASE_STATUS_FINISH);
            }

            if ($this->purchases->getOriginal('purchase_status') == \App\Models\Purchase::PURCHASE_STATUS_NEW && $itemCount != $itemFinishCount) {
                $this->purchases->setPurchaseStatus(\App\Models\Purchase::PURCHASE_STATUS_SECTION);
            }

            if ($this->purchases->getOriginal('purchase_status') == \App\Models\Purchase::PURCHASE_STATUS_SECTION && $itemCount == $itemFinishCount) {
                $this->purchases->setPurchaseStatus(\App\Models\Purchase::PURCHASE_STATUS_FINISH);
            }
        }

    }


    public function purchaseList()
    {
        return $this->belongsTo(PurchaseList::class, 'purchase_lists_id');
    }

    public function productSpec()
    {
        return $this->belongsTo(ProductSpec::class,'product_specs_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shops_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function stockInDetails()
    {
        return $this->hasMany(StockInDetail::class, 'purchase_details_id');
    }

    public function cancelPurchaseDetails()
    {
        return $this->hasMany(CancelPurchaseDetail::class,'purchase_details_id');
    }
}
