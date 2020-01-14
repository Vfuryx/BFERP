<?php

namespace App\Http\Controllers\Api;

use App\Models\StockInDetail;
use App\Http\Requests\Api\StockInDetailRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\StockInDetailTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 入库单详情资源
 * @Resource("stockindetails",uri="/api")
 */
class StockInDetailsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = StockInDetailTransformer::class;
    const MODEL = StockInDetail::class;

    /**
     * 获取所有入库单详情
     *
     * @Get("/stockindetails[?include=stockIn,productComponent,purchaseDetail]")
     * @Versions({"v1"})
     * @Response(200, body={
     *     "data": {
     *         {
     *              "id": 5,
     *              "stock_ins_id": 5,
     *              "purchase_details_id": 19,
     *              "product_components_id": 7,
     *              "stock_in_quantity": 2,
     *              "total_fee": "20.00",
     *              "remark": "备注",
     *              "created_at": "2018-08-15 16:43:36",
     *              "updated_at": "2018-08-15 16:43:36",
     *              "stockIn": {
     *                  "id": 5,
     *                  "stock_in_no": "IS2018081516433694713",
     *                  "warehouse_id": 1,
     *                  "stock_in_types_id": 3,
     *                  "creator": "admin",
     *                  "submitter": "admin",
     *                  "submit_at": "2018-08-15 16:44:24",
     *                  "print_at": "2018-08-15 16:44:51",
     *                  "is_print": true,
     *                  "auditor": "admin",
     *                  "audit_at": "2018-08-15 16:44:48",
     *                  "warehouer": "admin",
     *                  "stock_in_at": "2018-08-15 16:44:58",
     *                  "is_submit": true,
     *                  "is_audit": true,
     *                  "is_stock_in": true,
     *                  "status": true,
     *                  "created_at": "2018-08-15 16:43:36",
     *                  "updated_at": "2018-08-15 16:44:58"
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
     *              },
     *              "productComponent": {
     *                  "id": 7,
     *                  "pid": 30,
     *                  "component_code": "子件编码5修改后",
     *                  "jd_component_code": "京东子件编码",
     *                  "vips_component_code": "唯品会子件编码",
     *                  "tb_price": "10.00",
     *                  "cost": "10.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_common": true,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 10,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 12,
     *                  "bar_code": "1010",
     *                  "img_url": "/images/uploads/201808/14/1_1534242176_CH4LQO3qQo.jpg",
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "longness": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro": true,
     *                  "is_stop_pro": true,
     *                  "created_at": "2018-08-14 16:59:04",
     *                  "updated_at": "2018-08-14 18:23:15"
     *              }
     *         },
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
    public function index(StockInDetailRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10, 0);
    }


    /**
     * 删除入库单详情
     *
     * @Delete("/stockindetails/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(StockInDetail $stockindetail)
    {

        return $this->traitDestroy($stockindetail);
    }

    /**
     * 删除一组入库单详情
     *
     * @Delete("/stockindetails")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="入库单详情id组 格式: 1,2,3,4 ", required=true)
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
