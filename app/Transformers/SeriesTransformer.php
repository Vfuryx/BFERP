<?php

namespace App\Transformers;

use App\Models\Series;
use League\Fractal\TransformerAbstract;

class SeriesTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'suppliers'
    ];

    public function transform(Series $series)
    {
        return [
            'id' => $series->id,
            'suppliers_id' => $series->suppliers_id,
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

    public function includeSuppliers(Series $series)
    {
        return $this->item($series->suppliers, new SupplierTransformer());
    }
}