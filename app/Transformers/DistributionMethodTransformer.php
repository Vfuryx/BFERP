<?php

namespace App\Transformers;

use App\Models\DistributionMethod;
use League\Fractal\TransformerAbstract;

class DistributionMethodTransformer extends TransformerAbstract
{
    public function transform(DistributionMethod $dismet)
    {
        return [
            'id' => $dismet->id,
            'name' => $dismet->name,
            'status' => $dismet->status,
            'created_at' => $dismet->created_at
                                    ->toDateTimeString(),
            'updated_at' => $dismet->updated_at
                                    ->toDateTimeString(),
        ];
    }
}