<?php

namespace App\Transformers;

use App\Models\Order;
use League\Fractal\TransformerAbstract;

class WarehousingDepartmentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'logistic','distribution'
    ];

    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'logistics_id' => $order->logistics_id,
            'logistics_sn' => $order->logistics_sn,
            'actual_freight' => $order->actual_freight,
            'distributions_id' => $order->distributions_id,
            'distribution_phone' => $order->distribution_phone,
            'deliver_goods_fee' => $order->deliver_goods_fee,
            'move_upstairs_fee' => $order->move_upstairs_fee,
            'installation_fee' => $order->installation_fee,
            'total_distribution_fee' => $order->total_distribution_fee,
            'receiver_name' => $order->receiver_name,
            'receiver_mobile' => $order->receiver_mobile,
        ];
    }

    public function includeLogistic(Order $order)
    {
        return $this->item($order->logistic, new LogisticsTransformer());
    }

    public function includeDistribution(Order $order)
    {
        return $this->item($order->distribution, new DistributionTransformer());
    }
}