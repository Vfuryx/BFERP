<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FeeTypeRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\FeeTypeTransformer;
use App\Models\FeeType;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 费用类型资源
 * @Resource("feetypes",uri="/api")
 */
class FeeTypesController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = FeeTypeTransformer::class;
    const MODEL = FeeType::class;

    /**
     * 获取所有费用类型
     *
     * @Get("/feetypes{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "fee_category": {
     *                  "id": 1,
     *                  "name": "费用类别",
     *                  "status": 1,
     *                  "created_at": "2018-06-25 10:45:30",
     *                  "updated_at": "2018-06-25 10:45:30"
     *              },
     *             "name": "费用类型",
     *             "code": "费用类型代码",
     *             "is_default": 1,
     *             "status": 1,
     *             "remark": "费用类型代码备注",
     *             "created_at": "2018-06-14 15:28:13",
     *             "updated_at": "2018-06-14 15:28:13"
     *         },
     *         {
     *             "id": 2,
     *             "fee_category": {
     *                  "id": 2,
     *                  "name": "费用类别2",
     *                  "status": 1,
     *                  "created_at": "2018-06-25 10:45:32",
     *                  "updated_at": "2018-06-25 10:45:32"
     *              },
     *             "name": "费用类型2",
     *             "code": "费用类型代码2",
     *             "is_default": 1,
     *             "status": 1,
     *             "remark": "费用类型代码2备注",
     *             "created_at": "2018-06-14 15:31:33",
     *             "updated_at": "2018-06-14 15:31:33"
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 13,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(FeeTypeRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增费用类型
     *
     * @Post("/feetypes")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("fee_category_id",type="integer", description="费用类别id", required=true),
     *      @Parameter("name", description="费用名称", required=true),
     *      @Parameter("code", description="费用代码", required=true),
     *      @Parameter("remark", description="费用类别备注", required=false),
     *      @Parameter("is_default",type="integer", description="是否默认", required=false,default=0),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "fee_category_id": {
     *                  "需要添加的id在数据库中未找到"
     *              },
     *              "code": {
     *                  "费用代码不能重复"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "fee_category_id": "1",
     *          "name": "费用类型",
     *          "code": "费用类型代码",
     *          "is_default": "1",
     *          "status": "1",
     *          "remark": "费用类型代码备注",
     *          "created_at": "2018-06-14 15:31:33",
     *          "updated_at": "2018-06-14 15:31:33",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(FeeTypeRequest $request)
    {
        //是否要重置默认
        if($request->input('is_default') === '1'){
            $this->tableResetDefault(self::MODEL);
        }
        
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条费用类型
     *
     * @Get("/feetypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "fee_category_id": 1,
     *          "name": "费用类型",
     *          "code": "费用类型代码",
     *          "is_default": 1,
     *          "status": 1,
     *          "remark": "费用类型代码备注",
     *          "created_at": "2018-06-14 15:28:13",
     *          "updated_at": "2018-06-14 15:28:13"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改费用类型
     *
     * @Patch("/feetypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "code": {
     *                  "费用代码不能重复"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "fee_category_id": "1",
     *          "name": "费用类型1",
     *          "code": "费用类型代码1",
     *          "is_default": "1",
     *          "status": "1",
     *          "remark": "费用类型代码1备注",
     *          "created_at": "2018-06-14 15:28:13",
     *          "updated_at": "2018-06-14 15:46:06"
     *      })
     * })
     */
    public function update(FeeTypeRequest $request, FeeType $feetype)
    {
        //是否要重置默认
        if($request->input('is_default') === '1'){
            $this->tableResetDefault(self::MODEL);
        }

        return $this->traitUpdate($request, $warehouse, self::TRANSFORMER);
    }

    /**
     * 删除费用类型
     *
     * @Delete("/feetypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(FeeType $feetype)
    {
        return $this->traitDestroy($feetype);
    }

    /**
     * 删除一组费用类型
     *
     * @Delete("/feetypes")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="费用类型id组 格式: 1,2,3,4 ", required=true)
     * })
     * @Transaction({
     *      @Response(500, body={
     *          "message": "删除错误",
     *          "code": 500,
     *          "status_code": 500,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "ids": {
     *                  "id组必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroybyIds(DestroyRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组费用类型状态
     *
     * @PUT("/feetypes")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="费用类型id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=true),
     * })
     * @Transaction({
     *      @Response(500, body={
     *          "message": "更改错误",
     *          "code": 500,
     *          "status_code": 500,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "ids": {
     *                  "id组必填"
     *              },
     *              "status": {
     *                  "状态必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function editStatusByIds(EditStatuRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

}
