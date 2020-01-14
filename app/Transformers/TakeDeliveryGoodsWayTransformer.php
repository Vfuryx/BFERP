<?php

namespace App\Transformers;

use App\Models\TakeDeliveryGoodsWay;
use League\Fractal\TransformerAbstract;

class TakeDeliveryGoodsWayTransformer extends TransformerAbstract
{
    public function transform(TakeDeliveryGoodsWay $takeDeliveryGoodsWay)
    {
        return [
            'id' => $takeDeliveryGoodsWay->id,
            'name' => $takeDeliveryGoodsWay->name,
            'status' => $takeDeliveryGoodsWay->status,
            'created_at' => $takeDeliveryGoodsWay->created_at
                                    ->toDateTimeString(),
            'updated_at' => $takeDeliveryGoodsWay->updated_at
                                    ->toDateTimeString(),
        ];
    }
}