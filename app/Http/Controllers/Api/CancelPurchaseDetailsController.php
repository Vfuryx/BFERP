<?php

namespace App\Http\Controllers\Api;

use App\Models\CancelPurchaseDetail;
use App\Http\Requests\Api\CancelPurchaseDetailRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\CancelPurchaseDetailTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 取消采购单详情资源
 * @Resource("cancelpurchasedetails",uri="/api")
 */
class CancelPurchaseDetailsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = CancelPurchaseDetailTransformer::class;
    const MODEL = CancelPurchaseDetail::class;

    /**
     * 获取所有取消采购单详情
     *
     * @Get("/cancelpurchasedetails[?include=cancelPurchase,purchaseDetail]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *              "id": 3,
     *              "cancel_purchase": {
     *                  "id": 3,
     *                  "cancel_purchases_no": "CP2018082018300421223",
     *                  "purchases_id": 16,
     *                  "creator": "admin",
     *                  "submitter": "",
     *                  "submit_at": null,
     *                  "is_submit": false,
     *                  "status": true,
     *                  "created_at": "2018-08-20 18:30:04",
     *                  "updated_at": "2018-08-20 18:30:04"
     *              },
     *              "purchase_detail": {
     *                  "id": 19,
     *                  "purchase_lists_id": 16,
     *                  "purchase_item_status": "新建",
     *                  "product_components_id": 11,
     *                  "purchase_quantity": 1,
     *                  "stock_in_count": 0,
     *                  "shops_id": 1,
     *                  "suppliers_id": 1,
     *                  "purchase_cost": "1.00",
     *                  "purchase_freight": "2.00",
     *                  "warehouse_cost": "2.00",
     *                  "commission": "2.00",
     *                  "discount": "2.00",
     *                  "wooden_frame_costs": "2.00",
     *                  "arrival_time": "2018-08-16 00:00:00",
     *                  "remark": "1",
     *                  "created_at": "2018-08-17 13:59:32",
     *                  "updated_at": "2018-08-17 13:59:32"
     *              },
     *              "cancel_purchase_quantity": 1,
     *              "created_at": "2018-08-20 18:30:04",
     *              "updated_at": "2018-08-20 18:30:04",
     *              "cancelPurchase": {
     *                  "id": 3,
     *                  "cancel_purchases_no": "CP2018082018300421223",
     *                  "purchases_id": 16,
     *                  "creator": "admin",
     *                  "submitter": "",
     *                  "submit_at": null,
     *                  "is_submit": false,
     *                  "status": true,
     *                  "created_at": "2018-08-20 18:30:04",
     *                  "updated_at": "2018-08-20 18:30:04"
     *              },
     *              "purchaseDetail": {
     *                  "id": 19,
     *                  "purchase_lists_id": 16,
     *                  "purchase_item_status": "新建",
     *                  "product_components_id": 11,
     *                  "purchase_quantity": 1,
     *                  "stock_in_count": 0,
     *                  "shops_id": 1,
     *                  "suppliers_id": 1,
     *                  "purchase_cost": "1.00",
     *                  "purchase_freight": "2.00",
     *                  "warehouse_cost": "2.00",
     *                  "commission": "2.00",
     *                  "discount": "2.00",
     *                  "wooden_frame_costs": "2.00",
     *                  "arrival_time": "2018-08-16 00:00:00",
     *                  "remark": "1",
     *                  "created_at": "2018-08-17 13:59:32",
     *                  "updated_at": "2018-08-17 13:59:32"
     *              }
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 1,
     *             "count": 1,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": {
     *                 "previous": null,
     *                 "next": ""
     *             }
     *         }
     *     }
     * })
     */
    public function index(CancelPurchaseDetailRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10, 0);
    }


    /**
     * 删除取消采购单详情
     *
     * @Delete("/cancelpurchasedetails/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(CancelPurchaseDetail $cancelpurchasedetail)
    {

        return $this->traitDestroy($cancelpurchasedetail);
    }

    /**
     * 删除一组取消采购单详情
     *
     * @Delete("/cancelpurchasedetails")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="取消采购单详情id组 格式: 1,2,3,4 ", required=true)
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

}
