<?php

namespace App\Transformers;

use App\Models\Shop;
use League\Fractal\TransformerAbstract;

class ShopTransformer extends TransformerAbstract
{
    public function transform(Shop $shop)
    {
        return [
            'id' => $shop->id,
            'nick' => $shop->nick,
            'title' => $shop->title,
            'session_key' => $shop->session_key,
            'warehouse' => $shop->warehouse,
            'shop_account' => $shop->shop_account,
            'shop_passwd' => $shop->shop_passwd,
            'rebate' => $shop->rebate,
            'principal' => $shop->principal,
            'principal_mobile' => $shop->principal_mobile,
            'province' => $shop->province,
            'city' => $shop->city,
            'district' => $shop->district,
            'address' => $shop->address,
            'gross_profit_rate' => $shop->gross_profit_rate,
            'platform' => $shop->platform,
            'is_waybill' => $shop->is_waybill,
            'status' => $shop->status,
            'created_at' => $shop->created_at
                                    ->toDateTimeString(),
            'updated_at' => $shop->updated_at
                                    ->toDateTimeString(),
        ];
    }
}