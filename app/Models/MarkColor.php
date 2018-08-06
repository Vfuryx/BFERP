<?php

namespace App\Models;

class MarkColor extends Model
{
    protected $table = 'mark_colors';

    protected $fillable = ['markcode', 'markname', 'color', 'description', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

}
