<?php

namespace App\Models;

class FeeType extends Model
{
    protected $table = 'fee_types';

    protected $fillable = [
        'fee_category_id','name','code','is_default',
        'status','remark'
    ];

}
