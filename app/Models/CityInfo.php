<?php

namespace App\Models;

class CityInfo extends Model
{
    protected $table = 'city_infos';

    protected $fillable = [
        'logistics_id', 'province', 'city', 'district', 'address',
        'phone', 'price', 'weight_univalent', 'expected_days', 'route',
        'is_free_shipping', 'remark', 'status'
    ];

    //设置类型
    protected $casts = [
        'is_free_shipping' => 'boolean',
        'status' => 'boolean'
    ];

    public function logistics()
    {
        return $this->belongsTo(Logistics::class);
    }


}
