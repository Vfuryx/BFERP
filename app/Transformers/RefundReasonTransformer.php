<?php

namespace App\Transformers;

use App\Models\RefundReason;
use League\Fractal\TransformerAbstract;

class RefundReasonTransformer extends TransformerAbstract
{
    public function transform(RefundReason $refundReason)
    {
        return [
            'id' => $refundReason->id,
            'name' => $refundReason->name,
            'status' => $refundReason->status,
            'created_at' => $refundReason->created_at
                                    ->toDateTimeString(),
            'updated_at' => $refundReason->updated_at
                                    ->toDateTimeString(),
        ];
    }
}