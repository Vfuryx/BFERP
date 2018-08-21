<?php

namespace App\Transformers;

use App\Models\CancelPurchaseDetail;
use League\Fractal\TransformerAbstract;

class CancelPurchaseDetailTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'cancelPurchase', 'purchaseDetail'
    ];

    public function transform(CancelPurchaseDetail $cancelPurchaseDetail)
    {
        return [
            'id' => $cancelPurchaseDetail->id,
            'cancel_purchases_id' => $cancelPurchaseDetail->cancel_purchases_id,
            'purchase_details_id' => $cancelPurchaseDetail->purchase_details_id,
            'cancel_purchase_quantity' => $cancelPurchaseDetail->cancel_purchase_quantity,
            'created_at' => $cancelPurchaseDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $cancelPurchaseDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includeCancelPurchase(CancelPurchaseDetail $cancelPurchaseDetail)
    {
        return $this->item($cancelPurchaseDetail->cancelPurchase, new CancelPurchaseTransformer());
    }

    public function includePurchaseDetail(CancelPurchaseDetail $cancelPurchaseDetail)
    {
        return $this->item($cancelPurchaseDetail->purchaseDetail, new PurchaseDetailTransformer());
    }
}