<?php

namespace App\Transformers;

use App\Models\Series;
use League\Fractal\TransformerAbstract;

class SeriesTransformer extends TransformerAbstract
{
    public function transform(Series $series)
    {
        return [
            'id' => $series->id,
            'suppliers' => $series->suppliers,
            'code' => $series->code,
            'name' => $series->name,
            'description' => $series->description,
            'remark' => $series->remark,
            'status' => $series->status,
            'created_at' => $series->created_at
                                    ->toDateTimeString(),
            'updated_at' => $series->updated_at
                                    ->toDateTimeString(),
        ];
    }
}