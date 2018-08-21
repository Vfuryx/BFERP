<?php

namespace App\Transformers;

use App\Models\Purchase;
use League\Fractal\TransformerAbstract;

class PurchaseTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'user','purchaseLists','cancelPurchases'
    ];

    public function transform(Purchase $purchase)
    {
        return [
            'id' => $purchase->id,
            'purchase_order_no' => $purchase->purchase_order_no,
            'purchase_status' => $purchase->purchase_status,
            'order_no' => $purchase->order_no,
            'user_id' => $purchase->user_id,
            'print_at' => optional($purchase->print_at)->toDateTimeString(),
            'receiver' => $purchase->receiver,
            'receiver_address' => $purchase->receiver_address,
            'promise_ship_time' => optional($purchase->promise_ship_time)->toDateString(),
            'business_personnel' => $purchase->business_personnel,
            'source' => $purchase->source,
            'client_name' => $purchase->client_name,
            'buyer_nick' => $purchase->buyer_nick,
            'order_address' => $purchase->order_address,
            'is_submit' => $purchase->is_submit,
            'is_print' => $purchase->is_print,
            'is_audit' => $purchase->is_audit,
            'is_change' => $purchase->is_change,
            'remark' => $purchase->remark,
            'status' => $purchase->status,
        ];
    }

    public function includeUser(Purchase $purchase)
    {
        return $this->item($purchase->user, new UserTransformer());
    }

    public function includePurchaseLists(Purchase $purchase)
    {
        return $this->collection($purchase->purchaseLists, new PurchaseListTransformer());
    }

    public function includeCancelPurchases(Purchase $purchase)
    {
        return $this->collection($purchase->cancelPurchases, new CancelPurchaseTransformer());
    }

}