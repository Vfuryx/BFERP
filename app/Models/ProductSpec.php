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
        'special', 'other', 'length', 'width', 'height', 'volume', 'weight',
        'remark', 'finished_pro', 'is_stop_pro', 'status'
    ];



    public function goods()
    {
        return $this->belongsTo(Goods::class,'goods_id');
    }

    public function combinations()
    {
        return $this->hasMany(Combination::class, 'product_specs_id');
    }

    public function distributionMethod()
    {
        return $this->belongsTo(DistributionMethod::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class, 'pro_specs_id');
    }


    public function stockInDetails()
    {
        return $this->hasMany(StockInDetail::class, 'product_specs_id');
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function purchaseLists()
    {
        return $this->hasMany(PurchaseList::class);
    }
}
