<?php

namespace App\Models;

class GoodsCategory extends Model
{
    protected $table = 'goods_categories';

    protected $fillable = [
        'code', 'name', 'description', 'remark', 'status'
    ];

    public function goods()
    {
        return $this->hasMany(Goods::class);
    }

}
