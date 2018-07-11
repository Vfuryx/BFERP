<?php

namespace App\Models;

class DlGoodsSku extends Model
{
    protected $table = 'dl_goods_skus';

    protected $fillable = [
        'goods_downloads_id', 'sku_id', 'num_iid', 'properties', 'properties_name', 'quantity', 'price',
        'sku_spec_id', 'outer_id', 'created', 'modified', 'status',
    ];


    public function goodsDownload()
    {
        return $this->hasMany(GoodsDownload::class, 'goods_downloads_id');
    }


}
