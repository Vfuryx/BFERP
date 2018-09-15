<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReturnOrderItemRequest;
use App\Http\Requests\Api\StockSyncReturnRequest;

use App\Models\ReturnOrder;

use App\Transformers\ReturnOrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 库存同步资源
 * @Resource("stocksyncreturn",uri="/api")
 */
class StockSyncReturnsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = ReturnOrderTransformer::class;
    const MODEL = ReturnOrder::class;
    const PerPage = 8;

    /**
     * 获取所有库存同步
     *
     * @Get("/stocksyncreturn{?status}[&include=order,shop,customerService,returnReason,refundPaymentMethod,logistics,freightType,distribution,returnOrderItem,personliable]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("order_status", type="boolean", description="获取的状态", required=false, default="all"),
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 1,
     *              "return_sn": "RT2018091515081324812",
     *              "return_order_status": "同步库存",
     *              "shops_id": 1,
     *              "orders_id": 4,
     *              "member_nick": "会员昵称1",
     *              "customer_name": "客户姓名1",
     *              "customer_phone": "123456",
     *              "customer_service_id": 1,
     *              "deposit": "10.00",
     *              "return_reasons_id": 1,
     *              "customer_address": "客户地址1",
     *              "is_scour": true,
     *              "expected_arrival_time": "2018-09-13 00:00:00",
     *              "payee": "收款人1",
     *              "refund_account": "退款账号",
     *              "refund_payment_methods_id": 1,
     *              "refund_amount": "10.00",
     *              "logistics_id": 1,
     *              "freight_types_id": 0,
     *              "freight": "10.00",
     *              "logistics_sn": "物流单号1",
     *              "take_delivery_goods_address": "提货地址1",
     *              "logistics_remark": "物流备注1",
     *              "follow_up": "测试跟进",
     *              "distributions_id": 1,
     *              "pulling_cost": "10.00",
     *              "person_liable_id": 1,
     *              "liable_fee": "10.00",
     *              "as_remark": "售后备注",
     *              "status": true,
     *              "created_at": "2018-09-15 15:08:13",
     *              "updated_at": "2018-09-15 16:36:00"
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
    public function index(StockSyncReturnRequest $requset)
    {
        return $this->allOrPage($requset, self::MODEL, self::TRANSFORMER, self::PerPage);
    }


    /**
     * 显示单条库存同步
     *
     * @Get("/stocksyncreturn/:id[?include=]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "return_sn": "RT2018091515081324812",
     *          "return_order_status": "同步库存",
     *          "shops_id": 1,
     *          "orders_id": 4,
     *          "member_nick": "会员昵称1",
     *          "customer_name": "客户姓名1",
     *          "customer_phone": "123456",
     *          "customer_service_id": 1,
     *          "deposit": "10.00",
     *          "return_reasons_id": 1,
     *          "customer_address": "客户地址1",
     *          "is_scour": true,
     *          "expected_arrival_time": "2018-09-13 00:00:00",
     *          "payee": "收款人1",
     *          "refund_account": "退款账号",
     *          "refund_payment_methods_id": 1,
     *          "refund_amount": "10.00",
     *          "logistics_id": 1,
     *          "freight_types_id": 0,
     *          "freight": "10.00",
     *          "logistics_sn": "物流单号1",
     *          "take_delivery_goods_address": "提货地址1",
     *          "logistics_remark": "物流备注1",
     *          "follow_up": "测试跟进",
     *          "distributions_id": 1,
     *          "pulling_cost": "10.00",
     *          "person_liable_id": 1,
     *          "liable_fee": "10.00",
     *          "as_remark": "售后备注",
     *          "status": true,
     *          "created_at": "2018-09-15 15:08:13",
     *          "updated_at": "2018-09-15 16:36:00"
     *      })
     * })
     */
    public function show(ReturnOrder $returnorder)
    {
        return $this->traitShow($returnorder, self::TRANSFORMER);
    }

    /**
     * 库存提交
     *
     * @PUT("/stocksyncreturn/:id/stocksubmit")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("expected_arrival_time", type="date", description="预计到货时间", required=true),
     *      @Parameter("follow_up", description="跟进记录", required=false),
     *      @Parameter("return_order_items[0][id]", type="integer", description="退货子单id", required=true),
     *      @Parameter("return_order_items[0][suppliers_id]", type="integer", description="供应商id", required=true),
     *      @Parameter("return_order_items[0][receipt_types_id]", type="integer", description="收货类型id", required=true),
     *      @Parameter("return_order_items[0][is_damage]", type="integer", description="是否损坏", required=true),
     *      @Parameter("return_order_items[0][repair_price]", type="integer", description="返修价格", required=true),
     *      @Parameter("return_order_items[0][factory_return_time]", type="integer", description="退厂时间", required=true),
     *      @Parameter("return_order_items[0][expected_return_time]", type="integer", description="预计返还时间", required=true),
     *      @Parameter("return_order_items[0][warehouse_id]", type="integer", description="收货仓库", required=true),
     *      @Parameter("return_order_items[0][remark]", type="integer", description="备注", required=true),
     * })
     * @Request({
     *      "expected_arrival_time": "2018-9-7",
     *      "follow_up": "跟进记录",
     *      "return_order_items[0][id]": 1,
     *      "return_order_items[0][suppliers_id]": 1,
     *      "return_order_items[0][receipt_types_id]": 1,
     *      "return_order_items[0][is_damage]": true,
     *      "return_order_items[0][repair_price]": 10,
     *      "return_order_items[0][factory_return_time]": "2018-9-1",
     *      "return_order_items[0][expected_return_time]": "2018-9-13",
     *      "return_order_items[0][warehouse_id]": 3,
     *      "return_order_items[0][remark]": "测试备注",
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法库存提交",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isStockSubmit(
        StockSyncReturnRequest $stockSyncReturnRequest,
        ReturnOrderItemRequest $returnOrderItemRequest,
        ReturnOrder $returnorder
    ){
        if($returnorder->isAsUnTwoAudit())
            throw new UpdateResourceFailedException('订单无法修改');

        $data[] = $stockSyncReturnRequest->validated();
        $data[] = $returnOrderItemRequest->input('return_order_items');

        $this->traitJoint2Update(
            $data,
            'returnOrderItem',
            $returnOrderItemRequest->rules(),
            $returnorder,
            self::TRANSFORMER
        );

        //创建其他入库单
        $returnorder->createOtherStockIn();

        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_AS_TWO_AUDIT,
            '无法库存提交', 'stockSubmit');
    }


    /**
     * 库存同步
     *
     * @PUT("/stocksyncreturn/:id/stocksync")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法库存同步",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isStockSync(ReturnOrder $returnorder)
    {
        //检测其他入库订单是否已入库
        if($returnorder->isUnStockSubmit())
            throw new UpdateResourceFailedException('无法库存同步');

        //判断其他入库订单未入库
        if($returnorder->checkOtherStockNotIn())
            throw new UpdateResourceFailedException('其他入库订单未入库');

        return $this->traitAction(
            $returnorder,
            !$returnorder->status,
            '无法库存同步', 'stockSync');
    }

}
