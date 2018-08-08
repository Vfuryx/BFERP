<?php

namespace App\Transformers;

use App\Models\Goods;
use League\Fractal\TransformerAbstract;

class CustomerServiceDepartmentTransformer extends TransformerAbstract
{
    public function transform(Goods $goods)
    {
        return [
            'id' => $goods->id,
            'commodity_code' => $goods->commodity_code,
            'jd_sn' => $goods->jd_sn,
            'vips_sn' => $goods->vips_sn,
            'factory_model' => $goods->factory_model,
            'short_name' => $goods->short_name,
            'shops_id' => $goods->shops_id,
            'shop_nick' => $goods->shop_nick,
            'supplier' => $goods->supplier,
            'category' => $goods->goodsCategory,
            'remark' => $goods->remark,
            'title' => $goods->title,
            'img' => $goods->img,
            'url' => $goods->url,
            'status' => $goods->status,
            'is_stop_pro' => $goods->is_stop_pro,
            'productspecs' => $goods->productSpecs()->with('combinations.comProSpec')->get(),
            'created_at' => $goods->created_at
                                  ->toDateTimeString(),
            'updated_at' => $goods->updated_at
                                  ->toDateTimeString()
        ];
    }
}