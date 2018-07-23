<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    protected $fillable = [
        'commodity_code', 'jd_sn', 'vips_sn', 'factory_model', 'short_name',
        'nick', 'supplier_id', 'category_id', 'remark', 'title',
        'img', 'url', 'status', 'is_stop_pro'
    ];

    public function productSpecs()
    {
        return $this->hasMany(ProductSpec::class, 'goods_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function goodsCategory()
    {
        return $this->belongsTo(GoodsCategory::class, 'category_id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

}
