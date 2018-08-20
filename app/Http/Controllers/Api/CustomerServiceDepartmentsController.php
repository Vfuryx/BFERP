<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\Order;

use App\Http\Requests\Api\CustomerServiceDepartmentRequset;
use App\Http\Requests\Api\PaymentDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\OrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 客服部资源
 * @Resource("customerservicedepts",uri="/api")
 */
class CustomerServiceDepartmentsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = OrderTransformer::class;
    const MODEL = Order::class;
    const PerPage = 8;

    /**
     * 获取所有客服部
     *
     * @Get("/customerservicedepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 1,
     *              "system_order_no": "DD2018082011365716512",
     *              "order_status": "未处理",
     *              "order_source": "system",
     *              "shops_id": 1,
     *              "logistics_id": 1,
     *              "billing_way": "weight",
     *              "promise_ship_time": "2018-08-20",
     *              "freight_types_id": 1,
     *              "expected_freight": "10.00",
     *              "distributions_id": 1,
     *              "distribution_methods_id": 15,
     *              "deliver_goods_fee": "10.00",
     *              "move_upstairs_fee": "10.00",
     *              "installation_fee": "10.00",
     *              "total_distribution_fee": "30.00",
     *              "distribution_phone": "配送电话",
     *              "distribution_no": "配送单号",
     *              "distribution_types_id": 1,
     *              "service_car_info": "服务车信息（配送信息）",
     *              "take_delivery_goods_fee": "10.00",
     *              "take_delivery_goods_ways_id": 1,
     *              "express_fee": "10.00",
     *              "service_car_fee": "10.00",
     *              "cancel_after_verification_code": "核销码",
     *              "wooden_frame_costs": "10.00",
     *              "preferential_cashback": "2.00",
     *              "favorable_cashback": "2.00",
     *              "customer_types_id": 1,
     *              "is_invoice": false,
     *              "invoice_express_fee": "5.00",
     *              "express_invoice_title": "快递发票抬头",
     *              "contract_no": "合同单号",
     *              "payment_methods_id": 1,
     *              "deposit": "10.00",
     *              "document_title": "单据头",
     *              "warehouses_id": 1,
     *              "payment_date": "2018-08-20",
     *              "interest_concessions": "10.00",
     *              "is_notice": true,
     *              "is_cancel_after_verification": false,
     *              "accept_order_user": "接单用户",
     *              "tax_number": "税号",
     *              "receipt": "收据",
     *              "logistics_remark": "物流备注",
     *              "seller_remark": "卖家备注",
     *              "customer_service_remark": "客服备注",
     *              "taobao_oid": 0,
     *              "taobao_tid": 0,
     *              "member_nick": "会员昵称",
     *              "shop_name": "",
     *              "seller_name": "",
     *              "seller_flag": 0,
     *              "created": null,
     *              "est_con_time": null,
     *              "buyer_message": "买家留言",
     *              "receiver_name": "",
     *              "receiver_phone": "",
     *              "receiver_mobile": "",
     *              "receiver_state": "",
     *              "receiver_city": "",
     *              "receiver_district": "",
     *              "receiver_address": "",
     *              "receiver_zip": "",
     *              "refund_info": "无退款",
     *              "business_personnel_id": 0,
     *              "locker_id": 0,
     *              "audit_at": null,
     *              "association_taobao_oid": "",
     *              "is_merge": false,
     *              "is_split": false,
     *              "is_association": false,
     *              "created_at": "2018-08-20 11:36:57",
     *              "updated_at": "2018-08-20 11:36:57"
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
    public function index(CustomerServiceDepartmentRequset $requset)
    {
        return $this->allOrPage($requset, self::MODEL, self::TRANSFORMER, self::PerPage);
    }


    /**
     * 新增客服部(可选参数：include)
     *
     * @Post("/customerservicedepts[?include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("shops_id", type="integer", description="店铺id", required=true),
     *      @Parameter("member_nick", description="会员昵称", required=false),
     *      @Parameter("logistics_id", type="integer", description="物流id", required=true),
     *      @Parameter("billing_way", description="计费方式:weight、volume", required=true),
     *      @Parameter("promise_ship_time", type="date", description="承诺发货时间", required=false),
     *      @Parameter("freight_types_id", type="integer", description="运费类型id", required=true),
     *      @Parameter("expected_freight", type="numeric", description="预计运费", required=false),
     *      @Parameter("distributions_id", type="integer", description="配送id", required=true),
     *      @Parameter("distribution_methods_id", type="integer", description="配送方式id", required=false),
     *      @Parameter("deliver_goods_fee", type="numeric", description="送货费用", required=false),
     *      @Parameter("move_upstairs_fee", type="numeric", description="搬楼费用", required=false),
     *      @Parameter("installation_fee", type="numeric", description="安装费", required=false),
     *      @Parameter("total_distribution_fee", type="numeric", description="配送总计(送货费用 + 搬楼费用 + 安装费)", required=false),
     *      @Parameter("distribution_phone", description="配送电话", required=false),
     *      @Parameter("distribution_no", description="配送单号", required=false),
     *      @Parameter("distribution_types_id", type="integer", description="配送类型id", required=false),
     *      @Parameter("service_car_info", description="服务车信息（配送信息）", required=false),
     *      @Parameter("take_delivery_goods_fee", type="numeric", description="提货费用", required=true),
     *      @Parameter("take_delivery_goods_ways_id", type="integer", description="提货方式id", required=false),
     *      @Parameter("express_fee", type="integer", description="快递费用", required=false),
     *      @Parameter("service_car_fee", type="numeric", description="服务车金额（家装服务）", required=false),
     *      @Parameter("cancel_after_verification_code", description="核销码", required=false),
     *      @Parameter("wooden_frame_costs", type="numeric", description="木架费", required=false),
     *      @Parameter("preferential_cashback", type="numeric", description="优惠返现", required=false),
     *      @Parameter("favorable_cashback", type="numeric", description="好评返现", required=false),
     *      @Parameter("customer_types_id", description="客户类型id", required=true),
     *      @Parameter("is_invoice", type="boolean", description="是否要发票", required=false),
     *      @Parameter("invoice_express_fee", type="numeric", description="发票快递费", required=false),
     *      @Parameter("express_invoice_title", description="快递发票抬头", required=false),
     *      @Parameter("contract_no", description="合同单号", required=false),
     *      @Parameter("payment_methods_id", type="integer", description="付款方式id", required=true),
     *      @Parameter("deposit", type="numeric", description="订金", required=false),
     *      @Parameter("document_title", description="单据头", required=false),
     *      @Parameter("warehouses_id", type="integer", description="发货仓库id", required=true),
     *      @Parameter("payment_date", type="date", description="支付日期", required=false),
     *      @Parameter("interest_concessions", type="numeric", description="让利", required=false),
     *      @Parameter("is_notice", type="boolean", description="是否等通知发货", required=false),
     *      @Parameter("is_cancel_after_verification", type="boolean", description="是否核销", required=false),
     *      @Parameter("accept_order_user", description="接单用户", required=false),
     *      @Parameter("tax_number", description="税号", required=false),
     *      @Parameter("receipt", description="收据", required=false),
     *      @Parameter("logistics_remark", description="物流备注", required=false),
     *      @Parameter("seller_remark", description="卖家备注", required=false),
     *      @Parameter("customer_service_remark", description="客服备注", required=false),
     *      @Parameter("buyer_message", description="买家留言", required=false),
     *      @Parameter("status", description="订单是否开启", required=false),
     *      @Parameter("receiver_name", description="收货人", required=true),
     *      @Parameter("receiver_phone", description="收货人固定电话", required=true),
     *      @Parameter("receiver_mobile", description="收货人手机", required=true),
     *      @Parameter("receiver_state", description="收货人的所在省份", required=true),
     *      @Parameter("receiver_city", description="收货人的所在城市", required=true),
     *      @Parameter("receiver_district", description="收货人的所在地区", required=true),
     *      @Parameter("receiver_address", description="收货人的详细地址", required=true),
     *      @Parameter("receiver_zip", description="收货邮编", required=true),
     *      @Parameter("order_items[0][products_id]", type="integer", description="产品id", required=false),
     *      @Parameter("order_items[0][combinations_id]", type="integer", description="组合id", required=false),
     *      @Parameter("order_items[0][total_volume]", type="numeric", description="总体积", required=false),
     *      @Parameter("order_items[0][paint]", description="油漆", required=false),
     *      @Parameter("order_items[0][is_printing]", type="boolean", description="是否需要印刷", required=false),
     *      @Parameter("order_items[0][printing_fee]", type="numeric", description="印刷费用", required=false),
     *      @Parameter("order_items[0][is_spot_goods]", type="boolean", description="是否现货", required=false),
     *      @Parameter("order_items[0][under_line_univalent]", type="numeric", description="线下单价", required=false),
     *      @Parameter("order_items[0][under_line_total_amount]", type="numeric", description="线下金额（数量*单价）", required=false),
     *      @Parameter("order_items[0][under_line_preferential]", type="numeric", description="优惠（线下）", required=false),
     *      @Parameter("order_items[0][under_line_payment]", type="numeric", description="实际支付金额（线下）（线下金额 - 优惠）", required=false),
     *      @Parameter("payment_details[0][payment]", type="numeric", description="支付金额", required=false),
     *      @Parameter("payment_details[0][taobao_tid]", description="交易号（获取淘宝的交易编号）", required=false),
     *      @Parameter("payment_details[0][taobao_oid]", description="子订单编号（获取淘宝的订单号）", required=false),
     *      @Parameter("payment_details[0][pay_time]", type="datetime", description="付款时间", required=false),
     *      @Parameter("payment_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *      "shops_id":1,
     *      "member_nick":"会员昵称",
     *      "logistics_id":1,
     *      "billing_way":"weight",
     *      "promise_ship_time":"2018-8-20",
     *      "freight_types_id":1,
     *      "expected_freight":10,
     *      "distributions_id":1,
     *      "distribution_methods_id":15,
     *      "deliver_goods_fee":10,
     *      "move_upstairs_fee":10,
     *      "installation_fee":10,
     *      "total_distribution_fee":30,
     *      "distribution_phone":"配送电话",
     *      "distribution_no":"配送单号",
     *      "distribution_types_id":1,
     *      "service_car_info":"服务车信息（配送信息）",
     *      "take_delivery_goods_fee":10,
     *      "take_delivery_goods_ways_id":1,
     *      "express_fee":10,
     *      "service_car_fee":10,
     *      "cancel_after_verification_code":"核销码",
     *      "wooden_frame_costs":10,
     *      "preferential_cashback":2,
     *      "favorable_cashback":2,
     *      "customer_types_id":1,
     *      "is_invoice":false,
     *      "invoice_express_fee":5,
     *      "express_invoice_title":"快递发票抬头",
     *      "contract_no":"合同单号",
     *      "payment_methods_id":1,
     *      "deposit":10,
     *      "document_title":"单据头",
     *      "warehouses_id":1,
     *      "payment_date":"2018-8-20",
     *      "interest_concessions":10,
     *      "is_notice":true,
     *      "is_cancel_after_verification":false,
     *      "accept_order_user":"接单用户",
     *      "tax_number":"税号",
     *      "receipt":"收据",
     *      "logistics_remark":"物流备注",
     *      "seller_remark":"卖家备注",
     *      "customer_service_remark":"客服备注",
     *      "buyer_message":"买家留言",
     *      "receiver_name":"收货人",
     *      "receiver_phone":"收货人固定电话",
     *      "receiver_mobile":"收货人手机",
     *      "receiver_state":"收货人的所在省份",
     *      "receiver_city":"收货人的所在城市",
     *      "receiver_district":"收货人的所在地区",
     *      "receiver_address":"收货人的详细地址",
     *      "receiver_zip":"收货邮编",
     *      "status":true,
     *      "order_items[0][products_id]":29,
     *      "order_items[0][combinations_id]":14,
     *      "order_items[0][quantity]":10,
     *      "order_items[0][total_volume]":100,
     *      "order_items[0][paint]":"油漆",
     *      "order_items[0][is_printing]":false,
     *      "order_items[0][printing_fee]":1,
     *      "order_items[0][is_spot_goods]":false,
     *      "order_items[0][under_line_univalent]":10,
     *      "order_items[0][under_line_total_amount]":100,
     *      "order_items[0][under_line_preferential]":10,
     *      "order_items[0][under_line_payment]":90,
     *      "payment_details[0][payment]":100,
     *      "payment_details[0][taobao_tid]":"123456",
     *      "payment_details[0][taobao_oid]":"123456",
     *      "payment_details[0][pay_time]":"2018-8-18",
     *      "payment_details[0][remark]":"备注",
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
     *          "id": 1,
     *          "system_order_no": "DD2018082011365716512",
     *          "order_status": "未处理",
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
     *          "business_personnel_id": 0,
     *          "locker_id": 0,
     *          "audit_at": null,
     *          "association_taobao_oid": "",
     *          "is_merge": false,
     *          "is_split": false,
     *          "is_association": false,
     *          "created_at": "2018-08-20 11:36:57",
     *          "updated_at": "2018-08-20 11:36:57",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(
        CustomerServiceDepartmentRequset $customerServiceDepartmentRequset,
        PaymentDetailRequest $paymentDetailRequest,
        \App\Handlers\ValidatedHandler $validatedHandler
    ){
        $data[] = $customerServiceDepartmentRequset->validated();
        $data[] = $customerServiceDepartmentRequset->input('order_items');
        $data[] = $paymentDetailRequest->validated()['payment_details'];

        $id = DB::transaction(function () use (
            $data,
            $customerServiceDepartmentRequset,
            $paymentDetailRequest,
            $validatedHandler
        ) {
            $model = Order::create($data[0]);
            if ($data[1]) {
                foreach ($data[1] as $item) {
                    $model->orderItems()->create(
                        $validatedHandler->getValidatedData($customerServiceDepartmentRequset->rules(), $item)
                    );
                }
            }
            if($data[2]){
                foreach ($data[2] as $item) {
                    $model->paymentDetails()->create(
                        $validatedHandler->getValidatedData($paymentDetailRequest->rules(), $item)
                    );
                }
            }
            return $model->id;
        });

        return $this->response
            ->item(Order::find($id), self::TRANSFORMER)
            ->setStatusCode(201)
            ->addMeta('status_code', '201');
    }

    /**
     * 显示单条客服部
     *
     * @Get("/customerservicedepts/:id[?include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "system_order_no": "DD2018082011365716512",
     *          "order_status": "未处理",
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
     *          "business_personnel_id": 0,
     *          "locker_id": 0,
     *          "audit_at": null,
     *          "association_taobao_oid": "",
     *          "is_merge": false,
     *          "is_split": false,
     *          "is_association": false,
     *          "created_at": "2018-08-20 11:36:57",
     *          "updated_at": "2018-08-20 11:36:57",
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改客服部
     *
     * @Patch("/customerservicedepts/:id[?include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("shops_id", type="integer", description="店铺id", required=true),
     *      @Parameter("member_nick", description="会员昵称", required=false),
     *      @Parameter("logistics_id", type="integer", description="物流id", required=true),
     *      @Parameter("billing_way", description="计费方式:weight、volume", required=true),
     *      @Parameter("promise_ship_time", type="date", description="承诺发货时间", required=false),
     *      @Parameter("freight_types_id", type="integer", description="运费类型id", required=true),
     *      @Parameter("expected_freight", type="numeric", description="预计运费", required=false),
     *      @Parameter("distributions_id", type="integer", description="配送id", required=true),
     *      @Parameter("distribution_methods_id", type="integer", description="配送方式id", required=false),
     *      @Parameter("deliver_goods_fee", type="numeric", description="送货费用", required=false),
     *      @Parameter("move_upstairs_fee", type="numeric", description="搬楼费用", required=false),
     *      @Parameter("installation_fee", type="numeric", description="安装费", required=false),
     *      @Parameter("total_distribution_fee", type="numeric", description="配送总计(送货费用 + 搬楼费用 + 安装费)", required=false),
     *      @Parameter("distribution_phone", description="配送电话", required=false),
     *      @Parameter("distribution_no", description="配送单号", required=false),
     *      @Parameter("distribution_types_id", type="integer", description="配送类型id", required=false),
     *      @Parameter("service_car_info", description="服务车信息（配送信息）", required=false),
     *      @Parameter("take_delivery_goods_fee", type="numeric", description="提货费用", required=true),
     *      @Parameter("take_delivery_goods_ways_id", type="integer", description="提货方式id", required=false),
     *      @Parameter("express_fee", type="integer", description="快递费用", required=false),
     *      @Parameter("service_car_fee", type="numeric", description="服务车金额（家装服务）", required=false),
     *      @Parameter("cancel_after_verification_code", description="核销码", required=false),
     *      @Parameter("wooden_frame_costs", type="numeric", description="木架费", required=false),
     *      @Parameter("preferential_cashback", type="numeric", description="优惠返现", required=false),
     *      @Parameter("favorable_cashback", type="numeric", description="好评返现", required=false),
     *      @Parameter("customer_types_id", description="客户类型id", required=true),
     *      @Parameter("is_invoice", type="boolean", description="是否要发票", required=false),
     *      @Parameter("invoice_express_fee", type="numeric", description="发票快递费", required=false),
     *      @Parameter("express_invoice_title", description="快递发票抬头", required=false),
     *      @Parameter("contract_no", description="合同单号", required=false),
     *      @Parameter("payment_methods_id", type="integer", description="付款方式id", required=true),
     *      @Parameter("deposit", type="numeric", description="订金", required=false),
     *      @Parameter("document_title", description="单据头", required=false),
     *      @Parameter("warehouses_id", type="integer", description="发货仓库id", required=true),
     *      @Parameter("payment_date", type="date", description="支付日期", required=false),
     *      @Parameter("interest_concessions", type="numeric", description="让利", required=false),
     *      @Parameter("is_notice", type="boolean", description="是否等通知发货", required=false),
     *      @Parameter("is_cancel_after_verification", type="boolean", description="是否核销", required=false),
     *      @Parameter("accept_order_user", description="接单用户", required=false),
     *      @Parameter("tax_number", description="税号", required=false),
     *      @Parameter("receipt", description="收据", required=false),
     *      @Parameter("logistics_remark", description="物流备注", required=false),
     *      @Parameter("seller_remark", description="卖家备注", required=false),
     *      @Parameter("customer_service_remark", description="客服备注", required=false),
     *      @Parameter("buyer_message", description="买家留言", required=false),
     *      @Parameter("status", description="订单是否开启", required=false),
     *      @Parameter("receiver_name", description="收货人", required=true),
     *      @Parameter("receiver_phone", description="收货人固定电话", required=true),
     *      @Parameter("receiver_mobile", description="收货人手机", required=true),
     *      @Parameter("receiver_state", description="收货人的所在省份", required=true),
     *      @Parameter("receiver_city", description="收货人的所在城市", required=true),
     *      @Parameter("receiver_district", description="收货人的所在地区", required=true),
     *      @Parameter("receiver_address", description="收货人的详细地址", required=true),
     *      @Parameter("receiver_zip", description="收货邮编", required=true),
     *      @Parameter("order_items[0][id]", type="integer", description="子订单id", required=false),
     *      @Parameter("order_items[0][products_id]", type="integer", description="产品id", required=false),
     *      @Parameter("order_items[0][combinations_id]", type="integer", description="组合id", required=false),
     *      @Parameter("order_items[0][total_volume]", type="numeric", description="总体积", required=false),
     *      @Parameter("order_items[0][paint]", description="油漆", required=false),
     *      @Parameter("order_items[0][is_printing]", type="boolean", description="是否需要印刷", required=false),
     *      @Parameter("order_items[0][printing_fee]", type="numeric", description="印刷费用", required=false),
     *      @Parameter("order_items[0][is_spot_goods]", type="boolean", description="是否现货", required=false),
     *      @Parameter("order_items[0][under_line_univalent]", type="numeric", description="线下单价", required=false),
     *      @Parameter("order_items[0][under_line_total_amount]", type="numeric", description="线下金额（数量*单价）", required=false),
     *      @Parameter("order_items[0][under_line_preferential]", type="numeric", description="优惠（线下）", required=false),
     *      @Parameter("order_items[0][under_line_payment]", type="numeric", description="实际支付金额（线下）（线下金额 - 优惠）", required=false),
     *      @Parameter("payment_details[0][id]", type="integer", description="支付明细id", required=false),
     *      @Parameter("payment_details[0][payment]", type="numeric", description="支付金额", required=false),
     *      @Parameter("payment_details[0][taobao_tid]", description="交易号（获取淘宝的交易编号）", required=false),
     *      @Parameter("payment_details[0][taobao_oid]", description="子订单编号（获取淘宝的订单号）", required=false),
     *      @Parameter("payment_details[0][pay_time]", type="datetime", description="付款时间", required=false),
     *      @Parameter("payment_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *      "shops_id":1,
     *      "member_nick":"会员昵称",
     *      "logistics_id":1,
     *      "billing_way":"weight",
     *      "promise_ship_time":"2018-8-20",
     *      "freight_types_id":1,
     *      "expected_freight":10,
     *      "distributions_id":1,
     *      "distribution_methods_id":15,
     *      "deliver_goods_fee":10,
     *      "move_upstairs_fee":10,
     *      "installation_fee":10,
     *      "total_distribution_fee":30,
     *      "distribution_phone":"配送电话",
     *      "distribution_no":"配送单号",
     *      "distribution_types_id":1,
     *      "service_car_info":"服务车信息（配送信息）",
     *      "take_delivery_goods_fee":10,
     *      "take_delivery_goods_ways_id":1,
     *      "express_fee":10,
     *      "service_car_fee":10,
     *      "cancel_after_verification_code":"核销码",
     *      "wooden_frame_costs":10,
     *      "preferential_cashback":2,
     *      "favorable_cashback":2,
     *      "customer_types_id":1,
     *      "is_invoice":false,
     *      "invoice_express_fee":5,
     *      "express_invoice_title":"快递发票抬头",
     *      "contract_no":"合同单号",
     *      "payment_methods_id":1,
     *      "deposit":10,
     *      "document_title":"单据头",
     *      "warehouses_id":1,
     *      "payment_date":"2018-8-20",
     *      "interest_concessions":10,
     *      "is_notice":true,
     *      "is_cancel_after_verification":false,
     *      "accept_order_user":"接单用户",
     *      "tax_number":"税号",
     *      "receipt":"收据",
     *      "logistics_remark":"物流备注",
     *      "seller_remark":"卖家备注",
     *      "customer_service_remark":"客服备注",
     *      "buyer_message":"买家留言",
     *      "receiver_name":"收货人",
     *      "receiver_phone":"收货人固定电话",
     *      "receiver_mobile":"收货人手机",
     *      "receiver_state":"收货人的所在省份",
     *      "receiver_city":"收货人的所在城市",
     *      "receiver_district":"收货人的所在地区",
     *      "receiver_address":"收货人的详细地址",
     *      "receiver_zip":"收货邮编",
     *      "status":true,
     *      "order_items[0][id]":1,
     *      "order_items[0][products_id]":29,
     *      "order_items[0][combinations_id]":14,
     *      "order_items[0][quantity]":10,
     *      "order_items[0][total_volume]":100,
     *      "order_items[0][paint]":"油漆",
     *      "order_items[0][is_printing]":false,
     *      "order_items[0][printing_fee]":1,
     *      "order_items[0][is_spot_goods]":false,
     *      "order_items[0][under_line_univalent]":10,
     *      "order_items[0][under_line_total_amount]":100,
     *      "order_items[0][under_line_preferential]":10,
     *      "order_items[0][under_line_payment]":90,
     *      "payment_details[0][id]":1,
     *      "payment_details[0][payment]":100,
     *      "payment_details[0][taobao_tid]":"123456",
     *      "payment_details[0][taobao_oid]":"123456",
     *      "payment_details[0][pay_time]":"2018-8-18",
     *      "payment_details[0][remark]":"备注",
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
     *      @Parameter("shops_id", type="integer", description="店铺id", required=true),
     *      @Parameter("member_nick", description="会员昵称", required=false),
     *      @Parameter("logistics_id", type="integer", description="物流id", required=true),
     *      @Parameter("billing_way", description="计费方式:weight、volume", required=true),
     *      @Parameter("promise_ship_time", type="date", description="承诺发货时间", required=false),
     *      @Parameter("freight_types_id", type="integer", description="运费类型id", required=true),
     *      @Parameter("expected_freight", type="numeric", description="预计运费", required=false),
     *      @Parameter("distributions_id", type="integer", description="配送id", required=true),
     *      @Parameter("distribution_methods_id", type="integer", description="配送方式id", required=false),
     *      @Parameter("deliver_goods_fee", type="numeric", description="送货费用", required=false),
     *      @Parameter("move_upstairs_fee", type="numeric", description="搬楼费用", required=false),
     *      @Parameter("installation_fee", type="numeric", description="安装费", required=false),
     *      @Parameter("total_distribution_fee", type="numeric", description="配送总计(送货费用 + 搬楼费用 + 安装费)", required=false),
     *      @Parameter("distribution_phone", description="配送电话", required=false),
     *      @Parameter("distribution_no", description="配送单号", required=false),
     *      @Parameter("distribution_types_id", type="integer", description="配送类型id", required=false),
     *      @Parameter("service_car_info", description="服务车信息（配送信息）", required=false),
     *      @Parameter("take_delivery_goods_fee", type="numeric", description="提货费用", required=true),
     *      @Parameter("take_delivery_goods_ways_id", type="integer", description="提货方式id", required=false),
     *      @Parameter("express_fee", type="integer", description="快递费用", required=false),
     *      @Parameter("service_car_fee", type="numeric", description="服务车金额（家装服务）", required=false),
     *      @Parameter("cancel_after_verification_code", description="核销码", required=false),
     *      @Parameter("wooden_frame_costs", type="numeric", description="木架费", required=false),
     *      @Parameter("preferential_cashback", type="numeric", description="优惠返现", required=false),
     *      @Parameter("favorable_cashback", type="numeric", description="好评返现", required=false),
     *      @Parameter("customer_types_id", description="客户类型id", required=true),
     *      @Parameter("is_invoice", type="boolean", description="是否要发票", required=false),
     *      @Parameter("invoice_express_fee", type="numeric", description="发票快递费", required=false),
     *      @Parameter("express_invoice_title", description="快递发票抬头", required=false),
     *      @Parameter("contract_no", description="合同单号", required=false),
     *      @Parameter("payment_methods_id", type="integer", description="付款方式id", required=true),
     *      @Parameter("deposit", type="numeric", description="订金", required=false),
     *      @Parameter("document_title", description="单据头", required=false),
     *      @Parameter("warehouses_id", type="integer", description="发货仓库id", required=true),
     *      @Parameter("payment_date", type="date", description="支付日期", required=false),
     *      @Parameter("interest_concessions", type="numeric", description="让利", required=false),
     *      @Parameter("is_notice", type="boolean", description="是否等通知发货", required=false),
     *      @Parameter("is_cancel_after_verification", type="boolean", description="是否核销", required=false),
     *      @Parameter("accept_order_user", description="接单用户", required=false),
     *      @Parameter("tax_number", description="税号", required=false),
     *      @Parameter("receipt", description="收据", required=false),
     *      @Parameter("logistics_remark", description="物流备注", required=false),
     *      @Parameter("seller_remark", description="卖家备注", required=false),
     *      @Parameter("customer_service_remark", description="客服备注", required=false),
     *      @Parameter("buyer_message", description="买家留言", required=false),
     *      @Parameter("status", description="订单是否开启", required=false),
     *      @Parameter("receiver_name", description="收货人", required=true),
     *      @Parameter("receiver_phone", description="收货人固定电话", required=true),
     *      @Parameter("receiver_mobile", description="收货人手机", required=true),
     *      @Parameter("receiver_state", description="收货人的所在省份", required=true),
     *      @Parameter("receiver_city", description="收货人的所在城市", required=true),
     *      @Parameter("receiver_district", description="收货人的所在地区", required=true),
     *      @Parameter("receiver_address", description="收货人的详细地址", required=true),
     *      @Parameter("receiver_zip", description="收货邮编", required=true),
     *      @Parameter("order_items[0][products_id]", type="integer", description="产品id", required=false),
     *      @Parameter("order_items[0][combinations_id]", type="integer", description="组合id", required=false),
     *      @Parameter("order_items[0][total_volume]", type="numeric", description="总体积", required=false),
     *      @Parameter("order_items[0][paint]", description="油漆", required=false),
     *      @Parameter("order_items[0][is_printing]", type="boolean", description="是否需要印刷", required=false),
     *      @Parameter("order_items[0][printing_fee]", type="numeric", description="印刷费用", required=false),
     *      @Parameter("order_items[0][is_spot_goods]", type="boolean", description="是否现货", required=false),
     *      @Parameter("order_items[0][under_line_univalent]", type="numeric", description="线下单价", required=false),
     *      @Parameter("order_items[0][under_line_total_amount]", type="numeric", description="线下金额（数量*单价）", required=false),
     *      @Parameter("order_items[0][under_line_preferential]", type="numeric", description="优惠（线下）", required=false),
     *      @Parameter("order_items[0][under_line_payment]", type="numeric", description="实际支付金额（线下）（线下金额 - 优惠）", required=false),
     *      @Parameter("payment_details[0][payment]", type="numeric", description="支付金额", required=false),
     *      @Parameter("payment_details[0][taobao_tid]", description="交易号（获取淘宝的交易编号）", required=false),
     *      @Parameter("payment_details[0][taobao_oid]", description="子订单编号（获取淘宝的订单号）", required=false),
     *      @Parameter("payment_details[0][pay_time]", type="datetime", description="付款时间", required=false),
     *      @Parameter("payment_details[0][remark]", description="备注", required=false),
     *      })
     * })
     */
    public function update(
        CustomerServiceDepartmentRequset $customerServiceDepartmentRequset,
        PaymentDetailRequest $paymentDetailRequest,
        Order $order,
        \App\Handlers\ValidatedHandler $validatedHandler)
    {
        //锁定才能修改
        if ($order->unlock())
            throw new UpdateResourceFailedException('订单未锁定无法修改');

        $data[] = $customerServiceDepartmentRequset->validated();
        $data[] = $customerServiceDepartmentRequset->input('order_items');
        $data[] = $paymentDetailRequest->validated()['payment_details'];

        $order = DB::transaction(function() use (
            $data,
            $customerServiceDepartmentRequset,
            $paymentDetailRequest,
            $order,
            $validatedHandler
        ) {
            $order->update($data[0]);

            if ($data[1]??null) {
                foreach ($data[1] as $item) {
                    //计算要通过的字段
                    $validatedData = $validatedHandler->getValidatedData($customerServiceDepartmentRequset->rules(), $item);
                    //存在id则更新,否则插入
                    if (isset($item['id'])) {
                        $order->orderItems()->findOrFail($item['id'])->update($validatedData);
                    } else {
                        $order->orderItems()->create($validatedData);
                    }
                }
            }

            if ($data[2]??null) {
                foreach ($data[2] as $item) {
                    //计算要通过的字段
                    $validatedData = $validatedHandler->getValidatedData($paymentDetailRequest->rules(), $item);
                    //存在id则更新,否则插入
                    if (isset($item['id'])) {
                        $order->paymentDetails()->findOrFail($item['id'])->update($validatedData);
                    } else {
                        $order->paymentDetails()->create($validatedData);
                    }
                }
            }
            return $order;
        });

        return $this->response
            ->item($order, new OrderTransformer())
            ->setStatusCode(201);
    }


    /**
     * 删除客服部
     *
     * @Delete("/customerservicedepts/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Order $order)
    {
        DB::transaction(function() use ($order) {

            $orderItems = $order->orderItems()->delete();
            $paymentDetails = $order->paymentDetails()->delete();
            $order = $order->delete();

            if ($orderItems === false || $paymentDetails === false || $order === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 删除一组客服部
     *
     * @Delete("/customerservicedepts")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="客服部id组 格式: 1,2,3,4 ", required=true)
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
        $ids = explode(',', $request->input('ids'));

        DB::transaction(function() use ($ids) {

            $orderItems = \App\Models\OrderItem::whereIn('orders_id', $ids)->delete();
            $paymentDetails = \App\Models\PaymentDetail::whereIn('orders_id',$ids)->delete();
            $order = Order::destroy($ids);

            if ($orderItems === false || $paymentDetails === false || $order === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 更改一组客服部状态
     *
     * @PUT("/customerservicedepts/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="客服部id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用,1:启用)", required=true),
     * })
     * @Transaction({
     *      @Response(500, body={
     *          "message": "更改错误",
     *          "code": 500,
     *          "status_code": 500,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "ids": {
     *                  "id组必填"
     *              },
     *              "status": {
     *                  "状态必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function editStatusByIds(EditStatuRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

    /**
     * 锁定或释放
     *
     * @PUT("/customerservicedepts/:id/lockorunlock")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法锁定",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isLockOrUnlock(Order $order)
    {
        return $this->traitAction($order, !$order->status || $order->getOriginal('order_status') >= $order::ORDER_STATUS_CS_AUDIT, '无法锁定', 'lockOrUnlock');
    }

    /**
     * 客审
     *
     * @PUT("/customerservicedepts/:id/audit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "客审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_LOCK,
            '客审出错',
            'audit'
        );
    }

    /**
     * 退审
     *
     * @PUT("/customerservicedepts/:id/unaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "退审出错",
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
            '退审出错',
            'unAudit'
        );
    }

}
