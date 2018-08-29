<?php

namespace App\Transformers;

use App\Models\PurchaseDetail;
use League\Fractal\TransformerAbstract;

class PurchaseDetailTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'productComponent', 'purchaseList'
    ];

    public function transform(PurchaseDetail $purchaseDetail)
    {
        return [
            'id' => $purchaseDetail->id,
            'purchase_lists_id' => $purchaseDetail->purchase_lists_id,
            'purchase_item_status' => $purchaseDetail->purchase_item_status,
            'product_components_id' => $purchaseDetail->product_components_id,
            'purchase_quantity' => $purchaseDetail->purchase_quantity,
            'stock_in_count' => $purchaseDetail->stock_in_count,
            'shops_id' => $purchaseDetail->shops_id,
            'suppliers_id' => $purchaseDetail->suppliers_id,
            'purchase_cost' => $purchaseDetail->purchase_cost,
            'purchase_freight' => $purchaseDetail->purchase_freight,
            'warehouse_cost' => $purchaseDetail->warehouse_cost,
            'commission' => $purchaseDetail->commission,
            'discount' => $purchaseDetail->discount,
            'wooden_frame_costs' => $purchaseDetail->wooden_frame_costs,
            'arrival_time' => optional($purchaseDetail->arrival_time)->toDateTimeString(),
            'remark' => $purchaseDetail->remark,
            'created_at' => $purchaseDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchaseDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includeProductComponent(PurchaseDetail $purchaseDetail)
    {
        return $this->item($purchaseDetail->productComponent, new ProductComponentTransformer());
    }

    public function includePurchaseList(PurchaseDetail $purchaseDetail)
    {
        return $this->item($purchaseDetail->purchaseList, new PurchaseListTransformer());
    }

}