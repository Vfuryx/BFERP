<?php

namespace App\Http\Controllers\Api;

use App\Models\StockInDetail;
use App\Http\Requests\Api\StockInDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\StockInDetailTransformer;
use App\Http\Controllers\Traits\CURDTrait;


/**
 * 入库单资源
 * @Resource("stockindetails",uri="/api")
 */
class StockInDetailsController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = StockInDetailTransformer::class;
    protected const MODEL = StockInDetail::class;

    /**
     * 获取所有入库单
     *
     * @Get("/stockindetails{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *              "id": 1,
     *              "stock_in": {
     *                  "id": 1,
     *                  "stock_in_no": "IS2018072013065251993",
     *                  "warehouse_id": 1,
     *                  "stock_in_types_id": 1,
     *                  "creator": "1",
     *                  "submitter": "",
     *                  "submit_at": null,
     *                  "checker": "",
     *                  "check_at": null,
     *                  "warehouer": "",
     *                  "stock_in_at": null,
     *                  "is_submit": 0,
     *                  "is_check": 0,
     *                  "is_stock_in": 0,
     *                  "status": 1,
     *                  "created_at": "2018-07-20 13:06:52",
     *                  "updated_at": "2018-07-20 13:06:52"
     *              },
     *              "purchase": {
     *                  "id": 1,
     *                  "purchase_order_no": "PO2018071718055128755",
     *                  "purchase_status": "新建",
     *                  "order_no": "",
     *                  "user_id": 1,
     *                  "receiver": "收货人3",
     *                  "receiver_address": "收货地址3",
     *                  "warehouse_id": 1,
     *                  "promise_delivery_time": null,
     *                  "salesman": "",
     *                  "source": "",
     *                  "client_name": "",
     *                  "buyer_nick": "",
     *                  "order_address": "",
     *                  "is_submit": 1,
     *                  "is_print": 1,
     *                  "is_check": 1,
     *                  "is_change": 0,
     *                  "remark": "备注3",
     *                  "status": 1,
     *                  "created_at": "2018-07-17 18:05:51",
     *                  "updated_at": "2018-07-18 14:16:33"
     *              },
     *              "product_spec": {
     *                  "id": 1,
     *                  "goods_id": 1,
     *                  "spec_code": "规格编码3",
     *                  "jd_specs_code": "京东规格编码",
     *                  "vips_specs_code": "唯品会规格编码",
     *                  "tb_price": "10.00",
     *                  "cost": "10.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_combination": 0,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 1,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 1,
     *                  "bar_code": "条形码2",
     *                  "img_url": "http://image.img.com",
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "length": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro": 1,
     *                  "is_stop_pro": 0,
     *                  "status": 1,
     *                  "created_at": "2018-07-18 17:42:36",
     *                  "updated_at": "2018-07-18 17:42:36"
     *              },
     *              "stock_in_quantity": 10,
     *              "created_at": "2018-07-20 16:06:32",
     *              "updated_at": "2018-07-20 16:13:43"
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
    public function index(StockInDetailRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10,0);
    }


    /**
     * 删除入库单
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
     * 删除一组入库单
     *
     * @Delete("/stockindetails")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="入库单id组 格式: 1,2,3,4 ", required=true)
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
