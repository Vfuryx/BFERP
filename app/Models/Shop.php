<?php

namespace App\Models;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = [
        'nick', 'title', 'session_key', 'warehouse_id', 'shop_account',
        'shop_passwd', 'rebate', 'principal', 'principal_mobile',
        'province', 'city', 'district', 'address', 'gross_profit_rate',
        'platform_id', 'is_waybill', 'status',
    ];

    //设置类型
    protected $casts = [
        'is_waybill' => 'boolean',
        'status' => 'boolean'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'shops_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function goodsDownloads()
    {
        return $this->hasMany(GoodsDownload::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
    public function purchaseLists()
    {
        return $this->hasMany(PurchaseList::class);
    }

    public function orders(){
        return $this->hasMany(Order::class,'shops_id');
    }
}
