<?php

namespace App\Transformers;

use App\Models\Warehouse;
use App\Models\FeeType;
use App\Models\Shop;
use App\Models\Logistics;
use App\Models\FreightType;
use App\Models\Distribution;
use App\Models\DistributionMethod;
use App\Models\DistributionType;
use App\Models\TakeDeliveryGoodsWay;
use App\Models\CustomerType;
use App\Models\PaymentMethod;
use League\Fractal\TransformerAbstract;

class CreateOrderDataTransformer extends TransformerAbstract
{
    public function transform()
    {
        return [
            'warehouse' => Warehouse::all(),
            'fee_type' => FeeType::all(),
            'shop' => Shop::all(),
            'logistics' => Logistics::all(),
            'freight_type' => FreightType::all(),
            'distribution' => Distribution::all(),
            'distribution_method' => DistributionMethod::all(),
            'distribution_type' => DistributionType::all(),
            'take_delivery_goodsWay' => TakeDeliveryGoodsWay::all(),
            'customer_type' => CustomerType::all(),
            'payment_method' => PaymentMethod::all(),
        ];
    }
}