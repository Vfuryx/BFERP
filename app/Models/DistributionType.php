<?php

namespace App\Models;

class DistributionType extends Model
{
    protected $table = 'distribution_types';

    protected $fillable = ['name', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];
}
