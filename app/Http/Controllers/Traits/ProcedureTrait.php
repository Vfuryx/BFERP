<?php

namespace App\Http\Controllers\Traits;

use Carbon\Carbon;

/**
 * 流程复用
 */
trait ProcedureTrait
{
    /**
     * 提交
     *
     * @param [type] $request   请求
     * @param [type] $model     模型
     * @return void
     */
    public function traitIsSubmit($request, $model)
    {
        return $this->traitProcedureUpdate($model,$request->validated(),'submit_at');
    }

    /**
     * 打印
     *
     * @param [type] $request   请求
     * @param [type] $model     模型
     * @return void
     */
    public function traitIsPrint($request, $model)
    {
        return $this->traitProcedureUpdate($model,$request->validated(),'print_at');
    }

    /**
     * 审查
     *
     * @param [type] $request   请求
     * @param [type] $model     模型
     * @return void
     */
    public function traitIsCheck($request, $model)
    {
        return $this->traitProcedureUpdate($model,$request->validated(),'check_at');
    }

    /**
     * 更新流程
     *
     * @param [type] $model     模型
     * @param [type] $data      写入的数据
     * @param [type] $field     记录时间的字段
     * @return void
     */
    public function traitProcedureUpdate($model,$data,$field){
        $data[$field] = Carbon::now()->toDateTimeString();
        $model->update($data);
        return $this->noContent();
    }

}
