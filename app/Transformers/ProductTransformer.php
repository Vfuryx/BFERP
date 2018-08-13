<?php

namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product)
    {
        $product = $product->load('productComponents', 'supplier', 'goodsCategory','combinations.productComponents');
        return [
            'id' => $product->id,
            'commodity_code' => $product->commodity_code,
            'jd_sn' => $product->jd_sn,
            'vips_sn' => $product->vips_sn,
            'factory_model' => $product->factory_model,
            'short_name' => $product->short_name,
            'shops_id' => $product->shops_id,
            'shop_nick' => $product->shop_nick,
            'supplier' => $product->supplier,
            'category' => $product->goodsCategory,
            'remark' => $product->remark,
            'title' => $product->title,
            'img' => $product->img,
            'url' => $product->url,
            'status' => $product->status,
            'is_stop_pro' => $product->is_stop_pro,
            'product_components' => $product->productComponents,
            'combinations' => $product->combinations,
            'created_at' => $product->created_at
                                  ->toDateTimeString(),
            'updated_at' => $product->updated_at
                                  ->toDateTimeString()
        ];
    }
}