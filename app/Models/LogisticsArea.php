<?php

namespace App\Models;

class LogisticsArea extends Model
{
    protected $table = 'logistics_areas';

    protected $fillable = [
        'code', 'name', 'status'
    ];

    public function logistics()
    {
        return $this->hasMany(Logistics::class);
    }
}
