<?php

namespace App\Models;

class ReSupplieResponsible extends Model
{
    protected $table = 're_supplie_responsibles';

    protected $fillable = ['name', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];
}
