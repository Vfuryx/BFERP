<?php

namespace App\Models;

class Distribution extends Model
{
    protected $table = 'distributions';

    protected $fillable = [
        'name', 'phone', 'address', 'remark', 'status',
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean',
    ];

    public function orders(){
        return $this->hasMany(Order::class,'distributions_id');
    }
}
