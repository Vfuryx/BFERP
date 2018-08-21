<?php

namespace App\Transformers;

use App\Models\PurchaseReturnDetail;
use App\Models\Supplier;
use League\Fractal\TransformerAbstract;

class PurchaseReturnDetailTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'purchaseReturnType', 'purchaseReturn', 'stock', 'supplier'
    ];

    public function transform(PurchaseReturnDetail $purchaseReturnDetail)
    {
        return [
            'id' => $purchaseReturnDetail->id,
            'purchase_returns_id' => $purchaseReturnDetail->purchase_returns_id,
            'stocks_id' => $purchaseReturnDetail->stocks_id,
            'purchase_return_quantity' => $purchaseReturnDetail->purchase_return_quantity,
            'suppliers_id' => $purchaseReturnDetail->suppliers_id,
            'price_differences' => $purchaseReturnDetail->price_differences,
            'purchase_return_types_id' => $purchaseReturnDetail->purchase_return_types_id,
            'created_at' => $purchaseReturnDetail->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchaseReturnDetail->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includePurchaseReturnType(PurchaseReturnDetail $purchaseReturnDetail)
    {
        return $this->item($purchaseReturnDetail->purchaseReturnType, new PurchaseReturnTypeTransformer());
    }

    public function includePurchaseReturn(PurchaseReturnDetail $purchaseReturnDetail)
    {
        return $this->item($purchaseReturnDetail->purchaseReturn, new PurchaseReturnTransformer());
    }

    public function includeStock(PurchaseReturnDetail $purchaseReturnDetail)
    {
        return $this->item($purchaseReturnDetail->stock, new StockTransformer());
    }

    public function includeSupplier(PurchaseReturnDetail $purchaseReturnDetail)
    {
        return $this->item($purchaseReturnDetail->supplier, new SupplierTransformer());
    }



}