<?php

namespace App\Transformers;

use App\Models\Purchase;
use League\Fractal\TransformerAbstract;

class PurchaseTransformer extends TransformerAbstract
{
    public function transform(Purchase $purchase)
    {
        return [
            'id' => $purchase->id,
            'purchase_order_no' => $purchase->purchase_order_no,
            'purchase_status' => $purchase->purchase_status,
            'order_no' => $purchase->order_no,
            'user_id' => $purchase->user_id,
            'receiver' => $purchase->receiver,
            'receiver_address' => $purchase->receiver_address,
            'warehouse_id' => $purchase->warehouse_id,
            'promise_delivery_time' => $purchase->promise_delivery_time,
            'salesman' => $purchase->salesman,
            'source' => $purchase->source,
            'client_name' => $purchase->client_name,
            'buyer_nick' => $purchase->buyer_nick,
            'order_address' => $purchase->order_address,
            'is_submit' => $purchase->is_submit,
            'is_print' => $purchase->is_print,
            'is_check' => $purchase->is_check,
            'is_change' => $purchase->is_change,
            'remark' => $purchase->remark,
            'status' => $purchase->status,
            'purchase_details' => $purchase->purchaseDetails,
            'created_at' => $purchase->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchase->updated_at
                                    ->toDateTimeString(),
        ];
    }
}