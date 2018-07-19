<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\PurchaseDetailRequest;
use App\Transformers\PurchaseDetailTransformer;
use App\Models\PurchaseDetail;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 采购单详情资源
 * @Resource("purchasedetails",uri="/api")
 */
class PurchaseDetailsController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = PurchaseDetailTransformer::class;
    protected const MODEL = PurchaseDetail::class;

//    /**
//     * 获取所有采购单详情
//     *
//     * @Get("/purchasedetails{?status}")
//     * @Versions({"v1"})
//     * @Parameters({
//     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
//     * })
//     * @Response(200, body={
//     * "data": {
//     *      {
//     *          "id": 1,
//     *          "purchase_order_no": "PO2018071718055128755",
//     *          "purchase_status": "新建",
//     *          "order_no": "",
//     *          "user_id": 1,
//     *          "receiver": "收货人",
//     *          "receiver_address": "收货地址",
//     *          "warehouse_id": 1,
//     *          "promise_delivery_time": null,
//     *          "salesman": "",
//     *          "source": "",
//     *          "client_name": "",
//     *          "buyer_nick": "",
//     *          "order_address": "",
//     *          "is_submit": 0,
//     *          "is_print": 0,
//     *          "is_check": 0,
//     *          "is_change": 0,
//     *          "remark": "备注",
//     *          "status": 1,
//     *          "created_at": "2018-07-17 18:05:51",
//     *          "updated_at": "2018-07-17 18:05:51"
//     *      },
//     *     },
//     *     "meta": {
//     *         "pagination": {
//     *             "total": 2,
//     *             "count": 2,
//     *             "per_page": 10,
//     *             "current_page": 1,
//     *             "total_pages": 1,
//     *             "links": null
//     *         }
//     *     }
//     * })
//     */
//    public function index(PurchaseDetailRequest $request)
//    {
//        return $this->response->collection(PurchaseDetail::all(),new PurchaseDetailTransformer());
//    }

//    /**
//     * 新增采购单详情
//     *
//     * @Post("/purchasedetails")
//     * @Versions({"v1"})
//     * @Parameters({
//     *      @Parameter("purchase_status", description="采购状态", required=true),
//     *      @Parameter("receiver", description="收货人", required=true),
//     *      @Parameter("receiver_address", description="收货地址", required=true),
//     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=true),
//     *      @Parameter("remark", description="备注", required=false),
//     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
//     * })
//     * @Transaction({
//     *      @Response(422, body={
//     *          "message": "422 Unprocessable Entity",
//     *           "errors": {
//     *              "receiver": {
//     *                  "收货人必填"
//     *              },
//     *           },
//     *          "status_code": 422,
//     *      }),
//     *      @Response(201, body={
//     *          "id": 1,
//     *          "purchase_order_no": "PO2018071718055128755",
//     *          "purchase_status": "新建",
//     *          "order_no": null,
//     *          "user_id": 1,
//     *          "receiver": "收货人",
//     *          "receiver_address": "收货地址",
//     *          "warehouse_id": "1",
//     *          "promise_delivery_time": null,
//     *          "salesman": null,
//     *          "source": null,
//     *          "client_name": null,
//     *          "buyer_nick": null,
//     *          "order_address": null,
//     *          "is_submit": null,
//     *          "is_print": null,
//     *          "is_check": null,
//     *          "is_change": null,
//     *          "remark": "备注",
//     *          "status": "1",
//     *          "created_at": "2018-07-17 18:05:51",
//     *          "updated_at": "2018-07-17 18:05:51",
//     *          "meta": {
//     *              "status_code": "201"
//     *          }
//     *      })
//     * })
//     */
//    public function store(PurchaseDetailRequest $request)
//    {
//        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
//    }
//
//    /**
//     * 显示单条采购单详情
//     *
//     * @Get("/purchasedetails/:id")
//     * @Versions({"v1"})
//     * @Transaction({
//     *      @Response(404, body={
//     *          "message": "No query results for model ",
//     *          "status_code": 404,
//     *      }),
//     *      @Response(200, body={
//     *          "id": 1,
//     *          "purchase_order_no": "PO2018071718055128755",
//     *          "purchase_status": "新建",
//     *          "order_no": "",
//     *          "user_id": 1,
//     *          "receiver": "收货人",
//     *          "receiver_address": "收货地址",
//     *          "warehouse_id": 1,
//     *          "promise_delivery_time": null,
//     *          "salesman": "",
//     *          "source": "",
//     *          "client_name": "",
//     *          "buyer_nick": "",
//     *          "order_address": "",
//     *          "is_submit": 0,
//     *          "is_print": 0,
//     *          "is_check": 0,
//     *          "is_change": 0,
//     *          "remark": "备注",
//     *          "status": 1,
//     *          "created_at": "2018-07-17 18:05:51",
//     *          "updated_at": "2018-07-17 18:05:51"
//     *      })
//     * })
//     */
//    public function show($id)
//    {
//        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
//    }

//    /**
//     * 修改城市信息
//     *
//     * @Patch("/purchasedetails/:id")
//     * @Versions({"v1"})
//     * @Transaction({
//     *      @Response(404, body={
//     *          "message": "No query results for model ",
//     *          "status_code": 404,
//     *      }),
//     *      @Response(422, body={
//     *          "message": "422 Unprocessable Entity",
//     *           "errors": {
//     *              "receiver": {
//     *                  "收货人必须string类型"
//     *               },
//     *              "receiver_address": {
//     *                  "收货地址必填"
//     *               },
//     *              "warehouse_id": {
//     *                  "仓库id必须int类型"
//     *               },
//     *           },
//     *          "status_code": 422
//     *      }),
//     *      @Response(201, body={
//     *          "id": 1,
//     *          "purchase_order_no": "PO2018071718055128755",
//     *          "purchase_status": "新建",
//     *          "order_no": "",
//     *          "user_id": 1,
//     *          "receiver": "收货人1",
//     *          "receiver_address": "收货地址1",
//     *          "warehouse_id": "1",
//     *          "promise_delivery_time": null,
//     *          "salesman": "",
//     *          "source": "",
//     *          "client_name": "",
//     *          "buyer_nick": "",
//     *          "order_address": "",
//     *          "is_submit": 0,
//     *          "is_print": 0,
//     *          "is_check": 0,
//     *          "is_change": 0,
//     *          "remark": "备注1",
//     *          "status": "1",
//     *          "created_at": "2018-07-17 18:05:51",
//     *          "updated_at": "2018-07-17 18:33:06"
//     *      })
//     * })
//     */
//    public function update(PurchaseDetailRequest $request, PurchaseDetail $purchasedetail)
//    {
//        return $this->traitUpdate($request, $purchasedetail, self::TRANSFORMER);
//    }

    /**
     * 删除采购单详情
     *
     * @Delete("/purchasedetails/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PurchaseDetail $PurchaseDetail)
    {
        return $this->traitDestroy($PurchaseDetail);
    }

    /**
     * 删除一组采购单详情
     *
     * @Delete("/purchasedetails")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购单详情id组 格式: 1,2,3,4 ", required=true)})
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
    public function destroybyIds(PurchaseDetailRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

//    /**
//     * 更改一组采购单详情状态
//     *
//     * @PUT("/purchasedetails")
//     * @Versions({"v1"})
//     * @Parameters({
//     *      @Parameter("ids", description="采购单详情id组 格式: 1,2,3,4 ", required=true),
//     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=true),
//     * })
//     * @Transaction({
//     *      @Response(500, body={
//     *          "message": "更改错误",
//     *          "code": 500,
//     *          "status_code": 500,
//     *      }),
//     *      @Response(422, body={
//     *          "message": "422 Unprocessable Entity",
//     *           "errors": {
//     *              "ids": {
//     *                  "id组必填"
//     *              },
//     *              "status": {
//     *                  "状态必填"
//     *              }
//     *           },
//     *          "status_code": 422,
//     *      }),
//     *      @Response(204, body={})
//     * })
//     */
//    public function editStatusByIds(PurchaseDetailRequest $request)
//    {
//        return $this->traitEditStatusByIds($request, self::MODEL);
//    }
    
}
