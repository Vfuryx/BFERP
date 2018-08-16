<?php

namespace App\Transformers;

use App\Models\PurchaseReturnDetail;
use League\Fractal\TransformerAbstract;

class PurchaseReturnDetailTransformer extends TransformerAbstract
{
    public function transform(PurchaseReturnDetail $purchaseReturnDetail)
    {
        $purchaseReturnDetail = $purchaseReturnDetail->load('purchaseReturn', 'stock', 'supplier', 'purchaseReturnType');
        return [
            'id' => $purchaseReturnDetail->id,
            'purchase_return' => $purchaseReturnDetail->purchaseReturn,
            'stock' => $purchaseReturnDetail->stock,
            'purchase_return_quantity' => $purchaseReturnDetail->purchase_return_quantity,
            'supplier' => $purchaseReturnDetail->supplier,
            'price_differences' => $purchaseReturnDetail->price_differences,
            'purchase_return_type' => $purchaseReturnDetail->purchaseReturnType,
            'created_at' => $purchaseReturnDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchaseReturnDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }
}