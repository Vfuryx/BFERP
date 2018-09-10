<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;

use App\Http\Requests\Api\MerchandiserDepartmentRequest;

use App\Transformers\CargoAuditTransformer;
use App\Transformers\OrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;
use Dingo\Api\Exception\ResourceException;


/**
 * 跟单部资源
 * @Resource("merchandiserdepts",uri="/api")
 */
class MerchandiserDepartmentsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const MODEL = Order::class;
    const TRANSFORMER = OrderTransformer::class;
    const PerPage = 8;

    /**
     * 获取所有跟单部订单
     *
     * @Get("/merchandiserdepts{?status}[&include=shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="开启的状态", required=false, default="all"),
     *      @Parameter("warehouses_id", type="integer", description="仓库id", required=false, default="all"),
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
     *                   "next": "http://127.0.0.1:8000/api/merchandiserdepts?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(MerchandiserDepartmentRequest $request)
    {
        $warehouses_id = $order_status = $status =  '';

        extract($request->validated());

        $order = Order::query()
            ->when($warehouses_id, function ($query) use ($warehouses_id) {

                return $query->where('warehouses_id', $warehouses_id);

            })->when(!is_null($status), function ($query) use ($status) {

                return $query->where('status', $status);

            })->when($order_status, function ($query) use ($order_status) {

                if($order_status == Order::ORDER_STATUS_CS_AUDIT){
                    return $query->whereIn('order_status', [Order::ORDER_STATUS_FD_AUDIT, Order::ORDER_STATUS_CS_AUDIT]);
                }

                return $query->where('order_status', $order_status);

            });

        return $this->response->paginator($order->paginate(self::PerPage), self::TRANSFORMER);
    }

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
     *          "logistics_id": 4,
     *          "freight_types_id": 1,
     *          "expected_freight": "10.00",
     *          "distributions_id": 1,
     *          "distribution_methods_id": 15,
     *          "deliver_goods_fee": "10.00",
     *          "move_upstairs_fee": "10.00",
     *          "installation_fee": "10.00",
     *          "total_distribution_fee": "30.00",
     *          "distribution_phone": "配送电话",
     *          "distribution_types_id": 1,
     *          "express_fee": "10.00",
     *          "warehouses_id": 1,
     *          "order_items": {
     *              {
     *                  "id": 1,
     *                  "orders_id": 2,
     *                  "products_id": 29,
     *                  "combinations_id": 14,
     *                  "quantity": 10,
     *                  "total_volume": 100,
     *                  "paint": "油漆",
     *                  "is_printing": false,
     *                  "printing_fee": "1.00",
     *                  "is_spot_goods": false,
     *                  "under_line_univalent": "10.00",
     *                  "under_line_total_amount": "100.00",
     *                  "under_line_preferential": "10.00",
     *                  "under_line_payment": "90.00",
     *                  "created_at": "2018-08-24 10:32:07",
     *                  "updated_at": "2018-08-24 10:32:07",
     *                  "combination": {
     *                      "id": 14,
     *                      "pid": 29,
     *                      "name": "cesku2",
     *                      "created_at": "2018-08-15 09:26:00",
     *                      "updated_at": "2018-08-15 09:26:00",
     *                      "quantity": 0,
     *                      "product_components": {
     *                          {
     *                              "id": 11,
     *                              "pid": 29,
     *                              "component_code": "子件编码4",
     *                              "jd_component_code": "京东子件编码",
     *                              "vips_component_code": "唯品会子件编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_common": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 10,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 12,
     *                              "bar_code": "1010",
     *                              "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro": true,
     *                              "is_stop_pro": true,
     *                              "created_at": "2018-08-14 15:08:54",
     *                              "updated_at": "2018-08-15 11:39:45",
     *                              "pivot": {
     *                                  "combinations_id": 14,
     *                                  "product_components_id": 11
     *                              },
     *                              "stocks": {
     *                                  {
     *                                      "id": 10,
     *                                      "warehouse_id": 2,
     *                                      "products_id": 29,
     *                                      "product_components_id": 11,
     *                                      "quantity": 2,
     *                                      "status": true,
     *                                      "created_at": "2018-08-13 16:39:04",
     *                                      "updated_at": "2018-08-13 16:39:04"
     *                                  }
     *                              }
     *                          },
     *                          {
     *                              "id": 18,
     *                              "pid": 33,
     *                              "component_code": "子件编码2",
     *                              "jd_component_code": "京东2",
     *                              "vips_component_code": "唯品会2",
     *                              "tb_price": "2.00",
     *                              "cost": "2.00",
     *                              "price": "2.00",
     *                              "highest_price": "2.00",
     *                              "lowest_price": "2.00",
     *                              "warehouse_cost": "2.00",
     *                              "assembly_price": "2.00",
     *                              "discount": "2.00",
     *                              "commission": "2.00",
     *                              "is_common": false,
     *                              "package_quantity": 2,
     *                              "package_costs": "2.00",
     *                              "wooden_frame_costs": "2.00",
     *                              "purchase_freight": "2.00",
     *                              "inventory_warning": 2,
     *                              "purchase_days_warning": 2,
     *                              "available_warning": 2,
     *                              "distribution_method_id": 13,
     *                              "bar_code": "条形码2",
     *                              "img_url": "/images/uploads/201808/24/1_1535076032_cd2y8JgjSo.png",
     *                              "spec": "子规格2",
     *                              "color": "红色",
     *                              "materials": "杏木",
     *                              "function": "功能test",
     *                              "special": "特殊test",
     *                              "other": "其他test",
     *                              "longness": 2,
     *                              "width": 2,
     *                              "height": 1,
     *                              "volume": 2,
     *                              "weight": 2,
     *                              "remark": "子备注2",
     *                              "finished_pro": true,
     *                              "is_stop_pro": false,
     *                              "created_at": "2018-08-24 10:00:35",
     *                              "updated_at": "2018-08-24 10:00:35",
     *                              "pivot": {
     *                                  "combinations_id": 14,
     *                                  "product_components_id": 18
     *                              },
     *                              "stocks": {
     *                                  {
     *                                      "id": 18,
     *                                      "warehouse_id": 2,
     *                                      "products_id": 30,
     *                                      "product_components_id": 18,
     *                                      "quantity": 10,
     *                                      "status": true,
     *                                      "created_at": "2018-08-15 16:25:24",
     *                                      "updated_at": "2018-08-16 11:43:51"
     *                                  }
     *                              }
     *                          }
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-08-24 10:32:07",
     *          "updated_at": "2018-08-24 11:38:00"
     *      })
     * })
     */
    public function show(Order $order)
    {
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_FD_AUDIT)
            throw new ResourceException('未财审');

        return $this->response->item($order, CargoAuditTransformer::class);
    }


    /**
     * 根据仓库获取sku库存
     *
     * @Get("/merchandiserdepts/:id/stock")
     * @Parameters({
     *      @Parameter("warehouses_id", type="integer", description="仓库id", required=true)
     * })
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "logistics_id": 4,
     *          "freight_types_id": 1,
     *          "expected_freight": "10.00",
     *          "distributions_id": 1,
     *          "distribution_methods_id": 15,
     *          "deliver_goods_fee": "10.00",
     *          "move_upstairs_fee": "10.00",
     *          "installation_fee": "10.00",
     *          "total_distribution_fee": "30.00",
     *          "distribution_phone": "配送电话",
     *          "distribution_types_id": 1,
     *          "express_fee": "10.00",
     *          "warehouses_id": 1,
     *          "order_items": {
     *              {
     *                  "id": 1,
     *                  "orders_id": 2,
     *                  "products_id": 29,
     *                  "combinations_id": 14,
     *                  "quantity": 10,
     *                  "total_volume": 100,
     *                  "paint": "油漆",
     *                  "is_printing": false,
     *                  "printing_fee": "1.00",
     *                  "is_spot_goods": false,
     *                  "under_line_univalent": "10.00",
     *                  "under_line_total_amount": "100.00",
     *                  "under_line_preferential": "10.00",
     *                  "under_line_payment": "90.00",
     *                  "created_at": "2018-08-24 10:32:07",
     *                  "updated_at": "2018-08-24 10:32:07",
     *                  "combination": {
     *                      "id": 14,
     *                      "pid": 29,
     *                      "name": "cesku2",
     *                      "created_at": "2018-08-15 09:26:00",
     *                      "updated_at": "2018-08-15 09:26:00",
     *                      "quantity": 0,
     *                      "product_components": {
     *                          {
     *                              "id": 11,
     *                              "pid": 29,
     *                              "component_code": "子件编码4",
     *                              "jd_component_code": "京东子件编码",
     *                              "vips_component_code": "唯品会子件编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_common": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 10,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 12,
     *                              "bar_code": "1010",
     *                              "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro": true,
     *                              "is_stop_pro": true,
     *                              "created_at": "2018-08-14 15:08:54",
     *                              "updated_at": "2018-08-15 11:39:45",
     *                              "pivot": {
     *                                  "combinations_id": 14,
     *                                  "product_components_id": 11
     *                              },
     *                              "stocks": {
     *                                  {
     *                                      "id": 10,
     *                                      "warehouse_id": 2,
     *                                      "products_id": 29,
     *                                      "product_components_id": 11,
     *                                      "quantity": 2,
     *                                      "status": true,
     *                                      "created_at": "2018-08-13 16:39:04",
     *                                      "updated_at": "2018-08-13 16:39:04"
     *                                  }
     *                              }
     *                          },
     *                          {
     *                              "id": 18,
     *                              "pid": 33,
     *                              "component_code": "子件编码2",
     *                              "jd_component_code": "京东2",
     *                              "vips_component_code": "唯品会2",
     *                              "tb_price": "2.00",
     *                              "cost": "2.00",
     *                              "price": "2.00",
     *                              "highest_price": "2.00",
     *                              "lowest_price": "2.00",
     *                              "warehouse_cost": "2.00",
     *                              "assembly_price": "2.00",
     *                              "discount": "2.00",
     *                              "commission": "2.00",
     *                              "is_common": false,
     *                              "package_quantity": 2,
     *                              "package_costs": "2.00",
     *                              "wooden_frame_costs": "2.00",
     *                              "purchase_freight": "2.00",
     *                              "inventory_warning": 2,
     *                              "purchase_days_warning": 2,
     *                              "available_warning": 2,
     *                              "distribution_method_id": 13,
     *                              "bar_code": "条形码2",
     *                              "img_url": "/images/uploads/201808/24/1_1535076032_cd2y8JgjSo.png",
     *                              "spec": "子规格2",
     *                              "color": "红色",
     *                              "materials": "杏木",
     *                              "function": "功能test",
     *                              "special": "特殊test",
     *                              "other": "其他test",
     *                              "longness": 2,
     *                              "width": 2,
     *                              "height": 1,
     *                              "volume": 2,
     *                              "weight": 2,
     *                              "remark": "子备注2",
     *                              "finished_pro": true,
     *                              "is_stop_pro": false,
     *                              "created_at": "2018-08-24 10:00:35",
     *                              "updated_at": "2018-08-24 10:00:35",
     *                              "pivot": {
     *                                  "combinations_id": 14,
     *                                  "product_components_id": 18
     *                              },
     *                              "stocks": {
     *                                  {
     *                                      "id": 18,
     *                                      "warehouse_id": 2,
     *                                      "products_id": 30,
     *                                      "product_components_id": 18,
     *                                      "quantity": 10,
     *                                      "status": true,
     *                                      "created_at": "2018-08-15 16:25:24",
     *                                      "updated_at": "2018-08-16 11:43:51"
     *                                  }
     *                              }
     *                          }
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-08-24 10:32:07",
     *          "updated_at": "2018-08-24 11:38:00"
     *      })
     * })
     */
    public function getStockByWarehouses(MerchandiserDepartmentRequest $merchandiserDepartmentRequest, Order $order)
    {
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_FD_AUDIT)
            throw new ResourceException('未财审');

        $order->warehouses_id = (int)$merchandiserDepartmentRequest->validated()['warehouses_id'];
        return $this->response
            ->item($order, CargoAuditTransformer::class)
            ->setStatusCode(201);
    }

    /**
     * 跟单货审
     *
     * @PUT("/merchandiserdepts/:id/cargoaudit")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("logistics_id", type="integer", description="物流id", required=false, default="all"),
     *      @Parameter("freight_types_id", type="integer", description="运费类型id", required=false, default="all"),
     *      @Parameter("expected_freight", type="numeric", description="预计运费", required=false, default="all"),
     *      @Parameter("distributions_id", type="integer", description="配送id", required=false, default="all"),
     *      @Parameter("distribution_methods_id", type="integer", description="配送方式id", required=false, default="all"),
     *      @Parameter("deliver_goods_fee", type="numeric", description="送货费用", required=false, default="all"),
     *      @Parameter("move_upstairs_fee", type="numeric", description="搬楼费用", required=false, default="all"),
     *      @Parameter("installation_fee", type="numeric", description="安装费", required=false, default="all"),
     *      @Parameter("total_distribution_fee", type="numeric", description="配送总计", required=false, default="all"),
     *      @Parameter("distribution_phone", type="string", description="配送电话", required=false, default="all"),
     *      @Parameter("distribution_types_id", type="integer", description="配送类型id", required=false, default="all"),
     *      @Parameter("express_fee", type="numeric", description="快递费用", required=false, default="all"),
     *      @Parameter("warehouses_id", type="integer", description="发货仓库id", required=false, default="all"),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单货审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={
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
     *     })
     * })
     */
    public function isCargoAudit(MerchandiserDepartmentRequest $merchandiserDepartmentRequest, Order $order)
    {
        //是否已经财审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_FD_AUDIT)
            throw new UpdateResourceFailedException('跟单货审出错');

        $this->traitUpdate($merchandiserDepartmentRequest,$order,self::TRANSFORMER);

        //货审---查询缺货情况---缺货禁止通过货审
        $order->isOOS();

        return $this->traitAction($order, false, '跟单货审出错', 'cargoAudit');
    }

}
