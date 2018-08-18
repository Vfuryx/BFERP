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

    public function productComponents()
    {
        return $this->hasMany(ProductComponent::class,'distribution_method_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'distribution_methods_id');
    }
}
