<?php

namespace App\Transformers;

use App\Models\GoodsCategory;
use League\Fractal\TransformerAbstract;

class GoodsCategoryTransformer extends TransformerAbstract
{
    public function transform(GoodsCategory $goodscate)
    {
        return [
            'id' => $goodscate->id,
            'code' => $goodscate->code,
            'name' => $goodscate->name,
            'status' => $goodscate->status,
            'description' => $goodscate->description,
            'remark' => $goodscate->remark,
            'created_at' => $goodscate->created_at
                                    ->toDateTimeString(),
            'updated_at' => $goodscate->updated_at
                                    ->toDateTimeString(),
        ];
    }
}