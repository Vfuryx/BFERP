<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * 获取与权限关联的角色
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
}
