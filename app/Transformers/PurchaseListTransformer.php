<?php

namespace App\Transformers;

use App\Models\PurchaseList;
use League\Fractal\TransformerAbstract;

class PurchaseListTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'purchase', 'purchaseDetails'
    ];

    public function transform(PurchaseList $purchaseList)
    {
        return [
            'id' => $purchaseList->id,
            'purchases_id' => $purchaseList->purchases_id,
            'combinations_id' => $purchaseList->combinations_id,
            'remark' => $purchaseList->remark,
            'created_at' => $purchaseList->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchaseList->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includePurchase(PurchaseList $purchaseList)
    {
        return $this->item($purchaseList->purchase, new PurchaseTransformer());
    }

    public function includePurchaseDetails(PurchaseList $purchaseList)
    {
        return $this->collection($purchaseList->purchaseDetails, new PurchaseDetailTransformer());
    }


}