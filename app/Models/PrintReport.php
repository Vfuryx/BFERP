<?php

namespace App\Models;

class PrintReport extends Model
{
    protected $table = 'print_reports';

    protected $fillable = [
        'file', 'name', 'paper_format', 'status'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean',
    ];

    public function logistics()
    {
        return $this->hasMany(Logistics::class);
    }

}
