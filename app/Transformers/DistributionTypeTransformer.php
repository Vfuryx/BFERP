<?php

namespace App\Transformers;

use App\Models\DistributionType;
use League\Fractal\TransformerAbstract;

class DistributionTypeTransformer extends TransformerAbstract
{
    public function transform(DistributionType $distributionType)
    {
        return [
            'id' => $distributionType->id,
            'name' => $distributionType->name,
            'status' => $distributionType->status,
            'created_at' => $distributionType->created_at
                                    ->toDateTimeString(),
            'updated_at' => $distributionType->updated_at
                                    ->toDateTimeString(),
        ];
    }
}