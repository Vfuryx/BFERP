<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'dept_no', 'name', 'p_dept', 'remark',
        'is_verify', 'status'
    ];

    //设置类型
    protected $casts = [
        'is_verify' => 'boolean',
        'status' => 'boolean'
    ];
}
