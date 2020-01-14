<?php

namespace App\Models;

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
        return $this->hasMany(Series::class,'suppliers_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'supplier_id');
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
