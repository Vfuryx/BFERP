<?php

namespace App\Transformers;

use App\Models\Stock;
use League\Fractal\TransformerAbstract;

class StockTransformer extends TransformerAbstract
{
    public function transform(Stock $stock)
    {
        $stock = $stock->load('product','productComponent');
        return [
            'id' => $stock->id,
            'warehouse' => $stock->warehouse,
            'product' => $stock->product,
            'product_component' => $stock->productComponent,
            'quantity' => $stock->quantity,
            'status' => $stock->status,
            'created_at' => $stock->created_at
                                  ->toDateTimeString(),
            'updated_at' => $stock->updated_at
                                  ->toDateTimeString(),
        ];
    }
}