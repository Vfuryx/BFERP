<?php

namespace App\Transformers;

use App\Models\DamagedGoods;
use League\Fractal\TransformerAbstract;

class DamagedGoodsTransformer extends TransformerAbstract
{
    public function transform(DamagedGoods $damagedgoods)
    {
        return [
            'id' => $damagedgoods->id,
            'order_no' => $damagedgoods->order_no,
            'good_sn' => $damagedgoods->good_sn,
            'standard_code' => $damagedgoods->standard_code,
            'quantity' => $damagedgoods->quantity,
            'money' => $damagedgoods->money,
            'remark' => $damagedgoods->remark,
            'created_at' => $damagedgoods->created_at
                                    ->toDateTimeString(),
            'updated_at' => $damagedgoods->updated_at
                                    ->toDateTimeString(),
        ];
    }
}