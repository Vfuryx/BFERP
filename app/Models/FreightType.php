<?php

namespace App\Models;

class FreightType extends Model
{
    protected $table = 'freight_types';

    protected $fillable = ['name', 'is_default', 'status'];

    //设置类型
    protected $casts = [
        'is_default' => 'boolean',
        'status' => 'boolean'
    ];

    public function logistics()
    {
        return $this->hasMany(Logistics::class);
    }
}
