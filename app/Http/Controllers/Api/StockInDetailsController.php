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
     * @Get("/stockindetails{}")
     * @Versions({"v1"})
     * @Response(200, body={
     *     "data": {
     *         {
     *              "id": 1,
     *              "stock_in": {
     *                  "id": 1,
     *                  "stock_in_no": "IS2018081513063587085",
     *                  "warehouse_id": 1,
     *                  "stock_in_types_id": 3,
     *                  "creator": "admin",
     *                  "is_submit": true,
     *                  "submitter": "admin",
     *                  "submit_at": "2018-08-15 14:14:09",
     *                  "is_print": true,
     *                  "print_at": "2018-08-15 14:17:29",
     *                  "is_audit": true,
     *                  "auditor": "admin",
     *                  "audit_at": "2018-08-15 14:17:03",
     *                  "is_stock_in": true,
     *                  "warehouer": "admin",
     *                  "stock_in_at": "2018-08-15 16:25:24",
     *                  "status": true,
     *                  "created_at": "2018-08-15 13:06:35",
     *                  "updated_at": "2018-08-15 16:25:24"
     *              },
     *              "purchase_lists_id": null,
     *              "product_spec": null,
     *              "stock_in_quantity": 1,
     *              "total_fee": "10.00",
     *              "remark": "备注",
     *              "created_at": "2018-08-15 13:06:35",
     *              "updated_at": "2018-08-15 13:06:35"
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
