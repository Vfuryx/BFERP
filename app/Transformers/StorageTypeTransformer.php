<?php

namespace App\Transformers;

use App\Models\StorageType;
use League\Fractal\TransformerAbstract;

class StorageTypeTransformer extends TransformerAbstract
{
    public function transform(StorageType $storagetype)
    {
        return [
            'id' => $storagetype->id,
            'name' => $storagetype->name,
            'created_at' => $storagetype->created_at
                                    ->toDateTimeString(),
            'updated_at' => $storagetype->updated_at
                                    ->toDateTimeString(),
        ];
    }
}