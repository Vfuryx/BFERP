<?php

namespace App\Transformers;

use App\Models\ProductComponent;
use League\Fractal\TransformerAbstract;

class SaveableProductTransformer extends TransformerAbstract
{
    public function transform(ProductComponent $productComponent)
    {
        $productComponent = $productComponent->load('product');
        return [
            'pid' => $productComponent->product->id,
            'product_components_id' => $productComponent->id,
            'commodity_code' => $productComponent->product->commodity_code,
            'short_name' => $productComponent->product->short_name,
            'component_code' => $productComponent->component_code,
            'spec' => $productComponent->spec,
            'color' => $productComponent->color,
            'materials' => $productComponent->materials,
        ];
    }
}