<?php

namespace App\Http\Controllers\Api;

use App\Models\PaymentMethod;

use App\Http\Requests\Api\PaymentMethodRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\PaymentMethodTransformer;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 付款方式资源
 * @Resource("paymentmethods",uri="/api")
 */
class PaymentMethodsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = PaymentMethodTransformer::class;
    const MODEL = PaymentMethod::class;

    /**
     * 获取所有付款方式
     *
     * @Get("/paymentmethods{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "付款方式",
     *             "status": true,
     *             "created_at": "2018-06-14 16:55:32",
     *             "updated_at": "2018-06-14 16:55:32"
     *
     *         },
     *         {
     *             "id": 2,
     *             "name": "付款方式2",
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
     *                 "next": "{{host}}/api/paymentmethods?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(PaymentMethodRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增付款方式
     *
     * @Post("/paymentmethods")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="付款方式名称", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "付款方式名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "付款方式",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:40",
     *          "updated_at": "2018-06-14 16:55:40",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(PaymentMethodRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条付款方式
     *
     * @Get("/paymentmethods/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "付款方式",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:55:32"
     *      })
     * })
     */
    public function show(PaymentMethod $paymentmethod)
    {
        return $this->traitShow($paymentmethod, self::TRANSFORMER);
    }


    /**
     * 修改付款方式
     *
     * @Patch("/paymentmethods/:id")
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
     *                  "付款方式名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "付款方式10",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:58:55"
     *      })
     * })
     */
    public function update(PaymentMethodRequest $request, PaymentMethod $paymentmethod)
    {
        return $this->traitUpdate($request, $paymentmethod, self::TRANSFORMER);
    }

    /**
     * 删除付款方式
     *
     * @Delete("/paymentmethods/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PaymentMethod $paymentmethod)
    {
        return $this->traitDestroy($paymentmethod);
    }

    /**
     * 删除一组付款方式
     *
     * @Delete("/paymentmethods")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="付款方式id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组付款方式状态
     *
     * @PUT("/paymentmethods/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="付款方式id组 格式: 1,2,3,4 ", required=true),
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
