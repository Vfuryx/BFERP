<?php

namespace App\Transformers;

use App\Models\ReSupplieCategorie;
use League\Fractal\TransformerAbstract;

class ReSupplieCategorieTransformer extends TransformerAbstract
{
    public function transform(ReSupplieCategorie $reSupplieCategorie)
    {
        return [
            'id' => $reSupplieCategorie->id,
            'name' => $reSupplieCategorie->name,
            'status' => $reSupplieCategorie->status,
            'created_at' => $reSupplieCategorie->created_at
                                    ->toDateTimeString(),
            'updated_at' => $reSupplieCategorie->updated_at
                                    ->toDateTimeString(),
        ];
    }
}