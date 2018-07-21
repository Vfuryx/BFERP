<?php

namespace App\Transformers;

use App\Models\StockIn;
use League\Fractal\TransformerAbstract;

class StockInTransformer extends TransformerAbstract
{
    public function transform(StockIn $stockIn)
    {
        return [
            'id' => $stockIn->id,
            'stock_in_no' => $stockIn->stock_in_no,
            'warehouse' => $stockIn->warehouse,
            'stock_in_type' => $stockIn->stockInType,
            'creator' => $stockIn->creator,
            'submitter' => $stockIn->submitter,
            'submit_at' => $stockIn->submit_at,
            'print_at' => $stockIn->print_at,
            'is_print' => $stockIn->is_print,
            'checker' => $stockIn->checker,
            'check_at' => $stockIn->check_at,
            'warehouer' => $stockIn->warehouer,
            'stock_in_at' => $stockIn->stock_in_at,
            'is_submit' => $stockIn->is_submit,
            'is_check' => $stockIn->is_check,
            'is_stock_in' => $stockIn->is_stock_in,
            'status' => $stockIn->status,
            'stock_in_details' => $stockIn->stockInDetails()->with('purchaseDetail','productSpec')->get(),
            'created_at' => $stockIn->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stockIn->updated_at
                                    ->toDateTimeString(),
        ];
    }
}