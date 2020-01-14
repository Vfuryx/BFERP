<?php

namespace App\Transformers;

use App\Models\ReSupplieResponsible;
use League\Fractal\TransformerAbstract;

class ReSupplieResponsibleTransformer extends TransformerAbstract
{
    public function transform(ReSupplieResponsible $reSupplieResponsible)
    {
        return [
            'id' => $reSupplieResponsible->id,
            'name' => $reSupplieResponsible->name,
            'status' => $reSupplieResponsible->status,
            'created_at' => $reSupplieResponsible->created_at
                                    ->toDateTimeString(),
            'updated_at' => $reSupplieResponsible->updated_at
                                    ->toDateTimeString(),
        ];
    }
}