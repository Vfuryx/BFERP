<?php

namespace App\Http\Controllers\Api;

use App\Models\CustomerType;

use App\Http\Requests\Api\CustomerTypeRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\CustomerTypeTransformer;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 客户类型资源
 * @Resource("customertypes",uri="/api")
 */
class CustomerTypesController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = CustomerTypeTransformer::class;
    const MODEL = CustomerType::class;

    /**
     * 获取所有客户类型
     *
     * @Get("/customertypes{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "客户类型",
     *             "status": true,
     *             "created_at": "2018-06-14 16:55:32",
     *             "updated_at": "2018-06-14 16:55:32"
     *
     *         },
     *         {
     *             "id": 2,
     *             "name": "客户类型2",
     *             "status": true,
     *             "created_at": "2018-06-14 16:55:36",
     *             "updated_at": "2018-06-14 16:55:36"
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/customertypes?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(CustomerTypeRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增客户类型
     *
     * @Post("/customertypes")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="客户类型名称", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "客户类型名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "客户类型",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:40",
     *          "updated_at": "2018-06-14 16:55:40",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(CustomerTypeRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条客户类型
     *
     * @Get("/customertypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "客户类型",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:55:32"
     *      })
     * })
     */
    public function show(CustomerType $customertype)
    {
        return $this->traitShow($customertype, self::TRANSFORMER);
    }


    /**
     * 修改客户类型
     *
     * @Patch("/customertypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "客户类型名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "客户类型10",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:58:55"
     *      })
     * })
     */
    public function update(CustomerTypeRequest $request, CustomerType $customertype)
    {
        return $this->traitUpdate($request, $customertype, self::TRANSFORMER);
    }

    /**
     * 删除客户类型
     *
     * @Delete("/customertypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(CustomerType $customertype)
    {
        return $this->traitDestroy($customertype);
    }

    /**
     * 删除一组客户类型
     *
     * @Delete("/customertypes")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="客户类型id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组客户类型状态
     *
     * @PUT("/customertypes/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="客户类型id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=true),
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
