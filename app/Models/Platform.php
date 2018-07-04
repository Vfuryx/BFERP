<?php

namespace App\Models;

class Platform extends Model
{
    protected $table = 'platforms';

    protected $fillable = [
        'name', 'status'
    ];

    public function shop()
    {
        return $this->hasMany(Shop::class);
    }
}
