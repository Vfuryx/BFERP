<?php

namespace App\Transformers;

use App\Models\Logistics;
use League\Fractal\TransformerAbstract;

class LogisticsTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'printReport', 'freightType'
    ];

    public function transform(Logistics $logistics)
    {
        return [
            'id' => $logistics->id,
            'code' => $logistics->code,
            'name' => $logistics->name,
            'report_id' => $logistics->report_id,
//            'logistics_area' => $logistics->logisticsArea,//暂时不开启
            'expected_days' => $logistics->expected_days,
            'phone' => $logistics->phone,
            'address' => $logistics->address,
            'freight_type_id' => $logistics->freight_type_id,
            'remark' => $logistics->remark,
            'status' => $logistics->status,
            'created_at' => $logistics->created_at
                                    ->toDateTimeString(),
            'updated_at' => $logistics->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includePrintReport(Logistics $logistics)
    {
        return $this->item($logistics->printReport, new PrintReportTransformer());
    }

    public function includeFreightType(Logistics $logistics)
    {
        return $this->item($logistics->freightType, new FreightTypeTransformer());
    }



}