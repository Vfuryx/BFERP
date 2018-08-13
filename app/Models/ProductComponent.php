<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    protected $dates = [
        'print_at'
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
//        //判断是否组合
//        if ($this->is_combination) {
//            $this->getCombinationsOfALlProductSpec()->map(function($item) use ($warehouseId, $amount) {
//                $stocks = $item->load(['stocks' => function($query) use ($warehouseId, $amount) {
//                    $query->where('warehouse_id', $warehouseId);
//                }])->stocks;
//                //判断是否存在库存
//                if($stocks->count()){
//                    $stocks->first()->addQuantity($amount);
//                }else{
//                    //不存在则新建
//                    \App\Models\Stock::create([
//                        'warehouse_id'=>$warehouseId,
//                        'goods_id'=>$this->goods_id,
//                        'pro_specs_id'=>$this->id,
//                        'quantity'=>$amount
//                    ]);
//                }
//            });
//        } else {
//            //不是组合直接录入
//            $stocks = $this->load(['stocks' => function($query) use ($warehouseId, $amount) {
//                $query->where('warehouse_id', $warehouseId);
//            }])->stocks;
//            //判断是否存在库存
//            if($stocks->count()){
//                $stocks->first()->addQuantity($amount);
//            }else{
//                //不存在则新建
//                \App\Models\Stock::create([
//                    'warehouse_id'=>$warehouseId,
//                    'goods_id'=>$this->goods_id,
//                    'pro_specs_id'=>$this->id,
//                    'quantity'=>$amount
//                ]);
//            }
//        }
    }


    /**
     * 获取组合里面的所有子规格
     *
     * @return mix    object 返回的是组合的子规格对象集 或者 false
     */
    public function getCombinationsOfALlProductSpec()
    {
//        //不是组合规格
//        if(!$this->is_combination)
//            return false;
//
//        return $this->load('combinations.comProSpec')->combinations->pluck('comProSpec');
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
