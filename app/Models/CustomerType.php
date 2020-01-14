<?php

namespace App\Models;

class CustomerType extends Model
{
    protected $table = 'customer_types';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'customer_types_id');
    }
}
