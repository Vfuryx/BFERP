<?php

namespace App\Models;

class DistributionMethod extends Model
{
    protected $table = 'distribution_methods';

    protected $fillable = ['name', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function productSpecs()
    {
        return $this->hasMany(ProductSpec::class);
    }

}
