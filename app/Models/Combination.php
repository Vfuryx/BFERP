<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    protected $table = 'combinations';

    protected $fillable = [
        'pid', 'name',
    ];

    public function productComponents()
    {
        return $this->belongsToMany(ProductComponent::class, 'combination_product_components', 'combinations_id', 'product_components_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'pid');
    }

}
