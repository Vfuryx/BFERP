<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use SoftDeletes;

    protected $table = 'goods';

    /**
     * 需要被转换成日期的属性。
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'goods_sn', 'jd_sn', 'vips_sn', 'factory_model', 'short_name',
        'nick', 'supplier_id', 'category_id', 'remark', 'title',
        'img', 'url', 'status', 'is_stop_pro'
    ];

    public function productSpecs()
    {
        return $this->hasMany(ProductSpec::calss);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function goodsCategory()
    {
        return $this->belongsTo(GoodsCategory::class,'category_id');
    }

}
