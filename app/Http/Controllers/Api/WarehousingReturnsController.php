<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReturnOrderItemRequest;
use App\Http\Requests\Api\WarehousingReturnRequest;

use App\Models\ReturnOrder;

use App\Transformers\ReturnOrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 仓储退货资源
 * @Resource("warehousingreturns",uri="/api")
 */
class WarehousingReturnsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = ReturnOrderTransformer::class;
    const MODEL = ReturnOrder::class;
    const PerPage = 8;

    /**
     * 获取所有仓储退货
     *
     * @Get("/warehousingreturns{?status}[&include=]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("order_status", type="boolean", description="获取的状态", required=false, default="all"),
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *
     *          }
     *       },
     *     "meta": {
     *          "pagination": {
     *              "total": 1,
     *              "count": 1,
     *              "per_page": 8,
     *              "current_page": 1,
     *              "total_pages": 1,
     *              "links": null
     *          }
     *      }
     * })
     */
    public function index(WarehousingReturnRequest $requset)
    {
        return $this->allOrPage($requset, self::MODEL, self::TRANSFORMER, self::PerPage);
    }


    /**
     * 显示单条仓储退货
     *
     * @Get("/warehousingreturns/:id[?include=]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *      })
     * })
     */
    public function show(ReturnOrder $returnorder)
    {
        return $this->traitShow($returnorder, self::TRANSFORMER);
    }

    /**
     * 仓储审核
     *
     * @PUT("/warehousingreturns/:id/whaudit")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("expected_arrival_time", type="date", description="预计到货时间", required=true),
     *      @Parameter("logistics_id", type="integer", description="物流id", required=true),
     *      @Parameter("freight_types_id", type="integer", description="运费类型id", required=true),
     *      @Parameter("freight", type="numeric", description="运费", required=true),
     *      @Parameter("logistics_sn", description="物流单号", required=true),
     *      @Parameter("take_delivery_goods_address", description="提货地址", required=true),
     *      @Parameter("logistics_remark", description="物流备注", required=false),
     *      @Parameter("follow_up", description="跟进记录", required=false),
     *      @Parameter("return_order_items[0][id]", type="integer", description="退货子单id", required=true),
     *      @Parameter("return_order_items[0][suppliers_id]", type="integer", description="供应商id", required=true),
     *      @Parameter("return_order_items[0][receipt_types_id]", type="integer", description="收货类型id", required=true),
     *      @Parameter("return_order_items[0][is_damage]", type="integer", description="是否损坏", required=false),
     * })
     * @Request({
     *      "expected_arrival_time": "2018-9-7",
     *      "logistics_id": 1,
     *      "freight_types_id": 1,
     *      "freight": 10,
     *      "logistics_sn": "物流单号",
     *      "take_delivery_goods_address": "提货地址",
     *      "logistics_remark": "物流备注",
     *      "follow_up": "跟进记录",
     *      "return_order_items[0][id]": 1,
     *      "return_order_items[0][suppliers_id]": 1,
     *      "return_order_items[0][receipt_types_id]": 1,
     *      "return_order_items[0][is_damage]": true,
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法仓储审核",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isWhAudit(
        WarehousingReturnRequest $warehousingReturnRequest,
        ReturnOrderItemRequest $returnOrderItemRequest,
        ReturnOrder $returnorder
    ){
        if($returnorder->isCsUnTwoAudit())
            throw new UpdateResourceFailedException('订单无法修改');

        $data[] = $warehousingReturnRequest->validated();
        $data[] = $returnOrderItemRequest->input('return_order_items');

        $this->traitJoint2Update(
            $data,
            'returnOrderItem',
            $returnOrderItemRequest->rules(),
            $returnorder,
            self::TRANSFORMER
        );

        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_CS_TWO_AUDIT,
            '无法仓储审核', 'whAudit');
    }


    /**
     * 仓储审核退审
     *
     * @PUT("/warehousingreturns/:id/whunaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法仓储审核退审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isWhUnAudit(ReturnOrder $returnorder)
    {
        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_WH_AUDIT,
            '无法仓储审核退审', 'whUnAudit');
    }

}
