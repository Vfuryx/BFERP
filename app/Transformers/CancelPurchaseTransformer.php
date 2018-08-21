<?php

namespace App\Transformers;

use App\Models\CancelPurchase;
use League\Fractal\TransformerAbstract;

class CancelPurchaseTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'purchase', 'cancelPurchaseDetails'
    ];

    public function transform(CancelPurchase $cancelPurchase)
    {
        return [
            'id' => $cancelPurchase->id,
            'cancel_purchases_no' => $cancelPurchase->cancel_purchases_no,
            'purchases_id' => $cancelPurchase->purchases_id,
            'creator' => $cancelPurchase->creator,
            'submitter' => $cancelPurchase->submitter,
            'submit_at' => optional($cancelPurchase->submit_at)->toDateTimeString(),
            'is_submit' => $cancelPurchase->is_submit,
            'status' => $cancelPurchase->status,
            'created_at' => $cancelPurchase->created_at
                                    ->toDateTimeString(),
            'updated_at' => $cancelPurchase->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includePurchase(CancelPurchase $cancelPurchase)
    {
        return $this->item($cancelPurchase->purchase, new PurchaseTransformer());
    }

    public function includeCancelPurchaseDetails(CancelPurchase $cancelPurchase)
    {
        return $this->collection($cancelPurchase->cancelPurchaseDetails, new CancelPurchaseDetailTransformer());
    }

}