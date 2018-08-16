<?php

namespace App\Models;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'commodity_code', 'jd_sn', 'vips_sn', 'factory_model', 'short_name',
        'shop_nick', 'shops_id', 'supplier_id', 'category_id', 'remark', 'title',
        'img', 'url', 'status', 'is_stop_pro'
    ];

    //设置类型
    protected $casts = [
        'is_stop_pro' => 'boolean',
        'status' => 'boolean'
    ];

    public function productComponents()
    {
        return $this->hasMany(ProductComponent::class, 'pid');
    }

    public function combinations()
    {
        return $this->hasMany(Combination::class, 'pid');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shops_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function goodsCategory()
    {
        return $this->belongsTo(GoodsCategory::class, 'category_id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class, 'products_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'products_id');
    }
}
