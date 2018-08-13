<?php

namespace App\Models;

class GoodsCategory extends Model
{
    protected $table = 'goods_categories';

    protected $fillable = [
        'code', 'name', 'description', 'remark', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'supplier_id');
    }

}
