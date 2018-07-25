<?php

namespace App\Transformers;

use App\Models\ProductSpec;
use League\Fractal\TransformerAbstract;

class SaveableProductTransformer extends TransformerAbstract
{
    public function transform(ProductSpec $productSpec)
    {
        return [
            'goods_id' => $productSpec->goods->id,
            'product_spec_id' => $productSpec->id,
            'commodity_code' => $productSpec->goods->commodity_code,
            'short_name' => $productSpec->goods->short_name,
            'pro_specs' => $productSpec->spec_code,
            'spec' => $productSpec->spec,
            'color' => $productSpec->color,
            'materials' => $productSpec->materials,
        ];
    }
}