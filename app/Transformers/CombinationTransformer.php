<?php

namespace App\Transformers;

use App\Models\Combination;
use League\Fractal\TransformerAbstract;

class CombinationTransformer extends TransformerAbstract
{
    public function transform(Combination $combination)
    {
        return [
            'id' => $combination->id,
            'product_specs' => $combination->productSpec,
            'com_pro_specs' => $combination->comProSpec,
            'count' => $combination->count,
            'status' => $combination->status,
            'created_at' => $combination->created_at
                                    ->toDateTimeString(),
            'updated_at' => $combination->updated_at
                                    ->toDateTimeString()
        ];
    }
}