<?php

namespace App\Http\Controllers\Api;

use App\Models\PurchaseList;

use App\Http\Requests\Api\PurchaseListRequest;
use App\Http\Requests\Api\DestroyRequest;

use  App\Transformers\PurchaseListTransformer;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 采购清单资源
 * @Resource("purchaselists",uri="/api")
 */
class PurchaseListsController extends Controller
{
    use CURDTrait;

    const MODEL = PurchaseList::class;
    const TRANSFORMER = PurchaseListTransformer::class;
    const PerPage = 8;

    /**
     * 获取所有费用类型
     *
     * @Get("/purchaselists[?status=true&include=purchase,purchaseDetails.productComponent]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="产品编码", required=false),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *              "id": 16,
     *              "purchases_id": 16,
     *              "combinations_id": 7,
     *              "remark": "",
     *              "created_at": "2018-08-17 13:59:32",
     *              "updated_at": "2018-08-17 13:59:32",
     *              "purchase": {
     *                  "id": 16,
     *                  "purchase_order_no": "PO2018081713593264379",
     *                  "purchase_status": "新建",
     *                  "order_no": "",
     *                  "user_id": 1,
     *                  "print_at": null,
     *                  "receiver": "采购收:",
     *                  "receiver_address": "采购收货地址2:",
     *                  "promise_ship_time": null,
     *                  "business_personnel": "",
     *                  "source": "",
     *                  "client_name": "",
     *                  "buyer_nick": "",
     *                  "order_address": "",
     *                  "is_submit": false,
     *                  "is_print": false,
     *                  "is_audit": true,
     *                  "is_change": true,
     *                  "remark": "采购备注2:",
     *                  "status": true
     *              },
     *              "purchaseDetails": {
     *                  "data": {
     *                      {
     *                          "id": 19,
     *                          "purchase_lists_id": 16,
     *                          "purchase_item_status": "新建",
     *                          "product_components_id": 11,
     *                          "purchase_quantity": 1,
     *                          "stock_in_count": 0,
     *                          "shops_id": 1,
     *                          "suppliers_id": 1,
     *                          "purchase_cost": "1.00",
     *                          "purchase_freight": "2.00",
     *                          "warehouse_cost": "2.00",
     *                          "commission": "2.00",
     *                          "discount": "2.00",
     *                          "wooden_frame_costs": "2.00",
     *                          "arrival_time": "2018-08-16 00:00:00",
     *                          "remark": "1",
     *                          "created_at": "2018-08-17 13:59:32",
     *                          "updated_at": "2018-08-17 13:59:32",
     *                          "productComponent": {
     *                              "id": 11,
     *                              "pid": 29,
     *                              "component_code": "子件编码4",
     *                              "jd_component_code": "京东子件编码",
     *                              "vips_component_code": "唯品会子件编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_common": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 10,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 12,
     *                              "bar_code": "1010",
     *                              "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro": true,
     *                              "is_stop_pro": true,
     *                              "created_at": "2018-08-14 15:08:54",
     *                              "updated_at": "2018-08-15 11:39:45"
     *                          }
     *                      }
     *                  }
     *              }
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 1,
     *             "count": 1,
     *             "per_page": 13,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(PurchaseListRequest $request)
    {
        $commodity_code = '';

        extract($request->validated());

        $product = PurchaseList::query()
            ->whereHas('combination', function ($query) use ($commodity_code) {
                $query->whereHas('product',function ($query) use ($commodity_code) {
                    $query->when($commodity_code, function ($query) use ($commodity_code) {
                        return $query->where('commodity_code', 'like', '%' . $commodity_code . '%');
                    });
                });
            });

        return $this->response->paginator($product->paginate(self::PerPage), self::TRANSFORMER);
    }


    /**
     * 删除采购清单
     *
     * @Delete("/purchaselists/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PurchaseList $purchaselist)
    {
        $this->traitJoint2Destroy($purchaselist,'purchaseDetails');
    }

    /**
     * 删除一组采购清单
     *
     * @Delete("/purchaselists")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购清单id组 格式: 1,2,3,4 ", required=true)})
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
        $this->traitJoint2DestroybyIds($request->input('ids'),'purchaseDetails',self::MODEL);
    }

}
