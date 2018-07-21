<?php

namespace App\Http\Controllers\Api;

use App\Models\DamagedGoods;
use App\Http\Requests\Api\DamagedGoodsRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\DamagedGoodsTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 损坏商品资源
 * @Resource("damagedgoods",uri="/api")
 */
class DamagedGoodsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = DamagedGoodsTransformer::class;
    const MODEL = DamagedGoods::class;

    /**
     * 获取所有损坏商品
     *
     * @Get("/damagedgoods{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "order_no": "订单号",
     *          "good_sn": "商品编码",
     *          "standard_code": "规格编码",
     *          "quantity": 10,
     *          "money": "1001.10",
     *          "remark": "备注",
     *          "created_at": "2018-07-03 15:55:41",
     *          "updated_at": "2018-07-03 15:55:41"
     *      },
     *      {
     *          "id": 2,
     *          "order_no": "订单号2",
     *          "good_sn": "商品编码2",
     *          "standard_code": "规格编码2",
     *          "quantity": 10,
     *          "money": "1001.10",
     *          "remark": "备注",
     *          "created_at": "2018-07-03 15:55:47",
     *          "updated_at": "2018-07-03 15:55:47"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(DamagedGoodsRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增损坏商品
     *
     * @Post("/damagedgoods")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("order_no", description="订单号", required=true),
     *      @Parameter("good_sn", description="商品编码", required=true),
     *      @Parameter("standard_code", description="规格编码", required=true),
     *      @Parameter("quantity",type="integer", description="损坏数量", required=true),
     *      @Parameter("money",type="numeric", description="损坏金额", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "order_no": {
     *                  "订单号必填"
     *              },
     *              "good_sn": {
     *                  "商品编码必填"
     *              },
     *              "standard_code": {
     *                  "规格编码必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "order_no": "订单号1",
     *          "good_sn": "商品编码1",
     *          "standard_code": "规格编码1",
     *          "quantity": "10",
     *          "money": "1001.1",
     *          "remark": "备注",
     *          "created_at": "2018-07-03 15:41:04",
     *          "updated_at": "2018-07-03 15:41:04",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(DamagedGoodsRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条损坏商品
     *
     * @Get("/damagedgoods/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "order_no": "订单号",
     *          "good_sn": "商品编码",
     *          "standard_code": "规格编码",
     *          "quantity": 10,
     *          "money": "1001.10",
     *          "remark": "备注",
     *          "created_at": "2018-07-03 15:55:41",
     *          "updated_at": "2018-07-03 15:55:41"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改损坏商品
     *
     * @Patch("/damagedgoods/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "status": {
     *                  "状态必须int类型"
     *               },
     *              "order_no": {
     *                  "订单号必须string类型"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "order_no": "订单号",
     *          "good_sn": "商品编码",
     *          "standard_code": "规格编码",
     *          "quantity": 10,
     *          "money": "1001.10",
     *          "remark": "备注",
     *          "created_at": "2018-07-03 15:55:41",
     *          "updated_at": "2018-07-03 15:55:41"
     *      })
     * })
     */
    public function update(DamagedGoodsRequest $request, DamagedGoods $damagedgoods)
    {
        return $this->traitUpdate($request, $damagedgoods, self::TRANSFORMER);
    }

    /**
     * 删除损坏商品
     *
     * @Delete("/damagedgoods/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(DamagedGoods $damagedgoods)
    {
        return $this->traitDestroy($damagedgoods);
    }

    /**
     * 删除一组损坏商品
     *
     * @Delete("/damagedgoods")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="损坏商品id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组损坏商品状态
     *
     * @PUT("/damagedgoods")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="损坏商品id组 格式: 1,2,3,4 ", required=true),
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
