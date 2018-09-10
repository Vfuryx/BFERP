<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;

use App\Http\Requests\Api\FinancialDepartmentRequest;

use App\Transformers\OrderTransformer;
use App\Http\Controllers\Traits\ProcedureTrait;

/**
 * 财务部资源
 * @Resource("financialdepts",uri="/api")
 */
class FinancialDepartmentsController extends Controller
{
    use ProcedureTrait;

    const MODEL = Order::class;
    const TRANSFORMER = OrderTransformer::class;
    const PerPage = 8;

    /**
     * 获取所有财务部订单
     *
     * @Get("/financialdepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="开启的状态", required=false, default="all"),
     *      @Parameter("order_status", type="integer", description="订单状态", required=false, default="all"),
     * })
     * @Response(200, body={
     *       "data": {
     *          {
     *              "id": 22,
     *              "system_order_no": "DD2018090714055056211",
     *              "order_status": "已客审",
     *              "order_source": "system",
     *              "shops_id": 1,
     *              "logistics_id": 4,
     *              "billing_way": "weight",
     *              "promise_ship_time": "2018-09-11",
     *              "freight_types_id": 1,
     *              "expected_freight": "21.00",
     *              "distributions_id": 1,
     *              "distribution_methods_id": 13,
     *              "deliver_goods_fee": "21.00",
     *              "move_upstairs_fee": "21.00",
     *              "installation_fee": "21.00",
     *              "total_distribution_fee": "63.00",
     *              "distribution_phone": "21",
     *              "distribution_no": "21",
     *              "distribution_types_id": 1,
     *              "service_car_info": "21",
     *              "take_delivery_goods_fee": "21.00",
     *              "take_delivery_goods_ways_id": 6,
     *              "express_fee": "21.00",
     *              "service_car_fee": "21.00",
     *              "cancel_after_verification_code": "21",
     *              "wooden_frame_costs": "21.00",
     *              "preferential_cashback": "21.00",
     *              "favorable_cashback": "21.00",
     *              "customer_types_id": 1,
     *              "is_invoice": false,
     *              "invoice_express_fee": "21.00",
     *              "express_invoice_title": "21",
     *              "contract_no": "21",
     *              "payment_methods_id": 3,
     *              "deposit": "21.00",
     *              "document_title": "21",
     *              "warehouses_id": 1,
     *              "payment_date": "2018-09-20",
     *              "interest_concessions": "21.00",
     *              "is_notice": true,
     *              "is_cancel_after_verification": false,
     *              "accept_order_user": "21",
     *              "tax_number": "21",
     *              "receipt": "21",
     *              "logistics_remark": "21",
     *              "seller_remark": "21",
     *              "customer_service_remark": "21",
     *              "taobao_oid": 0,
     *              "taobao_tid": 0,
     *              "member_nick": "会员昵称",
     *              "shop_name": "",
     *              "seller_name": "",
     *              "seller_flag": 0,
     *              "created": null,
     *              "est_con_time": null,
     *              "buyer_message": "21",
     *              "receiver_name": "12",
     *              "receiver_phone": "212",
     *              "receiver_mobile": "21",
     *              "receiver_state": "河南省",
     *              "receiver_city": "南阳市",
     *              "receiver_district": "邓州市",
     *              "receiver_address": "21",
     *              "receiver_zip": "21",
     *              "refund_info": "无退款",
     *              "business_personnel_id": 1,
     *              "locker_id": 0,
     *              "audit_at": null,
     *              "association_taobao_oid": "",
     *              "is_merge": false,
     *              "is_split": false,
     *              "is_association": false,
     *              "created_at": "2018-09-07 14:05:50",
     *              "updated_at": "2018-09-07 17:52:15"
     *          }
     *       },
     *       "meta": {
     *           "pagination": {
     *               "total": 1,
     *               "count": 1,
     *               "per_page": 10,
     *               "current_page": 1,
     *               "total_pages": 1,
     *               "links": {
     *                   "previous": null,
     *                   "next": "http://127.0.0.1:8000/api/financialdepts?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(FinancialDepartmentRequest $request)
    {
        $order_status = $status =  null;

        extract($request->validated());

        $order = Order::query()
            ->when(!is_null($status), function ($query) use ($status) {

                return $query->where('status', $status);

            })->when($order_status, function ($query) use ($order_status) {

                return $query->where('order_status', $order_status);

            });

        return $this->response->paginator($order->paginate(self::PerPage), self::TRANSFORMER);
    }

    /**
     * 财务驳回
     *
     * @PUT("/financialdepts/:id/reject")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "财务驳回出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isReject(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_ONE_AUDIT,
            '财务驳回出错',
            'unOneAudit'
        );
    }


    /**
     * 财审
     *
     * @PUT("/financialdepts/:id/financialaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "财审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isFinancialAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_ONE_AUDIT,
            '财审出错',
            'financialAudit'
        );
    }

    /**
     * 退回财审
     *
     * @PUT("/financialdepts/:id/unfinancialaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "退回财审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnFinancialAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_FD_AUDIT,
            '退回财审出错',
            'unFinancialAudit'
        );
    }

}
