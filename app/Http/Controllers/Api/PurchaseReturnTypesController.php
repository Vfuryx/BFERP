<?php

namespace App\Http\Controllers\Api;

use App\Models\PurchaseReturnType;
use App\Http\Requests\Api\PurchaseReturnTypeRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\PurchaseReturnTypeTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 采购退货类型资源
 * @Resource("purchasereturntypes",uri="/api")
 */
class PurchaseReturnTypesController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = PurchaseReturnTypeTransformer::class;
    const MODEL = PurchaseReturnType::class;

    /**
     * 获取所有采购退货类型
     *
     * @Get("/purchasereturntypes{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "采购退货类型",
     *             "status": 1,
     *             "created_at": "2018-06-14 16:55:32",
     *             "updated_at": "2018-06-14 16:55:32"
     *
     *         },
     *         {
     *             "id": 2,
     *             "name": "采购退货类型2",
     *             "status": 1,
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
     *                 "next": "{{host}}/api/purchasereturntypes?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(PurchaseReturnTypeRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增采购退货类型
     *
     * @Post("/purchasereturntypes")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="采购退货类型名称", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "采购退货类型名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "采购退货类型",
     *          "status": "1",
     *          "created_at": "2018-06-14 16:55:40",
     *          "updated_at": "2018-06-14 16:55:40",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(PurchaseReturnTypeRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条采购退货类型
     *
     * @Get("/purchasereturntypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "采购退货类型",
     *          "status": 1,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:55:32"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }


    /**
     * 修改采购退货类型
     *
     * @Patch("/purchasereturntypes/:id")
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
     *                  "采购退货类型名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "采购退货类型10",
     *          "status": "1",
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:58:55"
     *      })
     * })
     */
    public function update(PurchaseReturnTypeRequest $request, PurchaseReturnType $purchasereturntype)
    {
        return $this->traitUpdate($request, $purchasereturntype, self::TRANSFORMER);
    }

    /**
     * 删除采购退货类型
     *
     * @Delete("/purchasereturntypes/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PurchaseReturnType $purchasereturntype)
    {
        return $this->traitDestroy($purchasereturntype);
    }

    /**
     * 删除一组采购退货类型
     *
     * @Delete("/purchasereturntypes")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购退货类型id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组采购退货类型状态
     *
     * @PUT("/purchasereturntypes/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="采购退货类型id组 格式: 1,2,3,4 ", required=true),
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
