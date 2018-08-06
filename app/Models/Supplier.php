<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'name', 'company', 'code', 'province',
        'city', 'district', 'address', 'zipcode',
        'contacts', 'phone', 'mobile', 'fax', 'email',
        'remark', 'is_scan', 'status', 'auto_valuation',
    ];

    //设置类型
    protected $casts = [
        'is_scan' => 'boolean',
        'status' => 'boolean',
        'auto_valuation' => 'boolean'
    ];

    public function series()
    {
        return $this->hasMany(Series::class);
    }

    public function goods()
    {
        return $this->hasMany(Goods::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function purchaseReturnDetails()
    {
        return $this->hasMany(PurchaseReturnDetail::class,'suppliers_id');
    }
}
