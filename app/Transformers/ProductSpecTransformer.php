<?php

namespace App\Transformers;

use App\Models\ProductSpec;
use League\Fractal\TransformerAbstract;

class ProductSpecTransformer extends TransformerAbstract
{
    public function transform(ProductSpec $productspec)
    {
        return [
            'id' => $productspec->id,
            'goods' => $productspec->goods,
            'spec_code' => $productspec->spec_code,
            'jd_specs_code' => $productspec->jd_specs_code,
            'vips_specs_code' => $productspec->vips_specs_code,
            'tb_price' => $productspec->tb_price,
            'cost' => $productspec->cost,
            'price' => $productspec->price,
            'highest_price' => $productspec->highest_price,
            'lowest_price' => $productspec->lowest_price,
            'warehouse_cost' => $productspec->warehouse_cost,
            'assembly_price' => $productspec->assembly_price,
            'discount' => $productspec->discount,
            'commission' => $productspec->commission,
            'is_combination' => $productspec->is_combination,
            'package_quantity' => $productspec->package_quantity,
            'package_costs' => $productspec->package_costs,
            'wooden_frame_costs' => $productspec->wooden_frame_costs,
            'purchase_freight' => $productspec->purchase_freight,
            'inventory_warning' => $productspec->inventory_warning,
            'purchase_days_warning' => $productspec->purchase_days_warning,
            'available_warning' => $productspec->available_warning,
            'distribution_method' => $productspec->distributionMethod,
            'bar_code' => $productspec->bar_code,
            'img_url' => $productspec->img_url,
            'spec' => $productspec->spec,
            'color' => $productspec->color,
            'materials' => $productspec->materials,
            'function' => $productspec->function,
            'special' => $productspec->special,
            'other' => $productspec->other,
            'length' => $productspec->length,
            'width' => $productspec->width,
            'height' => $productspec->height,
            'volume' => $productspec->volume,
            'weight' => $productspec->weight,
            'remark' => $productspec->remark,
            'finished_pro' => $productspec->finished_pro,
            'is_stop_pro' => $productspec->is_stop_pro,
            'status' => $productspec->status,
            'created_at' => $productspec->created_at
                                    ->toDateTimeString(),
            'updated_at' => $productspec->updated_at
                                    ->toDateTimeString()
        ];
    }
}