<?php

namespace App\Models;

class FreightType extends Model
{
    protected $table = 'freight_types';

    protected $fillable = ['name', 'is_default'];

}
