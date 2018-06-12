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
            'sttaus' => $freighttype->default,
            'created_at' => $freighttype->created_at
                                        ->toDateTimeString(),
            'updated_at' => $freighttype->updated_at
                                        ->toDateTimeString(),
        ];
    }
}