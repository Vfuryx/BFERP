<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rolegroup extends Model
{
    protected $table = "role_groups";

    protected $fillable = [
        'name', 'description', 'status', 'remark'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * 分组下的角色
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
}
