<?php

namespace App\Transformers;

use App\Models\Product;
use App\Models\Shop;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'productComponents','shop','supplier','goodsCategory','combinations'
    ];

    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'commodity_code' => $product->commodity_code,
            'jd_sn' => $product->jd_sn,
            'vips_sn' => $product->vips_sn,
            'factory_model' => $product->factory_model,
            'short_name' => $product->short_name,
            'shops_id' => $product->shops_id,
            'shop_nick' => $product->shop_nick,
            'supplier_id' => $product->supplier_id,
            'category_id' => $product->category_id,
            'remark' => $product->remark,
            'title' => $product->title,
            'img' => $product->img,
            'url' => $product->url,
            'status' => $product->status,
            'is_stop_pro' => $product->is_stop_pro,
            'created_at' => $product->created_at
                                  ->toDateTimeString(),
            'updated_at' => $product->updated_at
                                  ->toDateTimeString()
        ];
    }

    public function includeProductComponents(Product $product)
    {
        return $this->collection($product->productComponents, new ProductComponentTransformer());
    }

    public function includeShop(Product $product)
    {
        return $this->item($product->shop, new ShopTransformer());
    }

    public function includeSupplier(Product $product)
    {
        return $this->item($product->supplier, new SupplierTransformer());
    }

    public function includeGoodsCategory(Product $product)
    {
        return $this->item($product->goodsCategory, new GoodsCategoryTransformer());
    }
    public function includeCombinations(Product $product)
    {
        return $this->collection($product->combinations, new CombinationTransformer());
    }


}