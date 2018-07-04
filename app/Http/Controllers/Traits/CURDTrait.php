<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\DB;
/**
 * 基础增删改查方法复用
 */
trait CURDTrait
{
    /**
     * 获取全部数据或者分页获取
     *
     * @param [type] $request       请求
     * @param [type] $model         模型
     * @param [type] $transformer   转换器
     * @param integer $page         每页元素
     * @return array
     */
    public function allOrPage($request, $model, $transformer, $perPage = 0)
    {
        //不分页
        if($perPage === 0){
            return $this->response->collection($model::all(),new $transformer);
        }

        //分页响应返回
        $ref = $model::whereIn(
            'status',
            (array)$request->get('status', [1, 0]))
            ->paginate($perPage);

        return $this->response->paginator($ref, $transformer);
    }

    /**
     * 插入数据库
     *
     * @param [type] $request       请求
     * @param [type] $model         模型
     * @param [type] $transformer   转换器
     * @return array
     */
    public function traitStore($request, $model, $transformer){

        $ref = new $model();
        $ref->fill($request->all());
        $ref->save();
        return $this->response
            ->item($ref, $transformer)
            ->setStatusCode(201)
            ->addMeta('status_code', '201');

    }

    /**
     * 显示一条数据
     *
     * @param [type] $id            模型id
     * @param [type] $model         模型
     * @param [type] $transformer   转换器
     * @return array
     */
    public function traitShow($id, $model, $transformer)
    {
        $ref = $model::findOrFail($id);
        return $this->response->item($ref, $transformer);
    }

    /**
     * 更新数据
     *
     * @param [type] $request       请求
     * @param [type] $model         模型
     * @param [type] $transformer   转换器
     * @return array
     */
    public function traitUpdate($request, $model, $transformer)
    {
        $model->update($request->all());
        return $this->response
            ->item($model, $transformer)
            ->setStatusCode(201);
    }

    /**
     * 删除数据
     *
     * @param [type] $model     模型
     * @return void
     */
    public function traitDestroy($model)
    {
        $model->delete();
        return $this->noContent();
    }

    /**
     * 批量删除
     *
     * @param [request] $request    请求
     * @param [model] $model        模型
     * @return void
     */
    public function traitDestroybyIds($request, $model)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if (count($ids) !== $model::destroy($ids)) {
                $this->errorResponse(500);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse(500, '删除错误', 500);
        }

        return $this->errorResponse(204);
    }

    /**
     * 批量修改状态
     *
     * @param [type] $request   请求
     * @param [type] $model     模型
     * @return void
     */
    public function traitEditStatusByIds($request, $model)
    {
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if (count($ids) !== $model::whereIn('id', $ids)->update(['status' => $status])) {
                $this->errorResponse(500);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse(500, '更改错误', 500);
        }

        return $this->errorResponse(204);
    }

    /**
     * 整表重置默认
     *
     * @param [type] $model     模型
     * @return void
     */
    public function tableResetDefault($model){
        $model::where('is_default',1)->update(['is_default' => 0]);
    }

}
