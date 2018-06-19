<?php

namespace App\Transformers;

use App\Models\FreightType;
use League\Fractal\TransformerAbstract;

class FreightTypeTransformer extends TransformerAbstract
{
    public function transform(FreightType $freighttype)
    {
        return [
            'id' => $freighttype->id,
            'name' => $freighttype->name,
            'status' => $freighttype->status,
            'is_default' => $freighttype->is_default,
            'created_at' => $freighttype->created_at
                                        ->toDateTimeString(),
            'updated_at' => $freighttype->updated_at
                                        ->toDateTimeString(),
        ];
    }
}