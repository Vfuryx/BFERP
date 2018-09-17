<?php

namespace App\Models;

class ReSupplieCategorie extends Model
{
    protected $table = 're_supplie_categories';

    protected $fillable = ['name', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];
}
