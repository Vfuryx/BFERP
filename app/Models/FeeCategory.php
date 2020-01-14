<?php

namespace App\Models;

class FeeCategory extends Model
{
    protected $table = 'fee_categories';

    protected $fillable = ['name', 'status'];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    public function feeTypes()
    {
        return $this->hasMany(FeeType::class);
    }
}
