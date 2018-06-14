<?php

namespace App\Transformers;

use App\Models\FeeType;
use League\Fractal\TransformerAbstract;

class FeeTypeTransformer extends TransformerAbstract
{
    public function transform(FeeType $feetype)
    {
        return [
            'id' => $feetype->id,
            'fee_category_id' => $feetype->fee_category_id,
            'name' => $feetype->name,
            'code' => $feetype->code,
            'is_default' => $feetype->is_default,
            'status' => $feetype->status,
            'remark' => $feetype->remark,
            'created_at' => $feetype->created_at
                                    ->toDateTimeString(),
            'updated_at' => $feetype->updated_at
                                    ->toDateTimeString()
        ];
    }
}