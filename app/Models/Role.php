<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 获取与角色关联的权限
     */
    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }

    /**
     * 所在分组
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Rolegroup', 'role_group_id');
    }
}
