<?php

namespace App\Models;

class FeeCategory extends Model
{
    protected $table = 'fee_categories';

    protected $fillable = ['name', 'status'];

    public function feeTypes()
    {
        return $this->hasMany(FeeType::class);
    }
}
