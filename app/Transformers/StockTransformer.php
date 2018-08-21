<?php

namespace App\Transformers;

use App\Models\Stock;
use League\Fractal\TransformerAbstract;

class StockTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'warehouse','product','productComponent'
    ];

    public function transform(Stock $stock)
    {
        return [
            'id' => $stock->id,
            'warehouse_id' => $stock->warehouse_id,
            'products_id' => $stock->products_id,
            'product_components_id' => $stock->product_components_id,
            'quantity' => $stock->quantity,
            'status' => $stock->status,
            'created_at' => $stock->created_at
                                  ->toDateTimeString(),
            'updated_at' => $stock->updated_at
                                  ->toDateTimeString(),
        ];
    }

    public function includeWarehouse(Stock $stock)
    {
        return $this->item($stock->warehouse, new WarehouseTransformer());
    }

    public function includeProduct(Stock $stock)
    {
        return $this->item($stock->product, new ProductTransformer());
    }

    public function includeProductComponent(Stock $stock)
    {
        return $this->item($stock->productComponent, new ProductComponentTransformer());
    }


}