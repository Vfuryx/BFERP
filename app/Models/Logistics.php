<?php

namespace App\Models;

class Logistics extends Model
{
    protected $table = 'logistics';

    protected $fillable = [
        'code', 'name', 'report_id', 'logistics_area_id',
        'expected_days', 'phone', 'address', 'freight_type_id',
        'remark', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];


    public function cityInfos()
    {
        return $this->hasMany(CityInfo::class);
    }

    public function printReport()
    {
        return $this->belongsTo(PrintReport::class, 'report_id');
    }

    public function logisticsArea()
    {
        return $this->belongsTo(LogisticsArea::class);
    }

    public function freightType()
    {
        return $this->belongsTo(FreightType::class);
    }

}
