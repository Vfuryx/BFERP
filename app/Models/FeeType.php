<?php

namespace App\Models;

class FeeType extends Model
{
    protected $table = 'fee_types';

    protected $fillable = [
        'fee_category_id', 'name', 'code', 'is_default',
        'status', 'remark'
    ];

    //设置类型
    protected $casts = [
        'is_default' => 'boolean',
        'status' => 'boolean'
    ];


    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class);
    }

}
