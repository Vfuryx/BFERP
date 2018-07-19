<?php

namespace App\Transformers;

use App\Models\StockInType;
use League\Fractal\TransformerAbstract;

class StockInTypeTransformer extends TransformerAbstract
{
    public function transform(StockInType $stockInType)
    {
        return [
            'id' => $stockInType->id,
            'name' => $stockInType->name,
            'status' => $stockInType->status,
            'created_at' => $stockInType->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stockInType->updated_at
                                    ->toDateTimeString(),
        ];
    }
}