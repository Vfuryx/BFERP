<?php

namespace App\Http\Controllers\Api;

use App\Models\ReturnReason;

use App\Http\Requests\Api\ReturnReasonRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\ReturnReasonTransformer;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 退货原因资源
 * @Resource("returnreasons",uri="/api")
 */
class ReturnReasonsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = ReturnReasonTransformer::class;
    const MODEL = ReturnReason::class;

    /**
     * 获取所有退货原因
     *
     * @Get("/returnreasons{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "退货原因",
     *             "status": true,
     *             "created_at": "2018-06-14 16:55:32",
     *             "updated_at": "2018-06-14 16:55:32"
     *         },
     *         {
     *             "id": 2,
     *             "name": "退货原因2",
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
     *                 "next": "{{host}}/api/returnreasons?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(ReturnReasonRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增退货原因
     *
     * @Post("/returnreasons")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="退货原因名称", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "退货原因名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "退货原因",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:40",
     *          "updated_at": "2018-06-14 16:55:40",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(ReturnReasonRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条退货原因
     *
     * @Get("/returnreasons/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "退货原因",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:55:32"
     *      })
     * })
     */
    public function show(ReturnReason $returnreason)
    {
        return $this->traitShow($returnreason, self::TRANSFORMER);
    }


    /**
     * 修改退货原因
     *
     * @Patch("/returnreasons/:id")
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
     *                  "退货原因名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "退货原因10",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:58:55"
     *      })
     * })
     */
    public function update(ReturnReasonRequest $request, ReturnReason $returnreason)
    {
        return $this->traitUpdate($request, $returnreason, self::TRANSFORMER);
    }

    /**
     * 删除退货原因
     *
     * @Delete("/returnreasons/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ReturnReason $returnreason)
    {
        return $this->traitDestroy($returnreason);
    }

    /**
     * 删除一组退货原因
     *
     * @Delete("/returnreasons")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="退货原因id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组退货原因状态
     *
     * @PUT("/returnreasons/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="退货原因id组 格式: 1,2,3,4 ", required=true),
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
