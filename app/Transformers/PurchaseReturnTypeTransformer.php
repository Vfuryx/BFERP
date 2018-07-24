<?php

namespace App\Transformers;

use App\Models\PurchaseReturnType;
use League\Fractal\TransformerAbstract;

class PurchaseReturnTypeTransformer extends TransformerAbstract
{
    public function transform(PurchaseReturnType $purchaseReturnType)
    {
        return [
            'id' => $purchaseReturnType->id,
            'name' => $purchaseReturnType->name,
            'status' => $purchaseReturnType->status,
            'created_at' => $purchaseReturnType->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchaseReturnType->updated_at
                                    ->toDateTimeString(),
        ];
    }
}