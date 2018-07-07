<?php

namespace App\Transformers;

use App\Models\Logistics;
use League\Fractal\TransformerAbstract;

class LogisticsTransformer extends TransformerAbstract
{
    public function transform(Logistics $logistics)
    {
        return [
            'id' => $logistics->id,
            'code' => $logistics->code,
            'name' => $logistics->name,
            'report' => $logistics->printReport,
//            'logistics_area' => $logistics->logisticsArea,//暂时不开启
            'expected_days' => $logistics->expected_days,
            'phone' => $logistics->phone,
            'address' => $logistics->address,
            'freight_type' => $logistics->freightType,
            'remark' => $logistics->remark,
            'status' => $logistics->status,
            'created_at' => $logistics->created_at
                                    ->toDateTimeString(),
            'updated_at' => $logistics->updated_at
                                    ->toDateTimeString(),
        ];
    }
}