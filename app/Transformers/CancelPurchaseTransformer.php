<?php

namespace App\Transformers;

use App\Models\CancelPurchase;
use League\Fractal\TransformerAbstract;

class CancelPurchaseTransformer extends TransformerAbstract
{
    public function transform(CancelPurchase $cancelPurchase)
    {
        return [
            'id' => $cancelPurchase->id,
            'cancel_purchases_no' => $cancelPurchase->cancel_purchases_no,
            'purchase' => $cancelPurchase->purchase,
            'creator' => $cancelPurchase->creator,
            'submitter' => $cancelPurchase->submitter,
            'submit_at' => $cancelPurchase->submit_at,
            'is_submit' => $cancelPurchase->is_submit,
            'cancel_purchase_details' => $cancelPurchase->cancelPurchaseDetails()->with('purchaseDetail')->get(),
            'created_at' => $cancelPurchase->created_at
                                    ->toDateTimeString(),
            'updated_at' => $cancelPurchase->updated_at
                                    ->toDateTimeString(),
        ];
    }
}