<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;

use App\Transformers\OrderTransformer;

use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;
use Dingo\Api\Exception\ResourceException;


/**
 * 跟单部资源
 * @Resource("merchandiserdepts",uri="/api")
 */
class MerchandiserDepartmentsController extends Controller
{
    use ProcedureTrait;

    const MODEL = Order::class;
    const TRANSFORMER = OrderTransformer::class;
    const PerPage = 8;

    /**
     * 跟单驳回
     *
     * @PUT("/merchandiserdepts/:id/unaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单驳回出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CS_AUDIT,
            '跟单驳回出错',
            'unAudit'
        );
    }

    /**
     * 跟单一审
     *
     * @PUT("/merchandiserdepts/:id/oneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单一审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isOneAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CS_AUDIT,
            '跟单一审出错',
            'oneAudit'
        );
    }


    /**
     * 跟单一审退审
     *
     * @PUT("/merchandiserdepts/:id/unoneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单一审退审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnOneAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_ONE_AUDIT,
            '跟单一审退审出错',
            'unOneAudit'
        );
    }

    /**
     * 显示跟单修改
     *
     * @Get("/merchandiserdepts/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "system_order_no": "DD2018082011365716512",
     *          "order_status": "已财审",
     *          "order_source": "system",
     *          "shops_id": 1,
     *          "logistics_id": 1,
     *          "billing_way": "weight",
     *          "promise_ship_time": "2018-08-20",
     *          "freight_types_id": 1,
     *          "expected_freight": "10.00",
     *          "distributions_id": 1,
     *          "distribution_methods_id": 15,
     *          "deliver_goods_fee": "10.00",
     *          "move_upstairs_fee": "10.00",
     *          "installation_fee": "10.00",
     *          "total_distribution_fee": "30.00",
     *          "distribution_phone": "配送电话",
     *          "distribution_no": "配送单号",
     *          "distribution_types_id": 1,
     *          "service_car_info": "服务车信息（配送信息）",
     *          "take_delivery_goods_fee": "10.00",
     *          "take_delivery_goods_ways_id": 1,
     *          "express_fee": "10.00",
     *          "service_car_fee": "10.00",
     *          "cancel_after_verification_code": "核销码",
     *          "wooden_frame_costs": "10.00",
     *          "preferential_cashback": "2.00",
     *          "favorable_cashback": "2.00",
     *          "customer_types_id": 1,
     *          "is_invoice": false,
     *          "invoice_express_fee": "5.00",
     *          "express_invoice_title": "快递发票抬头",
     *          "contract_no": "合同单号",
     *          "payment_methods_id": 1,
     *          "deposit": "10.00",
     *          "document_title": "单据头",
     *          "warehouses_id": 1,
     *          "payment_date": "2018-08-20",
     *          "interest_concessions": "10.00",
     *          "is_notice": true,
     *          "is_cancel_after_verification": false,
     *          "accept_order_user": "接单用户",
     *          "tax_number": "税号",
     *          "receipt": "收据",
     *          "logistics_remark": "物流备注",
     *          "seller_remark": "卖家备注",
     *          "customer_service_remark": "客服备注",
     *          "taobao_oid": 0,
     *          "taobao_tid": 0,
     *          "member_nick": "会员昵称",
     *          "shop_name": "",
     *          "seller_name": "",
     *          "seller_flag": 0,
     *          "created": null,
     *          "est_con_time": null,
     *          "buyer_message": "买家留言",
     *          "receiver_name": "",
     *          "receiver_phone": "",
     *          "receiver_mobile": "",
     *          "receiver_state": "",
     *          "receiver_city": "",
     *          "receiver_district": "",
     *          "receiver_address": "",
     *          "receiver_zip": "",
     *          "refund_info": "无退款",
     *          "business_personnel_id": 1,
     *          "locker_id": 0,
     *          "audit_at": null,
     *          "association_taobao_oid": "",
     *          "is_merge": false,
     *          "is_split": false,
     *          "is_association": false,
     *          "created_at": "2018-08-20 11:36:57",
     *          "updated_at": "2018-08-23 14:12:29"
     *      })
     * })
     */
    public function show(Order $order)
    {
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_FD_AUDIT)
            throw new ResourceException('未财审');

        return $this->response->item($order, self::TRANSFORMER);
    }

    /**
     * 显示跟单修改
     *
     * @Get("/merchandiserdepts/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "system_order_no": "DD2018082011365716512",
     *          "order_status": "已财审",
     *          "order_source": "system",
     *          "shops_id": 1,
     *          "logistics_id": 1,
     *          "billing_way": "weight",
     *          "promise_ship_time": "2018-08-20",
     *          "freight_types_id": 1,
     *          "expected_freight": "10.00",
     *          "distributions_id": 1,
     *          "distribution_methods_id": 15,
     *          "deliver_goods_fee": "10.00",
     *          "move_upstairs_fee": "10.00",
     *          "installation_fee": "10.00",
     *          "total_distribution_fee": "30.00",
     *          "distribution_phone": "配送电话",
     *          "distribution_no": "配送单号",
     *          "distribution_types_id": 1,
     *          "service_car_info": "服务车信息（配送信息）",
     *          "take_delivery_goods_fee": "10.00",
     *          "take_delivery_goods_ways_id": 1,
     *          "express_fee": "10.00",
     *          "service_car_fee": "10.00",
     *          "cancel_after_verification_code": "核销码",
     *          "wooden_frame_costs": "10.00",
     *          "preferential_cashback": "2.00",
     *          "favorable_cashback": "2.00",
     *          "customer_types_id": 1,
     *          "is_invoice": false,
     *          "invoice_express_fee": "5.00",
     *          "express_invoice_title": "快递发票抬头",
     *          "contract_no": "合同单号",
     *          "payment_methods_id": 1,
     *          "deposit": "10.00",
     *          "document_title": "单据头",
     *          "warehouses_id": 1,
     *          "payment_date": "2018-08-20",
     *          "interest_concessions": "10.00",
     *          "is_notice": true,
     *          "is_cancel_after_verification": false,
     *          "accept_order_user": "接单用户",
     *          "tax_number": "税号",
     *          "receipt": "收据",
     *          "logistics_remark": "物流备注",
     *          "seller_remark": "卖家备注",
     *          "customer_service_remark": "客服备注",
     *          "taobao_oid": 0,
     *          "taobao_tid": 0,
     *          "member_nick": "会员昵称",
     *          "shop_name": "",
     *          "seller_name": "",
     *          "seller_flag": 0,
     *          "created": null,
     *          "est_con_time": null,
     *          "buyer_message": "买家留言",
     *          "receiver_name": "",
     *          "receiver_phone": "",
     *          "receiver_mobile": "",
     *          "receiver_state": "",
     *          "receiver_city": "",
     *          "receiver_district": "",
     *          "receiver_address": "",
     *          "receiver_zip": "",
     *          "refund_info": "无退款",
     *          "business_personnel_id": 1,
     *          "locker_id": 0,
     *          "audit_at": null,
     *          "association_taobao_oid": "",
     *          "is_merge": false,
     *          "is_split": false,
     *          "is_association": false,
     *          "created_at": "2018-08-20 11:36:57",
     *          "updated_at": "2018-08-23 14:12:29"
     *      })
     * })
     */
    public function update()
    {
        return '1';
    }

    /**
     * 跟单货审
     *
     * @PUT("/merchandiserdepts/:id/cargoaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单货审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isCargoAudit(Order $order)
    {
        //是否已经财审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_FD_AUDIT)
            throw new UpdateResourceFailedException('跟单货审出错');

        //货审---查询缺货情况---缺货禁止通过货审
        if($order->isOOS())
            throw new UpdateResourceFailedException('库存不足，请及时补货');

        return $this->traitAction($order, false, '跟单货审出错', 'cargoAudit');
    }

}
