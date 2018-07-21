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
            'purchase' => $stockInDetail->purchase,
            'product_spec' => $stockInDetail->productSpec,
            'stock_in_quantity' => $stockInDetail->stock_in_quantity,
            'created_at' => $stockInDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stockInDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }
}