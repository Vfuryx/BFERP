<?php

namespace App\Models;

use Dingo\Api\Exception\UpdateResourceFailedException;

class ProductComponent extends Model
{
    protected $table = 'product_components';

    protected $fillable = [
        'component_code', 'jd_component_code', 'vips_component_code',
        'tb_price', 'cost', 'price', 'highest_price', 'lowest_price',
        'warehouse_cost', 'assembly_price', 'discount', 'commission',
        'is_common', 'package_quantity', 'package_costs',
        'wooden_frame_costs', 'purchase_freight', 'inventory_warning',
        'purchase_days_warning', 'available_warning', 'distribution_method_id',
        'bar_code', 'img_url', 'spec', 'color', 'materials', 'function',
        'special', 'other', 'longness', 'width', 'height', 'volume', 'weight',
        'remark', 'finished_pro', 'is_stop_pro'
    ];

    //设置类型
    protected $casts = [
        'is_stop_pro' => 'boolean',
        'finished_pro' => 'boolean',
        'is_common' => 'boolean',
    ];

    /**
     * 根据仓库 id 定位库存数据进行入库操作
     * @param $warehouseId      仓库id
     * @param $amount           入库数
     */
    public function stockInByWarehouseId($warehouseId, $amount)
    {
        $stocks = $this->load(['stocks' => function($query) use ($warehouseId, $amount) {
            $query->where('warehouse_id', $warehouseId);
        }])->stocks;
        //判断是否存在库存
        if($stocks->count()){
            $stocks->first()->addQuantity($amount);
        }else{
            //不存在则新建
            \App\Models\Stock::create([
                'warehouse_id'=>$warehouseId,
                'products_id'=>$this->pid,
                'product_components_id'=>$this->id,
                'quantity'=>$amount
            ]);
        }
    }

    /**
     * 根据仓库 id 定位库存数据进行出库操作
     * @param $warehouseId      仓库id
     * @param $amount           出库数
     */
    public function stockOutByWarehouseId($warehouseId, $amount)
    {
        $stocks = $this->load(['stocks' => function($query) use ($warehouseId, $amount) {
            $query->where('warehouse_id', $warehouseId);
        }])->stocks;
        //判断是否存在库存
        if(!$stocks->count()){
            throw new UpdateResourceFailedException('不存在库存');
        }

        $stocks->first()->decreaseQuantity($amount);
    }

    /**
     * 子件是否存在
     *
     * @param $warehouseId      仓库id
     * @param $componentsId     子件id
     * @return bool
     */
    public function productComponentExist($pid, $id)
    {
        $count = $this->newQuery()
            ->where('id', $id)
            ->where('pid', $pid)
            ->count();

        if ($count) return true;

        return false;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'pid');
    }

    public function combinations()
    {
        return $this->belongsToMany(Combination::class, 'combination_product_components','product_components_id','combinations_id');
    }

    public function distributionMethod()
    {
        return $this->belongsTo(DistributionMethod::class,'distribution_method_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'product_components_id');
    }

    public function stockInDetails()
    {
        return $this->hasMany(StockInDetail::class, 'product_components_id');
    }

    public function purchaseDetail()
    {
        return $this->hasOne(PurchaseDetail::class, 'product_components_id');
    }

    public function purchaseLists()
    {
        return $this->hasMany(PurchaseList::class);
    }
}
