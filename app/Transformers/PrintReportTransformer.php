<?php

namespace App\Transformers;

use App\Models\PrintReport;
use League\Fractal\TransformerAbstract;

class PrintReportTransformer extends TransformerAbstract
{
    public function transform(PrintReport $printreport)
    {
        return [
            'id' => $printreport->id,
            'file' => $printreport->file,
            'name' => $printreport->name,
            'paper_format' => $printreport->paper_format,
            'status' => $printreport->status,
            'created_at' => $printreport->created_at
                                    ->toDateTimeString(),
            'updated_at' => $printreport->updated_at
                                    ->toDateTimeString(),
        ];
    }
}