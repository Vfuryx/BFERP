<?php

namespace App\Transformers;

use App\Models\ReceiptType;
use League\Fractal\TransformerAbstract;

class ReceiptTypeTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];

    public function transform(ReceiptType $receiptType)
    {
        return [
            'id' => $receiptType->id,
            'name' => $receiptType->name,
            'status' => $receiptType->status,
            'created_at' => optional($receiptType->created_at)
                ->toDateTimeString(),
            'updated_at' => optional($receiptType->updated_at)
                ->toDateTimeString(),
        ];
    }

}