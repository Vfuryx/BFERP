<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\DB;

use Dingo\Api\Exception\DeleteResourceFailedException;

/**
 * 基础增删改查方法复用
 */
trait CURDTrait
{
    /**
     * 获取全部数据或者分页获取
     *
     * @param [type]    $request        请求
     * @param [type]    $model          模型
     * @param [type]    $transformer    转换器
     * @param [integer] $page           每页元素
     * @param [type]    $is_status      是否存在status
     * @return array
     */
    public function allOrPage($request, $model, $transformer, $perPage = 0, $is_status = 1)
    {

        if ($is_status) {
            $model = $model::whereIn('status', (array)$request->get('status', [1, 0]));
        } else {
            $model = $model::query();
        }

        //拼接特定条件的查询
        if ($field = $request->except('status')) {
            $model->where($request->validated());
        }

        //不分页
        if ($perPage === 0) {
            return $this->response->collection($model->get(), new $transformer);
        }

        //分页响应返回
        $ref = $model->paginate($perPage);
        return $this->response->paginator($ref, new $transformer);
    }

    /**
     * 插入数据库
     *
     * @param [type] $date          数据
     * @param [type] $model         模型
     * @param [type] $transformer   转换器
     * @return array
     */
    public function traitStore($date, $model, $transformer)
    {
        $id = $model::create($date)->id;
        //从新获取存入的数据去除有些的null数据，方便前端判断
        $ref = $model::find($id);
        return $this->response
            ->item($ref, $transformer)
            ->setStatusCode(201)
            ->addMeta('status_code', '201');
    }


    /**
     * 两表关联插入(适合一对一或一对多关系)
     *
     * @param [array]       $data          数据
     * @param [string]      $with          关联表
     * @param [object]      $rule          规则
     * @param [model]       $model         模型
     * @param [transformer] $transformer   转换器
     * @return array
     */
    public function traitJoint2Store($data, $with, $rule, $model, $transformer)
    {
        $id = DB::transaction(function () use ($data, $with, $rule, $model) {
            $validatedHandler = new \App\Handlers\ValidatedHandler();
            $model = $model::create($data[0]);
            if ($data[1]) {
                foreach ($data[1] as $item) {
                    $model->$with()->create($validatedHandler->getValidatedData($rule, $item));
                }
            }
            return $model->id;
        });

        return $this->response
            ->item($model::find($id), $transformer)
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
        $model->update($request->validated());
        return $this->response
            ->item($model, $transformer)
            ->setStatusCode(201);
    }

    /**
     * 两表关联更新(适合一对一或一对多关系)
     *
     * @param [array]       $data          数据
     * @param [string]      $with          关联表
     * @param [object]      $rule          规则
     * @param [model]       $model         模型
     * @param [transformer] $transformer   转换器
     * @return array
     */
    public function traitJoint2Update($data, $with, $rule, $model, $transformer)
    {
        $model = DB::transaction(function () use ($data, $with, $rule, $model) {
            $validatedHandler = new \App\Handlers\ValidatedHandler();

            $model->update($data[0]);

            if ($data[1]) {
                foreach ($data[1] as $item) {
                    //计算要通过的字段
                    $data = $validatedHandler->getValidatedData($rule, $item);

                    //存在id则更新，否则插入
                    if (isset($item['id'])) {
                        $model->$with()->findOrFail($item['id'])->update($data);
                    } else {
                        $model->$with()->create($data);
                    }
                }
            }
            return $model;
        });

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
     * 两表关联删除(适合一对一或一对多关系)
     *
     * @param [model] $model    模型
     * @param [string] $load    关联的表
     * @return void
     */
    public function traitJoint2Destroy($model, $load)
    {
        DB::transaction(function () use ($model, $load) {

            $model = $model->load($load);

            $item = $model->$load()->delete();

            $model = $model->delete();

            if ($item === false || $model === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

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
        DB::transaction(function () use ($ids, $model) {
            if (count($ids) !== $model::destroy($ids)) {
                return $this->errorResponse(500, '更改错误', 500);
            }
        });

        return $this->errorResponse(204);
    }


    /**
     * 批量两表关联删除(适合一对一或一对多关系)
     *
     * @param [string] $ids      要删除的ids
     * @param [string] $with     关联的表
     * @param [string] $model    模型
     * @return mix
     */
    public function traitJoint2DestroybyIds($ids, $with, $model)
    {
        $ids = explode(',', $ids);

        DB::transaction(function () use ($ids, $with, $model) {

            $model = $model::query()->whereIn('id', $ids)->with($with);

            $model->get()->map(function ($item) use ($with) {
                if (!$item->$with()->delete()) {
                    throw new DeleteResourceFailedException('The given data was invalid.');
                }
            });

            if (!$model->delete()) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

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

        DB::transaction(function () use ($ids, $model, $status) {
            if (count($ids) !== $model::whereIn('id', $ids)->update(['status' => $status])) {
                return $this->errorResponse(500, '更改错误', 500);
            }
        });

        return $this->errorResponse(204);
    }

    /**
     * 整表重置默认
     *
     * @param [type] $model     模型
     * @return void
     */
    public function tableResetDefault($model)
    {
        $model::where('is_default', 1)->update(['is_default' => 0]);
    }

}
