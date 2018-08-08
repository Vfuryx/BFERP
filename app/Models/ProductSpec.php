<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    protected $table = 'product_specs';

    protected $fillable = [
        'goods_id', 'spec_code', 'jd_specs_code', 'vips_specs_code',
        'tb_price', 'cost', 'price', 'highest_price', 'lowest_price',
        'warehouse_cost', 'assembly_price', 'discount', 'commission',
        'is_combination', 'package_quantity', 'package_costs',
        'wooden_frame_costs', 'purchase_freight', 'inventory_warning',
        'purchase_days_warning', 'available_warning', 'distribution_method_id',
        'bar_code', 'img_url', 'spec', 'color', 'materials', 'function',
        'special', 'other', 'longness', 'width', 'height', 'volume', 'weight',
        'remark', 'finished_pro', 'is_stop_pro', 'status'
    ];

    protected $dates = [
        'print_at'
    ];

    //设置类型
    protected $casts = [
        'is_stop_pro' => 'boolean',
        'finished_pro' => 'boolean',
        'is_combination' => 'boolean',
    ];

    /**
     * 根据仓库 id 定位库存数据进行入库操作
     * @param $warehouseId      仓库id
     * @param $amount           入库数
     */
    public function stockInByWarehouseId($warehouseId, $amount)
    {
        //判断是否组合
        if ($this->is_combination) {
            $this->getCombinationsOfALlProductSpec()->map(function($item) use ($warehouseId, $amount) {
                $stocks = $item->load(['stocks' => function($query) use ($warehouseId, $amount) {
                    $query->where('warehouse_id', $warehouseId);
                }])->stocks;
                //判断是否存在库存
                if($stocks->count()){
                    $stocks->first()->addQuantity($amount);
                }else{
                    //不存在则新建
                    \App\Models\Stock::create([
                        'warehouse_id'=>$warehouseId,
                        'goods_id'=>$this->goods_id,
                        'pro_specs_id'=>$this->id,
                        'quantity'=>$amount
                    ]);
                }
            });
        } else {
            //不是组合直接录入
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
                    'goods_id'=>$this->goods_id,
                    'pro_specs_id'=>$this->id,
                    'quantity'=>$amount
                ]);
            }
        }
    }


    /**
     * 获取组合里面的所有子规格
     *
     * @return mix    object 返回的是组合的子规格对象集 或者 false
     */
    public function getCombinationsOfALlProductSpec()
    {
        //不是组合规格
        if(!$this->is_combination)
            return false;

        return $this->load('combinations.comProSpec')->combinations->pluck('comProSpec');
    }


    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }

    public function combinations()
    {
        return $this->hasMany(Combination::class, 'product_specs_id');
    }

    public function distributionMethod()
    {
        return $this->belongsTo(DistributionMethod::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'pro_specs_id');
    }


    public function stockInDetails()
    {
        return $this->hasMany(StockInDetail::class, 'product_specs_id');
    }

    public function purchaseDetail()
    {
        return $this->hasOne(PurchaseDetail::class, 'product_specs_id');
    }

    public function purchaseLists()
    {
        return $this->hasMany(PurchaseList::class);
    }
}
