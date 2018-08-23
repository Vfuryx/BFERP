<?php

namespace App\Http\Controllers\Api;

use App\Models\Distribution;
use App\Http\Requests\Api\DistributionRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\DistributionTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 配送资源
 * @Resource("distributions",uri="/api")
 */
class DistributionsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = DistributionTransformer::class;
    const MODEL = Distribution::class;

    /**
     * 获取所有配送
     *
     * @Get("/distributions{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "name": "配送公司名称",
     *          "phone": "配送公司电话",
     *          "address": "配送公司地址",
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-08-08 16:15:57",
     *          "updated_at": "2018-08-08 16:15:57"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 1,
     *             "count": 1,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(DistributionRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增配送
     *
     * @Post("/distributions")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="配送公司名称", required=true),
     *      @Parameter("phone", description="配送公司电话", required=true),
     *      @Parameter("address", description="配送公司地址", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "address": {
     *                  "配送公司地址必须string类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "配送公司名称",
     *          "phone": "配送公司电话",
     *          "address": "配送公司地址",
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-08-08 16:15:57",
     *          "updated_at": "2018-08-08 16:15:57",
     *          "meta": {
     *              "status_code": 201
     *          }
     *      })
     * })
     */
    public function store(DistributionRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条配送
     *
     * @Get("/distributions/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "配送公司名称",
     *          "phone": "配送公司电话",
     *          "address": "配送公司地址",
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-08-08 16:15:57",
     *          "updated_at": "2018-08-08 16:15:57"
     *      })
     * })
     */
    public function show(Distribution $distribution)
    {
        return $this->traitShow($distribution, self::TRANSFORMER);
    }

    /**
     * 修改配送
     *
     * @Patch("/distributions/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "address": {
     *                  "配送公司地址必须string类型"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "配送公司名称1",
     *          "phone": "配送公司电话",
     *          "address": "配送公司地址",
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-08-08 16:15:57",
     *          "updated_at": "2018-08-08 16:18:37"
     *      })
     * })
     */
    public function update(DistributionRequest $request, Distribution $distribution)
    {
        return $this->traitUpdate($request, $distribution, self::TRANSFORMER);
    }

    /**
     * 删除配送
     *
     * @Delete("/distributions/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Distribution $distribution)
    {
        return $this->traitDestroy($distribution);
    }

    /**
     * 删除一组配送
     *
     * @Delete("/distributions")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="配送id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组配送状态
     *
     * @PUT("/distributions/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="配送id组 格式: 1,2,3,4 ", required=true),
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
