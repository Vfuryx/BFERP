<?php

namespace App\Transformers;

use App\Models\ReturnOrderItem;
use App\Models\Warehouse;
use League\Fractal\TransformerAbstract;

class ReturnOrderItemTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'returnOrder', 'orderItem', 'suppliers', 'receiptType', 'warehouse'
    ];

    public function transform(ReturnOrderItem $returnOrderItem)
    {
        return [
            'id' => $returnOrderItem->id,
            'return_orders_id' => $returnOrderItem->return_orders_id,
            'order_items_id' => $returnOrderItem->order_items_id,
            'suppliers_id' => $returnOrderItem->suppliers_id,
            'is_damage' => $returnOrderItem->is_damage,
            'receipt_types_id' => $returnOrderItem->receipt_types_id,
            'repair_price' => $returnOrderItem->repair_price,
            'factory_return_time' => $returnOrderItem->factory_return_time,
            'expected_return_time' => $returnOrderItem->expected_return_time,
            'warehouse_id' => $returnOrderItem->warehouse_id,
            'remark' => $returnOrderItem->remark,
            'created_at' => $returnOrderItem->created_at
                                  ->toDateTimeString(),
            'updated_at' => $returnOrderItem->updated_at
                                  ->toDateTimeString()
        ];
    }

    public function includeReturnOrder(ReturnOrderItem $returnOrderItem)
    {
        return $this->item($returnOrderItem->returnOrder, new ReturnOrderTransformer());
    }

    public function includeOrderItem(ReturnOrderItem $returnOrderItem)
    {
        return $this->item($returnOrderItem->orderItem, new OrderItemTransformer());
    }

    public function includeSuppliers(ReturnOrderItem $returnOrderItem)
    {
        return $this->item($returnOrderItem->suppliers, new SupplierTransformer());
    }

    public function includeReceiptType(ReturnOrderItem $returnOrderItem)
    {
        return $this->item($returnOrderItem->receiptType, new ReceiptTypeTransformer());
    }

    public function includeWarehouse(ReturnOrderItem $returnOrderItem)
    {
        return $this->item($returnOrderItem->warehouse, new WarehouseTransformer());
    }

}