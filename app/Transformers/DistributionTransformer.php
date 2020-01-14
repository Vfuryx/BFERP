<?php

namespace App\Transformers;

use App\Models\Distribution;
use League\Fractal\TransformerAbstract;

class DistributionTransformer extends TransformerAbstract
{
    public function transform(Distribution $distribution)
    {
        return [
            'id' => $distribution->id,
            'name' => $distribution->name,
            'phone' => $distribution->phone,
            'address' => $distribution->address,
            'remark' => $distribution->remark,
            'status' => $distribution->status,
            'created_at' => $distribution->created_at
                                    ->toDateTimeString(),
            'updated_at' => $distribution->updated_at
                                    ->toDateTimeString(),
        ];
    }
}