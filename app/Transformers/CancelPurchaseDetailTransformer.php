<?php

namespace App\Transformers;

use App\Models\CancelPurchaseDetail;
use League\Fractal\TransformerAbstract;

class CancelPurchaseDetailTransformer extends TransformerAbstract
{
    public function transform(CancelPurchaseDetail $cancelPurchaseDetail)
    {
        return [
            'id' => $cancelPurchaseDetail->id,
            'cancel_purchase' => $cancelPurchaseDetail->cancelPurchase,
            'purchase_detail' => $cancelPurchaseDetail->purchaseDetail,
            'cancel_purchase_quantity' => $cancelPurchaseDetail->cancel_purchase_quantity,
            'created_at' => $cancelPurchaseDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $cancelPurchaseDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }
}