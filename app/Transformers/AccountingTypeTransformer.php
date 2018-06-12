<?php

namespace App\Transformers;

use App\Models\AccountingType as AccType;
use League\Fractal\TransformerAbstract;

class AccountingTypeTransformer extends TransformerAbstract
{
    public function transform(AccType $acctype)
    {
        return [
            'id' => $acctype->id,
            'name' => $acctype->name,
            'sttaus' => $acctype->status,
            'created_at' => $acctype->created_at
                                    ->toDateTimeString(),
            'updated_at' => $acctype->updated_at
                                    ->toDateTimeString(),
        ];
    }
}