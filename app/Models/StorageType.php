<?php

namespace App\Models;

class StorageType extends Model
{
    protected $table = 'storage_types';

    protected $fillable = ['name', 'status'];
}
