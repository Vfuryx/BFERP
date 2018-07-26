<?php
namespace App\Handlers;
/**
 * 处理验证数据
 * Class ValidatedHandler
 * @package App\Handlers
 */
class ValidatedHandler
{
    /**
     * 获取通过验证的字段数据
     *      用于过组形式，原生方法无法过滤
     * @param $rule     规则
     * @param $data     要过滤的数据
     * @return array    完成过滤的数据
     */
    public function getValidatedData($rule, $data) :array
    {
        //计算要通过的字段
        $rules = collect($rule)->map(function($item,$index){
            $index = explode('.',$index);
            return end($index);
        })->flip()->toArray();

        return array_intersect_key($data, $rules);
    }
}

