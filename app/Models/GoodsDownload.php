<?php

namespace App\Models;

class GoodsDownload extends Model
{
    protected $table = 'goods_downloads';

    protected $fillable = [
        'shops_id', 'num_iid', 'cid', 'seller_cids', 'props', 'title', 'price',
        'num', 'nick', 'pic_url', 'approve_status', 'valid_thru', 'type', 'list_time',
        'delist_time', 'modified'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function dlGoodsSkus()
    {
        return $this->hasMany(DlGoodsSku::class, 'goods_downloads_id');
    }

}
