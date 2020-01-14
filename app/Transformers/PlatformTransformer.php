<?php

namespace App\Transformers;

use App\Models\Platform;
use League\Fractal\TransformerAbstract;

class PlatformTransformer extends TransformerAbstract
{
    public function transform(Platform $platform)
    {
        return [
            'id' => $platform->id,
            'name' => $platform->name,
            'status' => $platform->status,
            'created_at' => $platform->created_at
                                    ->toDateTimeString(),
            'updated_at' => $platform->updated_at
                                    ->toDateTimeString(),
        ];
    }
}