<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'name', 'company', 'code', 'province',
        'city', 'district', 'address', 'zipcode',
        'contacts', 'phone', 'mobile', 'fax',
        'remark', 'is_scan', 'status', 'auto_valuation',
    ];

    public function series()
    {
        return $this->hasMany(Series::class);
    }
}
