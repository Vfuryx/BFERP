<?php

namespace App\Transformers;

use App\Models\StockIn;
use League\Fractal\TransformerAbstract;

class StockInTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'warehouse', 'stockInType', 'stockInDetails', 'supplier', 'submitter', 'auditor', 'warehouer'
    ];

    public function transform(StockIn $stockIn)
    {
        return [
            'id' => $stockIn->id,
            'stock_in_no' => $stockIn->stock_in_no,
            'external_sn' => $stockIn->external_sn,
            'warehouse_id' => $stockIn->warehouse_id,
            'stock_in_types_id' => $stockIn->stock_in_types_id,
            'creator' => $stockIn->creator,
            'is_submit' => $stockIn->is_submit,
            'submitter' => $stockIn->submitter,
            'submit_at' => optional($stockIn->submit_at)->toDateTimeString(),
            'is_print' => $stockIn->is_print,
            'print_at' => optional($stockIn->print_at)->toDateTimeString(),
            'is_audit' => $stockIn->is_audit,
            'auditor' => $stockIn->auditor,
            'audit_at' => optional($stockIn->audit_at)->toDateTimeString(),
            'is_stock_in' => $stockIn->is_stock_in,
            'warehouer' => $stockIn->warehouer,
            'stock_in_at' =>  optional($stockIn->stock_in_at)->toDateTimeString(),
            'status' => $stockIn->status,
            'created_at' => $stockIn->created_at
                                    ->toDateTimeString(),
            'updated_at' => $stockIn->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includeWarehouse(StockIn $stockIn)
    {
        return $this->item($stockIn->warehouse, new WarehouseTransformer());
    }

    public function includeStockInType(StockIn $stockIn)
    {
        return $this->item($stockIn->stockInType, new StockInTypeTransformer());
    }

    public function includeStockInDetails(StockIn $stockIn)
    {
        return $this->collection($stockIn->stockInDetails, new StockInDetailTransformer());
    }

    public function includeSupplier(StockIn $stockIn)
    {
        if(!$stockIn->suppliers_id) return ;
        return $this->item($stockIn->supplier, new SupplierTransformer());
    }

    public function includeSubmitter(StockIn $stockIn)
    {
        if(!$stockIn->submitter) return ;
        return $this->item($stockIn->submitter, new UserTransformer());
    }

    public function includeAuditor(StockIn $stockIn)
    {
        if(!$stockIn->auditor) return ;
        return $this->item($stockIn->auditor, new UserTransformer());
    }

    public function includeWarehouer(StockIn $stockIn)
    {
        if(!$stockIn->warehouer) return ;
        return $this->item($stockIn->warehouer, new UserTransformer());
    }

}