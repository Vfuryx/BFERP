<?php

namespace App\Models;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    protected $fillable = [
        'name', 'province', 'city', 'district',
        'address', 'is_default', 'status'
    ];

    public function shops(){
        return $this->hasMany(Shop::class);
    }

}
