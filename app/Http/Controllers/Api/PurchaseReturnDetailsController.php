<?php

namespace App\Http\Controllers\Api;

use App\Models\PurchaseReturnDetail;
use App\Http\Requests\Api\PurchaseReturnDetailRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\PurchaseReturnDetailTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 采购退货单详情资源
 * @Resource("purchasereturndetails",uri="/api")
 */
class PurchaseReturnDetailsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = PurchaseReturnDetailTransformer::class;
    const MODEL = PurchaseReturnDetail::class;

    /**
     * 获取所有采购退货单详情
     *
     * @Get("/purchasereturndetails[?include=purchaseReturnType,purchaseReturn,stock,supplier]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *          {
     *              "id": 3,
     *              "purchase_returns_id": 3,
     *              "stocks_id": 18,
     *              "purchase_return_quantity": 12,
     *              "suppliers_id": 1,
     *              "price_differences": "0.00",
     *              "purchase_return_types_id": 2,
     *              "created_at": "2018-08-21 17:04:22",
     *              "updated_at": "2018-08-21 17:04:22",
     *              "purchaseReturnType": {
     *                  "id": 2,
     *                  "name": "采购退货类型名称",
     *                  "status": true,
     *                  "created_at": "2018-08-21 17:04:08",
     *                  "updated_at": "2018-08-21 17:04:08"
     *              },
     *              "purchaseReturn": {
     *                  "id": 3,
     *                  "purchase_return_no": "RG2018082117042268516",
     *                  "creator": "admin",
     *                  "is_submit": false,
     *                  "submitter": "",
     *                  "submit_at": null,
     *                  "is_audit": false,
     *                  "auditor": "",
     *                  "audit_at": null,
     *                  "is_print": false,
     *                  "remark": "采购退货单备注",
     *                  "status": true,
     *                  "created_at": "2018-08-21 17:04:22",
     *                  "updated_at": "2018-08-21 17:04:22"
     *              },
     *              "stock": {
     *                  "id": 18,
     *                  "warehouse_id": 1,
     *                  "products_id": 30,
     *                  "product_components_id": 7,
     *                  "quantity": 10,
     *                  "status": true,
     *                  "created_at": "2018-08-15 16:25:24",
     *                  "updated_at": "2018-08-16 11:43:51"
     *              },
     *              "supplier": {
     *                  "id": 1,
     *                  "name": "供应商名称",
     *                  "company": "供应商公司",
     *                  "code": "公司代码",
     *                  "province": "省",
     *                  "city": "市",
     *                  "district": "区",
     *                  "address": "地址",
     *                  "zipcode": "邮编",
     *                  "contacts": "联系人",
     *                  "phone": "电话",
     *                  "mobile": "手机",
     *                  "fax": "传真",
     *                  "email": "935661686@qq.com",
     *                  "remark": "备注",
     *                  "is_scan": true,
     *                  "status": true,
     *                  "auto_valuation": true,
     *                  "created_at": "2018-08-06 16:27:02",
     *                  "updated_at": "2018-08-06 16:27:02"
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
    public function index(PurchaseReturnDetailRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10, 0);
    }


    /**
     * 删除采购退货单详情
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
     * 删除一组采购退货单详情
     *
     * @Delete("/purchasereturndetails")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购退货单详情id组 格式: 1,2,3,4 ", required=true)
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
