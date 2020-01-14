<?php

namespace App\Models;

class Series extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'suppliers_id', 'code', 'name', 'description',
        'remark', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'suppliers_id');
    }
}
