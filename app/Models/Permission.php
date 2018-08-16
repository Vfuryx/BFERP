<?php

namespace App\Models;

class Permission extends Model
{
    protected $table = "permissions";

    protected $fillable = [
        'name', 'type', 'description'
    ];

    //设置类型
    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * 获取与权限关联的角色
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
}
