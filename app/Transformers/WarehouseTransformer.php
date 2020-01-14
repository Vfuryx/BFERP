<?php

namespace App\Transformers;

use App\Models\Warehouse;
use League\Fractal\TransformerAbstract;

class WarehouseTransformer extends TransformerAbstract
{
    public function transform(Warehouse $warehouse)
    {
        return [
            'id' => $warehouse->id,
            'name' => $warehouse->name,
            'province' => $warehouse->province,
            'city' => $warehouse->city,
            'district' => $warehouse->district,
            'address' => $warehouse->address,
            'is_default' => $warehouse->is_default,
            'status' => $warehouse->status,
            'created_at' => $warehouse->created_at
                                    ->toDateTimeString(),
            'updated_at' => $warehouse->updated_at
                                    ->toDateTimeString(),
        ];
    }
}