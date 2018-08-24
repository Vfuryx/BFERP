<?php

namespace App\Transformers;

use App\Models\Order;
use League\Fractal\TransformerAbstract;

class CargoAuditTransformer extends TransformerAbstract
{

    public function transform(Order $order)
    {
        $order = $order->load('orderItems.combination.productComponents');

        $warehouseId = $order->warehouses_id;

        //遍历子订单，标记库存是否充足
        $order->orderItems->flatMap(function($item) use ($warehouseId){
            $quantity = $item->combination->productComponents->map(function($item) use ($warehouseId){
                return optional($item->stocks->where('warehouse_id',$warehouseId)->first())->quantity ?? 0;
            })->min();
            $item->combination['quantity'] = $quantity;
            return $item;
        });

        return [
            'logistics_id' => $order->logistics_id,
            'freight_types_id' => $order->freight_types_id,
            'expected_freight' => $order->expected_freight,
            'distributions_id' => $order->distributions_id,
            'distribution_methods_id' => $order->distribution_methods_id,
            'deliver_goods_fee' => $order->deliver_goods_fee,
            'move_upstairs_fee' => $order->move_upstairs_fee,
            'installation_fee' => $order->installation_fee,
            'total_distribution_fee' => $order->total_distribution_fee,
            'distribution_phone' => $order->distribution_phone,
            'distribution_types_id' => $order->distribution_types_id,
            'express_fee' => $order->express_fee,
            'warehouses_id' => $order->warehouses_id,
            'order_items' => $order->orderItems,
            'created_at' => $order->created_at
                                  ->toDateTimeString(),
            'updated_at' => $order->updated_at
                                  ->toDateTimeString()
        ];
    }

}