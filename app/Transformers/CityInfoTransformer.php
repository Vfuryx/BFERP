<?php

namespace App\Transformers;

use App\Models\CityInfo;
use League\Fractal\TransformerAbstract;

class CityInfoTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'logistics'
    ];

    public function transform(CityInfo $cityinfo)
    {
        return [
            'id' => $cityinfo->id,
            'logistics_id' => $cityinfo->logistics_id,
            'province' => $cityinfo->province,
            'city' => $cityinfo->city,
            'district' => $cityinfo->district,
            'address' => $cityinfo->address,
            'phone' => $cityinfo->phone,
            'price' => $cityinfo->price,
            'weight_univalent' => $cityinfo->weight_univalent,
            'expected_days' => $cityinfo->expected_days,
            'route' => $cityinfo->route,
            'is_free_shipping' => $cityinfo->is_free_shipping,
            'remark' => $cityinfo->remark,
            'created_at' => $cityinfo->created_at
                                    ->toDateTimeString(),
            'updated_at' => $cityinfo->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includeLogistics(CityInfo $cityinfo)
    {
        return $this->item($cityinfo->logistics, new LogisticsTransformer());
    }

}