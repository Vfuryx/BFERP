<?php

namespace App\Models;

class StorageType extends Model
{
    protected $table = 'storage_types';

    protected $fillable = ['name', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

}
