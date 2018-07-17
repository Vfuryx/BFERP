<?php

namespace App\Transformers;

use App\Models\Stock;
use League\Fractal\TransformerAbstract;

class StockTransformer extends TransformerAbstract
{
    public function transform(Stock $stock)
    {
        return [
            'id' => $stock->id,
            'warehouse' => $stock->warehouse,
            'goods' => $stock->goods,
            'pro_specs' => $stock->productSpec,
            'quantity' => $stock->quantity,
            'status' => $stock->status,
            'created_at' => $stock->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stock->updated_at
                                    ->toDateTimeString(),
        ];
    }
}