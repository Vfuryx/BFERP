<?php

namespace App\Transformers;

use App\Models\Combination;
use League\Fractal\TransformerAbstract;

class CombinationTransformer extends TransformerAbstract
{
    public function transform(Combination $combination)
    {
        $combination = $combination->load('product', 'productComponents');
        return [
            'id' => $combination->id,
            'product' => $combination->product,
            'name' => $combination->name,
            'product_components' => $combination->productComponents,
            'created_at' => $combination->created_at
                ->toDateTimeString(),
            'updated_at' => $combination->updated_at
                ->toDateTimeString()
        ];
    }
}