<?php

namespace App\Http\Controllers\Api;

use App\Models\PurchaseReturnDetail;
use App\Http\Requests\Api\PurchaseReturnDetailRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\PurchaseReturnDetailTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 取消采购单详情资源
 * @Resource("purchasereturndetails",uri="/api")
 */
class PurchaseReturnDetailsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = PurchaseReturnDetailTransformer::class;
    const MODEL = PurchaseReturnDetail::class;

    /**
     * 获取所有取消采购单详情
     *
     * @Get("/purchasereturndetails{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *          {
     *              "id": 1,
     *              "purchase_return": {
     *                  "id": 1,
     *                  "purchase_return_no": "RG2018072411440706967",
     *                  "creator": "admin",
     *                  "is_submit": 1,
     *                  "submitter": "",
     *                  "submit_at": null,
     *                  "is_audit": 1,
     *                  "auditor": "admin",
     *                  "audit_at": "2018-07-24 15:00:53",
     *                  "is_print": 1,
     *                  "remark": "采购退货单备注1",
     *                  "status": true,
     *                  "created_at": "2018-07-24 11:44:07",
     *                  "updated_at": "2018-07-24 15:00:53"
     *              },
     *              "stock": {
     *                  "id": 1,
     *                  "warehouse_id": 1,
     *                  "goods_id": 1,
     *                  "pro_specs_id": 1,
     *                  "quantity": 8,
     *                  "status": true,
     *                  "created_at": "2018-07-21 18:20:53",
     *                  "updated_at": "2018-07-24 15:00:53"
     *              },
     *              "purchase_return_quantity": 12,
     *              "supplier": {
     *                  "id": 1,
     *                  "name": "1",
     *                  "company": "1",
     *                  "code": "1",
     *                  "province": "1",
     *                  "city": "1",
     *                  "district": "1",
     *                  "address": "1",
     *                  "zipcode": "1",
     *                  "contacts": "1",
     *                  "phone": "1",
     *                  "mobile": "132131343242",
     *                  "fax": "1",
     *                  "email": "132@re.cn",
     *                  "remark": "1",
     *                  "is_scan": true,
     *                  "status": true,
     *                  "auto_valuation": true,
     *                  "created_at": "2018-07-17 17:54:01",
     *                  "updated_at": "2018-07-17 17:54:01"
     *              },
     *              "price_differences": "1.00",
     *              "purchase_return_type": {
     *                  "id": 1,
     *                  "name": "采购退货类型名称",
     *                  "status": true,
     *                  "created_at": "2018-07-24 10:24:13",
     *                  "updated_at": "2018-07-24 10:24:13"
     *              },
     *              "created_at": "2018-07-24 11:44:07",
     *              "updated_at": "2018-07-24 12:50:25"
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
    public function index(PurchaseReturnDetailRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10, 0);
    }


    /**
     * 删除取消采购单详情
     *
     * @Delete("/purchasereturndetails/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PurchaseReturnDetail $purchasereturndetail)
    {
        return $this->traitDestroy($purchasereturndetail);
    }

    /**
     * 删除一组取消采购单详情
     *
     * @Delete("/purchasereturndetails")
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
