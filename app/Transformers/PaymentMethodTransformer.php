<?php

namespace App\Transformers;

use App\Models\PaymentMethod;
use League\Fractal\TransformerAbstract;

class PaymentMethodTransformer extends TransformerAbstract
{
    public function transform(PaymentMethod $paymentMethod)
    {
        return [
            'id' => $paymentMethod->id,
            'name' => $paymentMethod->name,
            'status' => $paymentMethod->status,
            'created_at' => $paymentMethod->created_at
                                    ->toDateTimeString(),
            'updated_at' => $paymentMethod->updated_at
                                    ->toDateTimeString(),
        ];
    }
}