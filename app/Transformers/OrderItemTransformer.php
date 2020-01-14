<?php

namespace App\Transformers;

use App\Models\OrderItem;
use League\Fractal\TransformerAbstract;

class OrderItemTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'order', 'product', 'combination'
    ];

    public function transform(OrderItem $orderItem)
    {
        return [
            'id' => $orderItem->id,
            'orders_id' => $orderItem->orders_id,
            'products_id' => $orderItem->products_id,
            'combinations_id' => $orderItem->combinations_id,
            'quantity' => $orderItem->quantity,
            'total_volume' => $orderItem->total_volume,
            'paint' => $orderItem->paint,
            'is_printing' => $orderItem->is_printing,
            'printing_fee' => $orderItem->printing_fee,
            'is_spot_goods' => $orderItem->is_spot_goods,
            'under_line_univalent' => $orderItem->under_line_univalent,
            'under_line_total_amount' => $orderItem->under_line_total_amount,
            'under_line_preferential' => $orderItem->under_line_preferential,
            'under_line_payment' => $orderItem->under_line_payment,
            'created_at' => $orderItem->created_at
                                  ->toDateTimeString(),
            'updated_at' => $orderItem->updated_at
                                  ->toDateTimeString()
        ];
    }

    public function includeOrder(OrderItem $orderItem)
    {
        return $this->item($orderItem->order, new ShopTransformer());
    }

    public function includeProduct(OrderItem $orderItem)
    {
        return $this->item($orderItem->product, new ProductTransformer());
    }

    public function includeCombination(OrderItem $orderItem)
    {
        return $this->item($orderItem->combination, new CombinationTransformer());
    }
}