<?php

namespace App\Models;

class LogisticsArea extends Model
{
    protected $table = 'logistics_areas';

    protected $fillable = [
        'code', 'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function logistics()
    {
        return $this->hasMany(Logistics::class);
    }
}
