<?php

namespace App\Http\Controllers\Api;

use App\Models\ReturnOrder;

use App\Http\Requests\Api\CustomerServiceReturnRequest;
use App\Http\Requests\Api\ReturnOrderItemRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\ReturnOrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 客服退货资源
 * @Resource("customerservicereturns",uri="/api")
 */
class CustomerServiceReturnsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = ReturnOrderTransformer::class;
    const MODEL = ReturnOrder::class;
    const PerPage = 8;

    /**
     * 获取所有客服退货
     *
     * @Get("/customerservicereturns{?status}[&include=order,shop,customerService,returnReason,refundPaymentMethod,logistics,freightType,distributions,returnOrderItem]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 2,
     *              "return_sn": "RT2018091517045055751",
     *              "return_order_status": "未处理",
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
     *              "expected_arrival_time": null,
     *              "payee": "收款人1",
     *              "refund_account": "退款账号",
     *              "refund_payment_methods_id": 1,
     *              "refund_amount": "10.00",
     *              "logistics_id": 0,
     *              "freight_types_id": 0,
     *              "freight": "0.00",
     *              "logistics_sn": "",
     *              "take_delivery_goods_address": "",
     *              "logistics_remark": "",
     *              "follow_up": "跟进记录",
     *              "distributions_id": 1,
     *              "pulling_cost": "10.00",
     *              "person_liable_id": 0,
     *              "liable_fee": "0.00",
     *              "as_remark": "",
     *              "status": true,
     *              "created_at": "2018-09-15 17:04:50",
     *              "updated_at": "2018-09-15 17:04:50",
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
    public function index(CustomerServiceReturnRequest $requset)
    {
        return $this->allOrPage($requset, self::MODEL, self::TRANSFORMER, self::PerPage);
    }

    /**
     * 新增客服退货(可选参数：include)
     *
     * @Post("/customerservicereturns[?include=order,shop,customerService,returnReason,refundPaymentMethod,logistics,freightType,distributions,returnOrderItem]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("orders_id", type="integer", description="订单id", required=true),
     *      @Parameter("shops_id", type="integer", description="店铺id", required=true),
     *      @Parameter("member_nick", description="会员昵称", required=true),
     *      @Parameter("customer_name", description="客户姓名", required=true),
     *      @Parameter("customer_phone", description="客户电话", required=true),
     *      @Parameter("deposit", type="numeric", description="押金", required=true),
     *      @Parameter("return_reasons_id", type="integer", description="退货原因id", required=true),
     *      @Parameter("customer_address", description="客户地址", required=true),
     *      @Parameter("is_scour", type="boolean", description="是否冲款", required=false),
     *      @Parameter("payee", description="收款人", required=false),
     *      @Parameter("refund_account", description="退款账号", required=false),
     *      @Parameter("refund_payment_methods_id", type="integer", description="退款支付方式id", required=true),
     *      @Parameter("refund_amount", type="numeric", description="退款金额", required=false),
     *      @Parameter("follow_up", description="跟进记录", required=false),
     *      @Parameter("distributions_id", type="integer", description="配送公司id", required=true),
     *      @Parameter("pulling_cost", type="numeric", description="拉货费用", required=false),
     *      @Parameter("status", type="boolean", description="状态", required=false),
     *      @Parameter("return_order_items[0][order_items_id]", type="integer", description="子订单id", required=false),
     *      @Parameter("return_order_items[0][suppliers_id]", type="integer", description="供应商id", required=false),
     *      @Parameter("return_order_items[0][is_damage]", type="boolean", description="是否损坏", required=false),
     *     })
     * @Request({
     *      "orders_id": 4,
     *      "shops_id": 1,
     *      "member_nick": "会员昵称1",
     *      "customer_name": "客户姓名1",
     *      "customer_phone": "123456",
     *      "deposit": 10,
     *      "return_reasons_id": 1,
     *      "customer_address": "客户地址1",
     *      "is_scour": true,
     *      "payee": "收款人1",
     *      "refund_account": "退款账号",
     *      "refund_payment_methods_id": 1,
     *      "refund_amount": 10,
     *      "follow_up": "跟进记录",
     *      "distributions_id": 1,
     *      "pulling_cost": 10,
     *      "status": true,
     *      "return_order_items[0][order_items_id]": 1,
     *      "return_order_items[0][suppliers_id]": 1,
     *      "return_order_items[0][is_damage]": true,
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "shops_id": {
     *                  "店铺id必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 2,
     *          "return_sn": "RT2018091517045055751",
     *          "return_order_status": "未处理",
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
     *          "expected_arrival_time": null,
     *          "payee": "收款人1",
     *          "refund_account": "退款账号",
     *          "refund_payment_methods_id": 1,
     *          "refund_amount": "10.00",
     *          "logistics_id": 0,
     *          "freight_types_id": 0,
     *          "freight": "0.00",
     *          "logistics_sn": "",
     *          "take_delivery_goods_address": "",
     *          "logistics_remark": "",
     *          "follow_up": "跟进记录",
     *          "distributions_id": 1,
     *          "pulling_cost": "10.00",
     *          "person_liable_id": 0,
     *          "liable_fee": "0.00",
     *          "as_remark": "",
     *          "status": true,
     *          "created_at": "2018-09-15 17:04:50",
     *          "updated_at": "2018-09-15 17:04:50",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(
        CustomerServiceReturnRequest $customerServiceReturnRequest,
        ReturnOrderItemRequest $returnOrderItemRequest
    ){
        $data[] = $customerServiceReturnRequest->validated();
        $data[] = $returnOrderItemRequest->input('return_order_items');

        return $this->traitJoint2Store(
            $data,
            'returnOrderItem',
            $returnOrderItemRequest->rules(),
            self::MODEL,
            self::TRANSFORMER
        );
    }

    /**
     * 显示单条客服退货
     *
     * @Get("/customerservicereturns/:id[?include=]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 2,
     *          "return_sn": "RT2018091517045055751",
     *          "return_order_status": "未处理",
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
     *          "expected_arrival_time": null,
     *          "payee": "收款人1",
     *          "refund_account": "退款账号",
     *          "refund_payment_methods_id": 1,
     *          "refund_amount": "10.00",
     *          "logistics_id": 0,
     *          "freight_types_id": 0,
     *          "freight": "0.00",
     *          "logistics_sn": "",
     *          "take_delivery_goods_address": "",
     *          "logistics_remark": "",
     *          "follow_up": "跟进记录",
     *          "distributions_id": 1,
     *          "pulling_cost": "10.00",
     *          "person_liable_id": 0,
     *          "liable_fee": "0.00",
     *          "as_remark": "",
     *          "status": true,
     *          "created_at": "2018-09-15 17:04:50",
     *          "updated_at": "2018-09-15 17:04:50",
     *      })
     * })
     */
    public function show(ReturnOrder $returnorder)
    {
        return $this->traitShow($returnorder, self::TRANSFORMER);
    }

    /**
     * 修改客服退货
     *
     * @Patch("/customerservicereturns/:id[?include=]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("orders_id", type="integer", description="订单id", required=true),
     *      @Parameter("shops_id", type="integer", description="店铺id", required=true),
     *      @Parameter("member_nick", description="会员昵称", required=true),
     *      @Parameter("customer_name", description="客户姓名", required=true),
     *      @Parameter("customer_phone", description="客户电话", required=true),
     *      @Parameter("deposit", type="numeric", description="押金", required=true),
     *      @Parameter("return_reasons_id", type="integer", description="退货原因id", required=true),
     *      @Parameter("customer_address", description="客户地址", required=true),
     *      @Parameter("is_scour", type="boolean", description="是否冲款", required=false),
     *      @Parameter("payee", description="收款人", required=false),
     *      @Parameter("refund_account", description="退款账号", required=false),
     *      @Parameter("refund_payment_methods_id", type="integer", description="退款支付方式id", required=true),
     *      @Parameter("refund_amount", type="numeric", description="退款金额", required=false),
     *      @Parameter("follow_up", description="跟进记录", required=false),
     *      @Parameter("distributions_id", type="integer", description="配送公司id", required=true),
     *      @Parameter("pulling_cost", type="numeric", description="拉货费用", required=false),
     *      @Parameter("status", type="boolean", description="状态", required=false),
     *      @Parameter("return_order_items[0][id]", type="integer", description="退货子单id", required=false),
     *      @Parameter("return_order_items[0][order_items_id]", type="integer", description="子订单id", required=false),
     *      @Parameter("return_order_items[0][suppliers_id]", type="integer", description="供应商id", required=false),
     *      @Parameter("return_order_items[0][is_damage]", type="boolean", description="是否损坏", required=false),
     * })
     * @Request({
     *      "orders_id": 4,
     *      "shops_id": 1,
     *      "member_nick": "会员昵称1",
     *      "customer_name": "客户姓名1",
     *      "customer_phone": "123456",
     *      "deposit": 10,
     *      "return_reasons_id": 1,
     *      "customer_address": "客户地址1",
     *      "is_scour": true,
     *      "payee": "收款人1",
     *      "refund_account": "退款账号",
     *      "refund_payment_methods_id": 1,
     *      "refund_amount": 10,
     *      "follow_up": "跟进记录",
     *      "distributions_id": 1,
     *      "pulling_cost": 10,
     *      "status": true,
     *      "return_order_items[0][id]": 1,
     *      "return_order_items[0][order_items_id]": 1,
     *      "return_order_items[0][suppliers_id]": 1,
     *      "return_order_items[0][is_damage]": true,
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "shops_id": {
     *                  "店铺id必填"
     *              },
     *           },
     *          "message": "还未锁定无法修改",
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 2,
     *          "return_sn": "RT2018091517045055751",
     *          "return_order_status": "未处理",
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
     *          "expected_arrival_time": null,
     *          "payee": "收款人1",
     *          "refund_account": "退款账号",
     *          "refund_payment_methods_id": 1,
     *          "refund_amount": "10.00",
     *          "logistics_id": 0,
     *          "freight_types_id": 0,
     *          "freight": "0.00",
     *          "logistics_sn": "",
     *          "take_delivery_goods_address": "",
     *          "logistics_remark": "",
     *          "follow_up": "跟进记录",
     *          "distributions_id": 1,
     *          "pulling_cost": "10.00",
     *          "person_liable_id": 0,
     *          "liable_fee": "0.00",
     *          "as_remark": "",
     *          "status": true,
     *          "created_at": "2018-09-15 17:04:50",
     *          "updated_at": "2018-09-15 17:04:50",
     *      })
     * })
     */
    public function update(
        CustomerServiceReturnRequest $customerServiceReturnRequest,
        ReturnOrderItemRequest $returnOrderItemRequest,
        ReturnOrder $returnorder
    ){
        if($returnorder->isCsUnOneAudit())
            throw new UpdateResourceFailedException('订单无法修改');


        $data[] = $customerServiceReturnRequest->validated();
        $data[] = $returnOrderItemRequest->input('return_order_items');

        return $this->traitJoint2Update(
            $data,
            'returnOrderItem',
            $returnOrderItemRequest->rules(),
            $returnorder,
            self::TRANSFORMER
        );
    }

    /**
     * 删除客服退货
     *
     * @Delete("/customerservicereturns/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ReturnOrder $returnorder)
    {
        $this->traitDestroy($returnorder);
    }

    /**
     * 删除一组客服退货
     *
     * @Delete("/customerservicereturns")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="客服退货id组 格式: 1,2,3,4 ", required=true)
     * })
     * @Transaction({
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
        $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 客服一审
     *
     * @PUT("/customerservicereturns/:id/oneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法客服一审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isOneAudit(ReturnOrder $returnorder)
    {
        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_NEW,
            '无法客服一审', 'csOneAudit');
    }

    /**
     * 客服一审退审
     *
     * @PUT("/customerservicereturns/:id/unoneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法客服一审退审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnOneAudit(ReturnOrder $returnorder)
    {
        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_CS_ONE_AUDIT,
            '无法客服一审退审', 'csUnOneAudit');
    }

    /**
     * 客服二审
     *
     * @PUT("/customerservicereturns/:id/twoaudit")
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
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法客服二审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isTwoAudit(
        CustomerServiceReturnRequest $customerServiceReturnRequest,
        ReturnOrderItemRequest $returnOrderItemRequest,
        ReturnOrder $returnorder
    ){
        if($returnorder->isAsUnOneAudit())
            throw new UpdateResourceFailedException('订单无法修改');

        $data[] = $customerServiceReturnRequest->validated();
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
            !$returnorder->status,
            '无法客服二审', 'csTwoAudit');
    }

    /**
     * 客服二审退审
     *
     * @PUT("/customerservicereturns/:id/untwoaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法客服二审退审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnTwoAudit(ReturnOrder $returnorder)
    {
        if($returnorder->isCsUnTwoAudit())
            throw new UpdateResourceFailedException('订单无法修改');

        return $this->traitAction(
            $returnorder,
            !$returnorder->status,
            '无法客服二审退审', 'csUnTwoAudit');
    }

}
