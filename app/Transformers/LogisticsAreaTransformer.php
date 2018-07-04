<?php

namespace App\Transformers;

use App\Models\LogisticsArea;
use League\Fractal\TransformerAbstract;

class LogisticsAreaTransformer extends TransformerAbstract
{
    public function transform(LogisticsArea $logisticsarea)
    {
        return [
            'id' => $logisticsarea->id,
            'code' => $logisticsarea->code,
            'name' => $logisticsarea->name,
            'status' => $logisticsarea->status,
            'created_at' => $logisticsarea->created_at
                                    ->toDateTimeString(),
            'updated_at' => $logisticsarea->updated_at
                                    ->toDateTimeString(),
        ];
    }
}