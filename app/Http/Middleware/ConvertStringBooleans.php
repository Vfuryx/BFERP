<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TransformsRequest;

/**
 * 将字符串的“true”或“false”转为布尔类型
 * @package App\Http\Middleware
 */
class ConvertStringBooleans  extends TransformsRequest
{

    protected function transform($key, $value)
    {
        if($value === 'true' || $value === 'TRUE')
            return true;

        if($value === 'false' || $value === 'FALSE')
            return false;

        return $value;
    }
}
