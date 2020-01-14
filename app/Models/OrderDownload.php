<?php

namespace App\Models;

class OrderDownload extends Model
{
    protected $table = 'order_downloads';

    protected $fillable = [
        'shops_id', 'tid', 'num_iid', 'title', 'num', 'seller_nick', 'buyer_nick', 'pic_path',
        'payment', 'seller_rate', 'has_buyer_message', 'post_fee', 'receiver_name', 'receiver_state',
        'receiver_country', 'receiver_city', 'receiver_district', 'receiver_town', 'receiver_address',
        'receiver_zip', 'receiver_mobile', 'receiver_phone', 'consign_time', 'created', 'pay_time',
        'modified', 'end_time', 'shop_pick', 'received_payment', 'status', 'buyer_rate', 'type',
        'price', 'discount_fee', 'credit_card_fee', 'seller_flag', 'step_trade_status', 'step_paid_fee',
        'shipping_type', 'adjust_fee', 'trade_from', 'cutoff_minutes', 'dispatch_time', 'collect_time',
        'delivery_time',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function dlOrderLists()
    {
        return $this->hasMany(DlOrderList::class);
    }

}
