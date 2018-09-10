<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Requests\Api\WarehousingDepartmentRequest;
use App\Transformers\OrderTransformer;
use App\Transformers\WarehousingDepartmentTransformer;
use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;
use Dingo\Api\Exception\ResourceException;

/**
 * 仓储部资源
 * @Resource("warehousingdepts",uri="/api")
 */
class WarehousingDepartmentsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const MODEL = Order::class;
    const TRANSFORMER = WarehousingDepartmentTransformer::class;
    const PerPage = 8;

    /**
     * 获取所有仓储部订单
     *
     * @Get("/warehousingdepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]")
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
     *                   "next": "http://127.0.0.1:8000/api/warehousingdepts?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(WarehousingDepartmentRequest $request)
    {
        $order_status = $status =  null;

        extract($request->validated());

        $order = Order::query()
            ->when(!is_null($status), function ($query) use ($status) {

                return $query->where('status', $status);

            })->when($order_status, function ($query) use ($order_status) {

                return $query->where('order_status', $order_status);

            });

        return $this->response->paginator($order->paginate(self::PerPage), new OrderTransformer());
    }



    /**
     * 显示仓储修改
     *
     * @Get("/warehousingdepts/:id[?include=logistic,distribution]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 2,
     *          "logistics_id": 4,
     *          "logistics_sn": null,
     *          "actual_freight": null,
     *          "distributions_id": 1,
     *          "distribution_phone": "配送电话",
     *          "deliver_goods_fee": "10.00",
     *          "move_upstairs_fee": "10.00",
     *          "installation_fee": "10.00",
     *          "total_distribution_fee": "30.00",
     *          "receiver_name": "",
     *          "receiver_mobile": "",
     *          "logistic": {
     *              "id": 4,
     *              "code": "物流代码",
     *              "name": "物流名称",
     *              "report_id": 1,
     *              "expected_days": 1,
     *              "phone": "1",
     *              "address": "物流地址",
     *              "freight_type_id": 1,
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-23 14:22:29",
     *              "updated_at": "2018-08-23 16:39:22"
     *          },
     *          "distribution": {
     *              "id": 1,
     *              "name": "配送公司名称3",
     *              "phone": "配送公司电话",
     *              "address": "配送公司地址",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-08 16:15:57",
     *              "updated_at": "2018-08-08 16:21:59"
     *          }
     *      })
     * })
     */
    public function show(Order $order)
    {
        //是否已经货审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT)
            throw new ResourceException('未货审');

        return $this->response->item($order, self::TRANSFORMER);
    }

    /**
     * 仓储修改
     *
     * @Get("/warehousingdepts/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "logistics_id": "4",
     *          "logistics_sn": "123456",
     *          "actual_freight": "10.00",
     *          "distributions_id": "1",
     *          "distribution_phone": "123456",
     *          "deliver_goods_fee": "10",
     *          "move_upstairs_fee": "10",
     *          "installation_fee": "10",
     *          "total_distribution_fee": "30",
     *          "receiver_name": "收货人",
     *          "receiver_mobile": "123456",
     *          "logistic": {
     *              "id": 4,
     *              "code": "物流代码",
     *              "name": "物流名称",
     *              "report_id": 1,
     *              "expected_days": 1,
     *              "phone": "1",
     *              "address": "物流地址",
     *              "freight_type_id": 1,
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-23 14:22:29",
     *              "updated_at": "2018-08-23 16:39:22"
     *          },
     *          "distribution": {
     *              "id": 1,
     *              "name": "配送公司名称3",
     *              "phone": "配送公司电话",
     *              "address": "配送公司地址",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-08 16:15:57",
     *              "updated_at": "2018-08-08 16:21:59"
     *          }
     *      })
     * })
     */
    public function update(WarehousingDepartmentRequest $warehousingDepartmentRequest, Order $order)
    {
        //是否已经货审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT)
            throw new ResourceException('未货审');

        return $this->traitUpdate($warehousingDepartmentRequest, $order, self::TRANSFORMER);
    }

    /**
     * 仓储发货
     *
     * @PUT("/warehousingdepts/:id/stockout")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "仓储发货出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isStockOut(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT,
            '仓储发货出错',
            'stockOut'
        );
    }

    /**
     * 仓储退回客审
     *
     * @PUT("/warehousingdepts/:id/stockouttocs")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "仓储发货出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isStockOutToCS(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT,
            '仓储退回客审出错',
            'stockOutToCS'
        );
    }

}
