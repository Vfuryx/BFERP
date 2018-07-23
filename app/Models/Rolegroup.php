<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rolegroup extends Model
{
    protected $table = "role_groups";

    /**
     * 分组下的角色
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
}
