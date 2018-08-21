<?php

namespace App\Transformers;

use App\Models\Combination;
use League\Fractal\TransformerAbstract;

class CombinationTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'productComponents','product','orderItems'
    ];

    public function transform(Combination $combination)
    {
        return [
            'id' => $combination->id,
            'pid' => $combination->pid,
            'name' => $combination->name,
            'created_at' => $combination->created_at
                ->toDateTimeString(),
            'updated_at' => $combination->updated_at
                ->toDateTimeString()
        ];
    }

    public function includeProductComponents(Combination $combination)
    {
        return $this->collection($combination->productComponents, new ProductComponentTransformer());
    }

    public function includeProduct(Combination $combination)
    {
        return $this->item($combination->product, new ProductTransformer());
    }

    public function includeOrderItems(Combination $combination)
    {
        return $this->collection($combination->orderItems, new OrderItemTransformer());
    }


}