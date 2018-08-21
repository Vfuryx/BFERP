<?php

namespace App\Transformers;

use App\Models\ProductComponent;
use League\Fractal\TransformerAbstract;

class ProductComponentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'product','distributionMethod'
    ];

    public function transform(ProductComponent $productComponent)
    {
        return [
            'id' => $productComponent->id,
            'pid' => $productComponent->pid,
            'component_code' => $productComponent->component_code,
            'jd_component_code' => $productComponent->jd_component_code,
            'vips_component_code' => $productComponent->vips_component_code,
            'tb_price' => $productComponent->tb_price,
            'cost' => $productComponent->cost,
            'price' => $productComponent->price,
            'highest_price' => $productComponent->highest_price,
            'lowest_price' => $productComponent->lowest_price,
            'warehouse_cost' => $productComponent->warehouse_cost,
            'assembly_price' => $productComponent->assembly_price,
            'discount' => $productComponent->discount,
            'commission' => $productComponent->commission,
            'is_common' => $productComponent->is_common,
            'package_quantity' => $productComponent->package_quantity,
            'package_costs' => $productComponent->package_costs,
            'wooden_frame_costs' => $productComponent->wooden_frame_costs,
            'purchase_freight' => $productComponent->purchase_freight,
            'inventory_warning' => $productComponent->inventory_warning,
            'purchase_days_warning' => $productComponent->purchase_days_warning,
            'available_warning' => $productComponent->available_warning,
            'distribution_method_id' => $productComponent->distribution_method_id,
            'bar_code' => $productComponent->bar_code,
            'img_url' => $productComponent->img_url,
            'spec' => $productComponent->spec,
            'color' => $productComponent->color,
            'materials' => $productComponent->materials,
            'function' => $productComponent->function,
            'special' => $productComponent->special,
            'other' => $productComponent->other,
            'longness' => $productComponent->longness,
            'width' => $productComponent->width,
            'height' => $productComponent->height,
            'volume' => $productComponent->volume,
            'weight' => $productComponent->weight,
            'remark' => $productComponent->remark,
            'finished_pro' => $productComponent->finished_pro,
            'is_stop_pro' => $productComponent->is_stop_pro,
            'created_at' => $productComponent->created_at
                                    ->toDateTimeString(),
            'updated_at' => $productComponent->updated_at
                                    ->toDateTimeString()
        ];
    }

    public function includeProduct(ProductComponent $productComponent)
    {
        return $this->item($productComponent->product, new ProductTransformer());
    }

    public function includeDistributionMethod(ProductComponent $productComponent)
    {
        return $this->item($productComponent->distributionMethod, new DistributionMethodTransformer());
    }
}