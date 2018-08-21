<?php

namespace App\Http\Controllers\Api;

use App\Models\PurchaseList;
use Illuminate\Support\Facades\DB;

use App\Models\Purchase;
use App\Models\PurchaseDetail;

use App\Http\Requests\Api\PurchaseRequest;
use App\Http\Requests\Api\PurchaseListRequest;
use App\Http\Requests\Api\PurchaseDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\PurchaseTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 采购单资源
 * @Resource("purchases",uri="/api")
 */
class PurchasesController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = PurchaseTransformer::class;
    const MODEL = Purchase::class;

    /**
     * 获取所有采购单
     *
     * @Get("/purchases[?status=true&include=user,purchaseLists,cancelPurchases]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false,default="all"),
     *      @Parameter("purchase_status", description="采购状态 状态分别是(new,section,finish)", required=false, default="all"),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     *       "data": {
     *          {
     *              "id": 12,
     *              "purchase_order_no": "PO2018081515073602909",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "user": {
     *                  "id": 1,
     *                  "username": "admin",
     *                  "email": "admin@23.com",
     *                  "created_at": "2018-08-18 14:57:58",
     *                  "updated_at": "2018-08-18 14:58:03"
     *              },
     *              "print_at": null,
     *              "receiver": "收货人3",
     *              "receiver_address": "收货地址3",
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": false,
     *              "is_change": false,
     *              "remark": "备注5",
     *              "status": true,
     *              "purchase_lists": {
     *                  "data": {
     *                      {
     *                          "id": 10,
     *                          "purchases_id": 12,
     *                          "combinations_id": 7,
     *                          "remark": "备注",
     *                          "created_at": "2018-08-15 15:07:36",
     *                          "updated_at": "2018-08-15 15:07:36",
     *                          "combinations": {
     *                              "id": 7,
     *                              "pid": 28,
     *                              "name": "skuName1",
     *                              "created_at": "2018-08-14 14:28:30",
     *                              "updated_at": "2018-08-14 14:28:30"
     *                          },
     *                          "purchase_details": {
     *                              {
     *                                  "id": 13,
     *                                  "purchase_lists_id": 10,
     *                                  "purchase_item_status": "新建",
     *                                  "product_components_id": 11,
     *                                  "purchase_quantity": 10,
     *                                  "stock_in_count": 0,
     *                                  "shops_id": 1,
     *                                  "suppliers_id": 1,
     *                                  "purchase_cost": "10.00",
     *                                  "purchase_freight": "10.00",
     *                                  "warehouse_cost": "10.00",
     *                                  "commission": "10.00",
     *                                  "discount": "10.00",
     *                                  "wooden_frame_costs": "1.00",
     *                                  "arrival_time": "2018-06-10 00:00:00",
     *                                  "remark": "备注10",
     *                                  "created_at": "2018-08-15 15:07:37",
     *                                  "updated_at": "2018-08-15 15:07:37",
     *                                  "product_component": {
     *                                      "id": 11,
     *                                      "pid": 29,
     *                                      "component_code": "子件编码4",
     *                                      "jd_component_code": "京东子件编码",
     *                                      "vips_component_code": "唯品会子件编码",
     *                                      "tb_price": "10.00",
     *                                      "cost": "10.00",
     *                                      "price": "10.00",
     *                                      "highest_price": "10.00",
     *                                      "lowest_price": "10.00",
     *                                      "warehouse_cost": "10.00",
     *                                      "assembly_price": "10.00",
     *                                      "discount": "1.00",
     *                                      "commission": "1.00",
     *                                      "is_common": true,
     *                                      "package_quantity": 10,
     *                                      "package_costs": "10.00",
     *                                      "wooden_frame_costs": "10.00",
     *                                      "purchase_freight": "10.00",
     *                                      "inventory_warning": 10,
     *                                      "purchase_days_warning": 10,
     *                                      "available_warning": 10,
     *                                      "distribution_method_id": 12,
     *                                      "bar_code": "1010",
     *                                      "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
     *                                      "spec": "规格",
     *                                      "color": "颜色",
     *                                      "materials": "材质",
     *                                      "function": "功能",
     *                                      "special": "特殊",
     *                                      "other": "其他",
     *                                      "longness": 10,
     *                                      "width": 10,
     *                                      "height": 10,
     *                                      "volume": 10,
     *                                      "weight": 10,
     *                                      "remark": "备注",
     *                                      "finished_pro": true,
     *                                      "is_stop_pro": true,
     *                                      "created_at": "2018-08-14 15:08:54",
     *                                      "updated_at": "2018-08-15 11:39:45"
     *                                  }
     *                              }
     *                          }
     *                      }
     *                  }
     *              },
     *          }
     *      },
     *      "meta": {
     *          "pagination": {
     *              "total": 1,
     *              "count": 1,
     *              "per_page": 10,
     *              "current_page": 1,
     *              "total_pages": 1,
     *              "links": {
     *                  "previous": null,
     *                  "next": "http://127.0.0.1:8000/api/purchases?page=1"
     *              }
     *          }
     *      }
     * })
     */
    public function index(PurchaseRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增采购单
     *
     * @Post("/purchases")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("receiver", description="收货人", required=true),
     *      @Parameter("receiver_address", description="收货地址", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status", type="boolean", description="状态(false:停用,true:启用)", required=false,default=true),
     *      @Parameter("purchase_lists[0][combinations_id]", type="integer", description="组合id", required=true),
     *      @Parameter("purchase_lists[0][remark]", description="备注", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][product_components_id]", type="integer", description="子件id", required=true),
     *      @Parameter("purchase_lists[0][purchase_details][0][purchase_quantity]", type="integer", description="采购数", required=true),
     *      @Parameter("purchase_lists[0][purchase_details][0][shops_id]", type="integer", description="采购店铺id", required=true),
     *      @Parameter("purchase_lists[0][purchase_details][0][suppliers_id]", type="integer", description="供应商id", required=true),
     *      @Parameter("purchase_lists[0][purchase_details][0][purchase_cost]", type="numeric", description="采购成本", required=true),
     *      @Parameter("purchase_lists[0][purchase_details][0][purchase_freight]", type="numeric", description="采购运费", required=true),
     *      @Parameter("purchase_lists[0][purchase_details][0][warehouse_cost]", type="numeric", description="仓库成本", required=true),
     *      @Parameter("purchase_lists[0][purchase_details][0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][arrival_time]", type="dateTime", description="到货时间", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "receiver": "收货人",
     *          "receiver_address": "收货地址",
     *          "remark": "备注",
     *          "status": true,
     *          "purchase_lists[0][combinations_id]":9,
     *          "purchase_lists[0][remark]":"备注",
     *          "purchase_lists[0][purchase_details][0][product_components_id]":10,
     *          "purchase_lists[0][purchase_details][0][purchase_quantity]":10,
     *          "purchase_lists[0][purchase_details][0][shops_id]":1,
     *          "purchase_lists[0][purchase_details][0][suppliers_id]":1,
     *          "purchase_lists[0][purchase_details][0][purchase_cost]":10,
     *          "purchase_lists[0][purchase_details][0][purchase_freight]":10,
     *          "purchase_lists[0][purchase_details][0][warehouse_cost]":10,
     *          "purchase_lists[0][purchase_details][0][commission]":10,
     *          "purchase_lists[0][purchase_details][0][discount]":10,
     *          "purchase_lists[0][purchase_details][0][wooden_frame_costs]":10,
     *          "purchase_lists[0][purchase_details][0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_lists[0][purchase_details][0][remark]":"备注",
     *          "purchase_lists[0][purchase_details][0][product_components_id]":11,
     *          "purchase_lists[0][purchase_details][0][purchase_quantity]":10,
     *          "purchase_lists[0][purchase_details][0][shops_id]":1,
     *          "purchase_lists[0][purchase_details][0][suppliers_id]":1,
     *          "purchase_lists[0][purchase_details][0][purchase_cost]":10,
     *          "purchase_lists[0][purchase_details][0][purchase_freight]":10,
     *          "purchase_lists[0][purchase_details][0][warehouse_cost]":10,
     *          "purchase_lists[0][purchase_details][0][commission]":10,
     *          "purchase_lists[0][purchase_details][0][discount]":10,
     *          "purchase_lists[0][purchase_details][0][wooden_frame_costs]":10,
     *          "purchase_lists[0][purchase_details][0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_lists[0][purchase_details][0][remark]":"备注",
     *      }
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "receiver": {
     *                  "收货人必填"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *              "id": 12,
     *              "purchase_order_no": "PO2018081515073602909",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "user": {
     *                  "id": 1,
     *                  "username": "admin",
     *                  "email": "admin@23.com",
     *                  "created_at": "2018-08-18 14:57:58",
     *                  "updated_at": "2018-08-18 14:58:03"
     *              },
     *              "print_at": null,
     *              "receiver": "收货人3",
     *              "receiver_address": "收货地址3",
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": false,
     *              "is_change": false,
     *              "remark": "备注5",
     *              "status": true,
     *              "purchase_lists": {
     *                  "data": {
     *                      {
     *                          "id": 10,
     *                          "purchases_id": 12,
     *                          "combinations_id": 7,
     *                          "remark": "备注",
     *                          "created_at": "2018-08-15 15:07:36",
     *                          "updated_at": "2018-08-15 15:07:36",
     *                          "combinations": {
     *                              "id": 7,
     *                              "pid": 28,
     *                              "name": "skuName1",
     *                              "created_at": "2018-08-14 14:28:30",
     *                              "updated_at": "2018-08-14 14:28:30"
     *                          },
     *                          "purchase_details": {
     *                              {
     *                                  "id": 13,
     *                                  "purchase_lists_id": 10,
     *                                  "purchase_item_status": "新建",
     *                                  "product_components_id": 11,
     *                                  "purchase_quantity": 10,
     *                                  "stock_in_count": 0,
     *                                  "shops_id": 1,
     *                                  "suppliers_id": 1,
     *                                  "purchase_cost": "10.00",
     *                                  "purchase_freight": "10.00",
     *                                  "warehouse_cost": "10.00",
     *                                  "commission": "10.00",
     *                                  "discount": "10.00",
     *                                  "wooden_frame_costs": "1.00",
     *                                  "arrival_time": "2018-06-10 00:00:00",
     *                                  "remark": "备注10",
     *                                  "created_at": "2018-08-15 15:07:37",
     *                                  "updated_at": "2018-08-15 15:07:37",
     *                                  "product_component": {
     *                                      "id": 11,
     *                                      "pid": 29,
     *                                      "component_code": "子件编码4",
     *                                      "jd_component_code": "京东子件编码",
     *                                      "vips_component_code": "唯品会子件编码",
     *                                      "tb_price": "10.00",
     *                                      "cost": "10.00",
     *                                      "price": "10.00",
     *                                      "highest_price": "10.00",
     *                                      "lowest_price": "10.00",
     *                                      "warehouse_cost": "10.00",
     *                                      "assembly_price": "10.00",
     *                                      "discount": "1.00",
     *                                      "commission": "1.00",
     *                                      "is_common": true,
     *                                      "package_quantity": 10,
     *                                      "package_costs": "10.00",
     *                                      "wooden_frame_costs": "10.00",
     *                                      "purchase_freight": "10.00",
     *                                      "inventory_warning": 10,
     *                                      "purchase_days_warning": 10,
     *                                      "available_warning": 10,
     *                                      "distribution_method_id": 12,
     *                                      "bar_code": "1010",
     *                                      "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
     *                                      "spec": "规格",
     *                                      "color": "颜色",
     *                                      "materials": "材质",
     *                                      "function": "功能",
     *                                      "special": "特殊",
     *                                      "other": "其他",
     *                                      "longness": 10,
     *                                      "width": 10,
     *                                      "height": 10,
     *                                      "volume": 10,
     *                                      "weight": 10,
     *                                      "remark": "备注",
     *                                      "finished_pro": true,
     *                                      "is_stop_pro": true,
     *                                      "created_at": "2018-08-14 15:08:54",
     *                                      "updated_at": "2018-08-15 11:39:45"
     *                                  }
     *                              }
     *                          }
     *                      }
     *                  }
     *              },
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(PurchaseRequest $purchaseRequest,
                          PurchaseListRequest $purchaseListRequest,
                          PurchaseDetailRequest $purchaseDetailRequest,
                          \App\Handlers\ValidatedHandler $validatedHandler)
    {
        $purchase = DB::transaction(function () use ($purchaseRequest, $purchaseListRequest, $purchaseDetailRequest, $validatedHandler) {

            $purchase = Purchase::create($purchaseRequest->validated());

            if ($purchaseLists = $purchaseRequest->input('purchase_lists')) {

                foreach ($purchaseLists as $purchaseList) {

                    $purchaseListModel = $purchase->purchaseLists()->create(
                        $validatedHandler->getValidatedData($purchaseListRequest->rules(), $purchaseList)
                    );

                    if ($purchaseDetails = $purchaseList['purchase_details'] ?? null) {
                        foreach ($purchaseDetails as $purchaseDetail) {
                            $purchaseListModel->purchaseDetails()->create(
                                $validatedHandler->getValidatedData($purchaseDetailRequest->rules(), $purchaseDetail)
                            );
                        }
                    }

                }
            }
            return $purchase->id;
        });
        //从新获取存入的数据去除有些的null数据，方便前端判断
        $purchase = Purchase::find($purchase);

        return $this->response
            ->item($purchase, new PurchaseTransformer())
            ->setStatusCode(201)
            ->addMeta('status_code', '201');
    }

    /**
     * 显示单条采购单
     *
     * @Get("/purchases/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *              "id": 12,
     *              "purchase_order_no": "PO2018081515073602909",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "user": {
     *                  "id": 1,
     *                  "username": "admin",
     *                  "email": "admin@23.com",
     *                  "created_at": "2018-08-18 14:57:58",
     *                  "updated_at": "2018-08-18 14:58:03"
     *              },
     *              "print_at": null,
     *              "receiver": "收货人3",
     *              "receiver_address": "收货地址3",
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": false,
     *              "is_change": false,
     *              "remark": "备注5",
     *              "status": true,
     *              "purchase_lists": {
     *                  "data": {
     *                      {
     *                          "id": 10,
     *                          "purchases_id": 12,
     *                          "combinations_id": 7,
     *                          "remark": "备注",
     *                          "created_at": "2018-08-15 15:07:36",
     *                          "updated_at": "2018-08-15 15:07:36",
     *                          "combinations": {
     *                              "id": 7,
     *                              "pid": 28,
     *                              "name": "skuName1",
     *                              "created_at": "2018-08-14 14:28:30",
     *                              "updated_at": "2018-08-14 14:28:30"
     *                          },
     *                          "purchase_details": {
     *                              {
     *                                  "id": 13,
     *                                  "purchase_lists_id": 10,
     *                                  "purchase_item_status": "新建",
     *                                  "product_components_id": 11,
     *                                  "purchase_quantity": 10,
     *                                  "stock_in_count": 0,
     *                                  "shops_id": 1,
     *                                  "suppliers_id": 1,
     *                                  "purchase_cost": "10.00",
     *                                  "purchase_freight": "10.00",
     *                                  "warehouse_cost": "10.00",
     *                                  "commission": "10.00",
     *                                  "discount": "10.00",
     *                                  "wooden_frame_costs": "1.00",
     *                                  "arrival_time": "2018-06-10 00:00:00",
     *                                  "remark": "备注10",
     *                                  "created_at": "2018-08-15 15:07:37",
     *                                  "updated_at": "2018-08-15 15:07:37",
     *                                  "product_component": {
     *                                      "id": 11,
     *                                      "pid": 29,
     *                                      "component_code": "子件编码4",
     *                                      "jd_component_code": "京东子件编码",
     *                                      "vips_component_code": "唯品会子件编码",
     *                                      "tb_price": "10.00",
     *                                      "cost": "10.00",
     *                                      "price": "10.00",
     *                                      "highest_price": "10.00",
     *                                      "lowest_price": "10.00",
     *                                      "warehouse_cost": "10.00",
     *                                      "assembly_price": "10.00",
     *                                      "discount": "1.00",
     *                                      "commission": "1.00",
     *                                      "is_common": true,
     *                                      "package_quantity": 10,
     *                                      "package_costs": "10.00",
     *                                      "wooden_frame_costs": "10.00",
     *                                      "purchase_freight": "10.00",
     *                                      "inventory_warning": 10,
     *                                      "purchase_days_warning": 10,
     *                                      "available_warning": 10,
     *                                      "distribution_method_id": 12,
     *                                      "bar_code": "1010",
     *                                      "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
     *                                      "spec": "规格",
     *                                      "color": "颜色",
     *                                      "materials": "材质",
     *                                      "function": "功能",
     *                                      "special": "特殊",
     *                                      "other": "其他",
     *                                      "longness": 10,
     *                                      "width": 10,
     *                                      "height": 10,
     *                                      "volume": 10,
     *                                      "weight": 10,
     *                                      "remark": "备注",
     *                                      "finished_pro": true,
     *                                      "is_stop_pro": true,
     *                                      "created_at": "2018-08-14 15:08:54",
     *                                      "updated_at": "2018-08-15 11:39:45"
     *                                  }
     *                              }
     *                          }
     *                      }
     *                  }
     *              },
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改采购单
     *
     * @Patch("/purchases/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("receiver", description="收货人", required=false),
     *      @Parameter("receiver_address", description="收货地址", required=false),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status", type="boolean", description="状态(false:停用,true:启用)", required=false,default=false),
     *      @Parameter("purchase_lists[0][id]", type="integer", description="采购清单id", required=false),
     *      @Parameter("purchase_lists[0][combinations_id]", type="integer", description="组合id", required=false),
     *      @Parameter("purchase_lists[0][remark]", description="备注", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][id]", type="integer", description="采购详情id", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][product_components_id]", type="integer", description="子件id", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][purchase_quantity]", type="integer", description="采购数", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][shops_id]", type="integer", description="采购店铺id", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][suppliers_id]", type="integer", description="供应商id", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][purchase_cost]", type="numeric", description="采购成本", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][purchase_freight]", type="numeric", description="采购运费", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][warehouse_cost]", type="numeric", description="仓库成本", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][arrival_time]", type="dateTime", description="到货时间", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "receiver": "收货人",
     *          "receiver_address": "收货地址",
     *          "remark": "备注",
     *          "status": true,
     *          "purchase_lists[0][id]":4,
     *          "purchase_lists[0][combinations_id]":9,
     *          "purchase_lists[0][remark]":"备注",
     *          "purchase_lists[0][purchase_details][0][id]":5,
     *          "purchase_lists[0][purchase_details][0][product_components_id]":10,
     *          "purchase_lists[0][purchase_details][0][purchase_quantity]":10,
     *          "purchase_lists[0][purchase_details][0][shops_id]":1,
     *          "purchase_lists[0][purchase_details][0][suppliers_id]":1,
     *          "purchase_lists[0][purchase_details][0][purchase_cost]":10,
     *          "purchase_lists[0][purchase_details][0][purchase_freight]":10,
     *          "purchase_lists[0][purchase_details][0][warehouse_cost]":10,
     *          "purchase_lists[0][purchase_details][0][commission]":10,
     *          "purchase_lists[0][purchase_details][0][discount]":10,
     *          "purchase_lists[0][purchase_details][0][wooden_frame_costs]":10,
     *          "purchase_lists[0][purchase_details][0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_lists[0][purchase_details][0][remark]":"备注",
     *          "purchase_lists[0][purchase_details][0][product_components_id]":11,
     *          "purchase_lists[0][purchase_details][0][purchase_quantity]":10,
     *          "purchase_lists[0][purchase_details][0][shops_id]":1,
     *          "purchase_lists[0][purchase_details][0][suppliers_id]":1,
     *          "purchase_lists[0][purchase_details][0][purchase_cost]":10,
     *          "purchase_lists[0][purchase_details][0][purchase_freight]":10,
     *          "purchase_lists[0][purchase_details][0][warehouse_cost]":10,
     *          "purchase_lists[0][purchase_details][0][commission]":10,
     *          "purchase_lists[0][purchase_details][0][discount]":10,
     *          "purchase_lists[0][purchase_details][0][wooden_frame_costs]":10,
     *          "purchase_lists[0][purchase_details][0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_lists[0][purchase_details][0][remark]":"备注",
     *      }
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "receiver": {
     *                  "收货人必须string类型"
     *               },
     *              "receiver_address": {
     *                  "收货地址必填"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *              "id": 12,
     *              "purchase_order_no": "PO2018081515073602909",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "user": {
     *                  "id": 1,
     *                  "username": "admin",
     *                  "email": "admin@23.com",
     *                  "created_at": "2018-08-18 14:57:58",
     *                  "updated_at": "2018-08-18 14:58:03"
     *              },
     *              "print_at": null,
     *              "receiver": "收货人3",
     *              "receiver_address": "收货地址3",
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": false,
     *              "is_change": false,
     *              "remark": "备注5",
     *              "status": true,
     *              "purchase_lists": {
     *                  "data": {
     *                      {
     *                          "id": 10,
     *                          "purchases_id": 12,
     *                          "combinations_id": 7,
     *                          "remark": "备注",
     *                          "created_at": "2018-08-15 15:07:36",
     *                          "updated_at": "2018-08-15 15:07:36",
     *                          "combinations": {
     *                              "id": 7,
     *                              "pid": 28,
     *                              "name": "skuName1",
     *                              "created_at": "2018-08-14 14:28:30",
     *                              "updated_at": "2018-08-14 14:28:30"
     *                          },
     *                          "purchase_details": {
     *                              {
     *                                  "id": 13,
     *                                  "purchase_lists_id": 10,
     *                                  "purchase_item_status": "新建",
     *                                  "product_components_id": 11,
     *                                  "purchase_quantity": 10,
     *                                  "stock_in_count": 0,
     *                                  "shops_id": 1,
     *                                  "suppliers_id": 1,
     *                                  "purchase_cost": "10.00",
     *                                  "purchase_freight": "10.00",
     *                                  "warehouse_cost": "10.00",
     *                                  "commission": "10.00",
     *                                  "discount": "10.00",
     *                                  "wooden_frame_costs": "1.00",
     *                                  "arrival_time": "2018-06-10 00:00:00",
     *                                  "remark": "备注10",
     *                                  "created_at": "2018-08-15 15:07:37",
     *                                  "updated_at": "2018-08-15 15:07:37",
     *                                  "product_component": {
     *                                      "id": 11,
     *                                      "pid": 29,
     *                                      "component_code": "子件编码4",
     *                                      "jd_component_code": "京东子件编码",
     *                                      "vips_component_code": "唯品会子件编码",
     *                                      "tb_price": "10.00",
     *                                      "cost": "10.00",
     *                                      "price": "10.00",
     *                                      "highest_price": "10.00",
     *                                      "lowest_price": "10.00",
     *                                      "warehouse_cost": "10.00",
     *                                      "assembly_price": "10.00",
     *                                      "discount": "1.00",
     *                                      "commission": "1.00",
     *                                      "is_common": true,
     *                                      "package_quantity": 10,
     *                                      "package_costs": "10.00",
     *                                      "wooden_frame_costs": "10.00",
     *                                      "purchase_freight": "10.00",
     *                                      "inventory_warning": 10,
     *                                      "purchase_days_warning": 10,
     *                                      "available_warning": 10,
     *                                      "distribution_method_id": 12,
     *                                      "bar_code": "1010",
     *                                      "img_url": "/images/uploads/201808/15/1_1534304380_nWo7tqoZ2T.jpg",
     *                                      "spec": "规格",
     *                                      "color": "颜色",
     *                                      "materials": "材质",
     *                                      "function": "功能",
     *                                      "special": "特殊",
     *                                      "other": "其他",
     *                                      "longness": 10,
     *                                      "width": 10,
     *                                      "height": 10,
     *                                      "volume": 10,
     *                                      "weight": 10,
     *                                      "remark": "备注",
     *                                      "finished_pro": true,
     *                                      "is_stop_pro": true,
     *                                      "created_at": "2018-08-14 15:08:54",
     *                                      "updated_at": "2018-08-15 11:39:45"
     *                                  }
     *                              }
     *                          }
     *                      }
     *                  }
     *              },
     *      })
     * })
     */
    public function update(PurchaseRequest $purchaseRequest,
                           PurchaseListRequest $purchaseListRequest,
                           PurchaseDetailRequest $purchaseDetailRequest,
                           Purchase $purchase,
                           \App\Handlers\ValidatedHandler $validatedHandler)
    {
        //判断是否提交
        if ($purchase->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $purchase = DB::transaction(function () use ($purchaseRequest,
                                                     $purchaseListRequest,
                                                     $purchaseDetailRequest,
                                                     $purchase,
                                                     $validatedHandler) {

            $purchase->update($purchaseRequest->validated());

            if ($purchaseLists = $purchaseRequest->input('purchase_lists')) {

                foreach ($purchaseLists as $purchaseList) {
                    //过滤出经过验证的数据
                    $data = $validatedHandler->getValidatedData($purchaseListRequest->rules(), $purchaseList);
                    //存在id则更新，否则插入
                    if (isset($purchaseList['id'])) {
                        $purchase->purchaseLists()->findOrFail($purchaseList['id'])->update($data);

                        if ($purchaseDetails = $purchaseList['purchase_details'] ?? null) {
                            foreach ($purchaseDetails as $purchaseDetail) {
                                $purchaseDetailData = $validatedHandler->getValidatedData(
                                    $purchaseDetailRequest->rules(), $purchaseDetail
                                );

                                //存在id则更新，否则插入
                                if (isset($purchaseDetail['id'])) {
                                    $purchase->purchaseLists()->findOrFail($purchaseList['id'])
                                        ->purchaseDetails()->findOrFail($purchaseDetail['id'])
                                        ->update($purchaseDetailData);
                                } else {
                                    $purchase->purchaseLists()->findOrFail($purchaseList['id'])
                                        ->purchaseDetails()->create($purchaseDetailData);
                                }
                            }
                        }
                    } else {
                        $purchaseListModel = $purchase->purchaseLists()->create($data);
                        if ($purchaseDetails = $purchaseList['purchase_details'] ?? null) {
                            foreach ($purchaseDetails as $purchaseDetail) {
                                $purchaseListModel->purchaseDetails()->create(
                                    $validatedHandler->getValidatedData($purchaseDetailRequest->rules(), $purchaseDetail)
                                );
                            }
                        }
                    }
                }
            }
            return $purchase;
        });

        return $this->response
            ->item($purchase, new PurchaseTransformer())
            ->setStatusCode(201);
    }

    /**
     * 删除采购单
     *
     * @Delete("/purchases/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Purchase $purchase)
    {
        DB::transaction(function () use ($purchase) {
            //删除规格
            $purchaseLists = $purchase->purchaseLists();
            $delPurDet = PurchaseDetail::whereIn('purchase_lists_id', $purchaseLists->pluck('id')->toArray())->delete();

            //删除列表
            $purchaseLists = $purchaseLists->delete();

            //删除采购单
            $purchase = $purchase->delete();

            if ($delPurDet === false || $purchaseLists === false || $purchase == false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 删除一组采购单
     *
     * @Delete("/purchases")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购单id组 格式: 1,2,3,4 ", required=true)})
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
        $ids = explode(',', $request->input('ids'));

        DB::transaction(function () use ($ids) {

            //删除
            $purchaseList = PurchaseList::whereIn('purchases_id', $ids);
            $purchaseDetail = PurchaseDetail::whereIn('purchase_lists_id', $purchaseList->pluck('id')->toArray())->delete();

            //删除采购单详情
            $purchaseList = $purchaseList->delete();

            //删除采购单
            $purchase = Purchase::destroy($ids);

            if ($purchaseDetail === false || $purchaseList === false || $purchase === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 更改一组采购单状态
     *
     * @PUT("/purchases/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="采购单id组 格式: 1,2,3,4 ", required=true),
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
     * 提交
     *
     * @PUT("/purchases/:id/submit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无需重复提交",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isSubmit(Purchase $purchase)
    {
        return $this->traitAction($purchase, !$purchase->status || $purchase->is_submit, '无需重复提交', 'input');
    }

    /**
     * 打印
     *
     * @PUT("/purchases/:id/print")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "打印出错，是否未提交未审核或重复打印",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isPrint(Purchase $purchase)
    {
        return $this->traitAction($purchase, !$purchase->status || !$purchase->is_submit || !$purchase->is_audit || $purchase->is_print, '打印出错，是否未提交未审核或重复打印', 'print');
    }

    /**
     * 审核
     *
     * @PUT("/purchases/:id/audit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "审核出错，是否未提交或重复审核",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isAudit(Purchase $purchase)
    {
        return $this->traitAction($purchase, !$purchase->status || !$purchase->is_submit || $purchase->is_audit, '审核出错，是否未提交或重复审核', 'audit');
    }

}
