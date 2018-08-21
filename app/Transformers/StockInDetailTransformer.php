<?php

namespace App\Transformers;

use App\Models\StockInDetail;
use League\Fractal\TransformerAbstract;

class StockInDetailTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'stockIn', 'purchaseDetail','productComponent'
    ];

    public function transform(StockInDetail $stockInDetail)
    {
        return [
            'id' => $stockInDetail->id,
            'stock_ins_id' => $stockInDetail->stock_ins_id,
            'purchase_details_id' => $stockInDetail->purchase_details_id,
            'product_components_id' => $stockInDetail->product_components_id,
            'stock_in_quantity' => $stockInDetail->stock_in_quantity,
            'total_fee' => $stockInDetail->total_fee,
            'remark' => $stockInDetail->remark,
            'created_at' => $stockInDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stockInDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includeStockIn(StockInDetail $stockInDetail)
    {
        return $this->item($stockInDetail->stockIn, new StockInTransformer());
    }

    public function includePurchaseDetail(StockInDetail $stockInDetail)
    {
        return $this->item($stockInDetail->purchaseDetail, new PurchaseDetailTransformer());
    }

    public function includeProductComponent(StockInDetail $stockInDetail)
    {
        return $this->item($stockInDetail->productComponent, new ProductComponentTransformer());
    }



}