<?php

namespace App\Transformers;

use App\Models\CustomerType;
use League\Fractal\TransformerAbstract;

class CustomerTypeTransformer extends TransformerAbstract
{
    public function transform(CustomerType $customerType)
    {
        return [
            'id' => $customerType->id,
            'name' => $customerType->name,
            'status' => $customerType->status,
            'created_at' => $customerType->created_at
                                    ->toDateTimeString(),
            'updated_at' => $customerType->updated_at
                                    ->toDateTimeString(),
        ];
    }
}