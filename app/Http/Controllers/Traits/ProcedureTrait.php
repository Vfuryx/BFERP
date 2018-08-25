<?php

namespace App\Http\Controllers\Traits;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 流程复用
 */
trait ProcedureTrait
{
    /**
     * @param $model        模型
     * @param $condition    条件
     * @param $fail         错误提示
     * @param $method       方法
     * @param $data         数据
     * @return mixed
     */
    public function traitAction($model, $condition, $fail, $method, $data = null)
    {
        if ($condition)
            throw new UpdateResourceFailedException($fail);
        $model->$method($data);
        return $this->noContent();
    }


}
