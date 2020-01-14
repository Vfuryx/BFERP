<?php

namespace App\Transformers;

use App\Models\ReturnReason;
use League\Fractal\TransformerAbstract;

class ReturnReasonTransformer extends TransformerAbstract
{
    public function transform(ReturnReason $returnReason)
    {
        return [
            'id' => $returnReason->id,
            'name' => $returnReason->name,
            'status' => $returnReason->status,
            'created_at' => $returnReason->created_at
                                    ->toDateTimeString(),
            'updated_at' => $returnReason->updated_at
                                    ->toDateTimeString(),
        ];
    }
}