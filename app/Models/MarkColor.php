<?php

namespace App\Models;

class MarkColor extends Model
{
    protected $table = 'mark_colors';
    protected $fillable = ['code', 'name','color','desc','status'];
}
