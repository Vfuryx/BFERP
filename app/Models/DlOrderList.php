<?php

namespace App\Models;

class DlOrderList extends Model
{
    protected $table = 'dl_order_lists';

    protected $fillable = [
        'order_downloads_id', 'oid', 'cid', 'item_oid', 'num_iid', 'title', 'type', 'sku_id',
        'num', 'order_from', 'sku_properties_name', 'total_fee', 'payment', 'discount_fee',
        'adjust_fee', 'price', 'item_meal_name', 'pic_path', 'seller_nick', 'buyer_nick',
        'shipper', 'status', 'refund_status', 'refund_id', 'outer_iid', 'timeout_action_time',
        'modified', 'end_time', 'consign_time', 'is_sh_ship', 'buyer_rate', 'is_oversold',
        'seller_rate', 'estimate_con_time'
    ];

    protected $dates = [
        'timeout_action_time',
        'modified',
        'end_time',
        'consign_time',
    ];

    //设置类型
    protected $casts = [
        'is_sh_ship' => 'boolean',
        'buyer_rate' => 'boolean',
        'is_oversold' => 'boolean',
        'seller_rate' => 'boolean',
    ];

    public function orderDownloads()
    {
        return $this->belongsTo(OrderDownload::class);
    }

}
