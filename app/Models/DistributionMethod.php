<?php

namespace App\Models;

class DistributionMethod extends Model
{
    protected $table = 'distribution_methods';

    protected $fillable = ['name', 'status'];

    public function productSpecs()
    {
        return $this->hasMany(ProductSpec::class);
    }

}
