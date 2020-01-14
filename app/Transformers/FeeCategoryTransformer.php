<?php

namespace App\Transformers;

use App\Models\FeeCategory;
use League\Fractal\TransformerAbstract;

class FeeCategoryTransformer extends TransformerAbstract
{
    public function transform(FeeCategory $feecategory)
    {
        return [
            'id' => $feecategory->id,
            'name' => $feecategory->name,
            'status' => $feecategory->status,
            'created_at' => $feecategory->created_at
                                    ->toDateTimeString(),
            'updated_at' => $feecategory->updated_at
                                    ->toDateTimeString(),
        ];
    }
}