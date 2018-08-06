<?php

namespace App\Models;

class Platform extends Model
{
    protected $table = 'platforms';

    protected $fillable = [
        'name', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean',
    ];

    public function shop()
    {
        return $this->hasMany(Shop::class);
    }
}
