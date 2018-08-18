<?php

namespace App\Models;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'payment_methods_id');
    }
}
