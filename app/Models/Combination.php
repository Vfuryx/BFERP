<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    protected $table = 'combinations';


    protected $fillable = [
        'product_specs_id', 'com_pro_specs_id', 'count', 'status'
    ];

    //获取属于的产品规格
    public function productSpec(){
        return $this->belongsTo(ProductSpec::class, 'product_specs_id');
    }

    //获取组合对应的产品规格

    public function comProSpec(){
        return $this->belongsTo(ProductSpec::class, 'com_pro_specs_id');
    }

}
