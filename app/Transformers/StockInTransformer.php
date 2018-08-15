<?php

namespace App\Transformers;

use App\Models\StockIn;
use League\Fractal\TransformerAbstract;

class StockInTransformer extends TransformerAbstract
{
    public function transform(StockIn $stockIn)
    {
        $stockIn = $stockIn->load('warehouse','stockInType','stockInDetails.purchaseDetail.productComponent');
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
            'auditor' => $stockIn->auditor,
            'audit_at' => $stockIn->audit_at,
            'warehouer' => $stockIn->warehouer,
            'stock_in_at' => $stockIn->stock_in_at,
            'is_submit' => $stockIn->is_submit,
            'is_audit' => $stockIn->is_audit,
            'is_stock_in' => $stockIn->is_stock_in,
            'status' => $stockIn->status,
            'stock_in_details' => $stockIn->stockInDetails,
            'created_at' => $stockIn->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stockIn->updated_at
                                    ->toDateTimeString(),
        ];
    }
}