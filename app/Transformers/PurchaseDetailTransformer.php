<?php

namespace App\Transformers;

use App\Models\PurchaseDetail;
use League\Fractal\TransformerAbstract;

class PurchaseDetailTransformer extends TransformerAbstract
{
    public function transform(PurchaseDetail $purchaseDetail)
    {
        return [
            'id' => $purchaseDetail->id,
            'purchases_id' => $purchaseDetail->purchases_id,
            'product_specs_id' => $purchaseDetail->product_specs_id,
            'purchase_quantity' => $purchaseDetail->purchase_quantity,
            'shops_id' => $purchaseDetail->shops_id,
            'suppliers_id' => $purchaseDetail->suppliers_id,
            'purchase_cost' => $purchaseDetail->purchase_cost,
            'purchase_freight' => $purchaseDetail->purchase_freight,
            'warehouse_cost' => $purchaseDetail->warehouse_cost,
            'commission' => $purchaseDetail->commission,
            'paint' => $purchaseDetail->paint,
            'arrival_time' => $purchaseDetail->arrival_time,
            'remark' => $purchaseDetail->remark,
            'created_at' => $purchaseDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchaseDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }
}