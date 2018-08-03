<?php

namespace App\Transformers;

use App\Models\StockInDetail;
use League\Fractal\TransformerAbstract;

class StockInDetailTransformer extends TransformerAbstract
{
    public function transform(StockInDetail $stockInDetail)
    {
        return [
            'id' => $stockInDetail->id,
            'stock_in' => $stockInDetail->stockIn,
            'purchase_lists_id' => $stockInDetail->purchase_lists_id,
            'product_spec' => $stockInDetail->productSpec,
            'stock_in_quantity' => $stockInDetail->stock_in_quantity,
            'total_fee' => $stockInDetail->total_fee,
            'remark' => $stockInDetail->remark,
            'created_at' => $stockInDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stockInDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }
}