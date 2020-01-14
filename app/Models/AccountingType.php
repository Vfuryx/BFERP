<?php

namespace App\Models;

class AccountingType extends Model
{
    protected $table = 'accounting_types';

    protected $fillable = ['name', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

}
