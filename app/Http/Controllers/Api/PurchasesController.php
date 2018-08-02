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
     * @Get("/purchases{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all"),
     *      @Parameter("purchase_status", description="采购状态 状态分别是(new,section,finish)", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 49,
     *          "purchase_order_no": "PO2018080209522019409",
     *          "purchase_status": "新建",
     *          "order_no": "",
     *          "user_id": 1,
     *          "print_at": null,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": 1,
     *          "promise_ship_time": null,
     *          "business_personnel": "",
     *          "source": "",
     *          "client_name": "",
     *          "buyer_nick": "",
     *          "order_address": "",
     *          "is_submit": 0,
     *          "is_print": 0,
     *          "is_audit": 0,
     *          "is_change": 0,
     *          "remark": "备注5",
     *          "status": 1,
     *          "created_at": "2018-08-02 09:52:20"
     *      },
     *      {
     *          "id": 50,
     *          "purchase_order_no": "PO2018080209561891369",
     *          "purchase_status": "新建",
     *          "order_no": "",
     *          "user_id": 1,
     *          "print_at": null,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": 1,
     *          "promise_ship_time": null,
     *          "business_personnel": "",
     *          "source": "",
     *          "client_name": "",
     *          "buyer_nick": "",
     *          "order_address": "",
     *          "is_submit": 0,
     *          "is_print": 0,
     *          "is_audit": 0,
     *          "is_change": 0,
     *          "remark": "备注5",
     *          "status": 1,
     *          "created_at": "2018-08-02 09:56:18"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 1,
     *             "count": 1,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
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
     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status", type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     *      @Parameter("purchase_lists[0][product_specs_id]", type="integer", description="产品规格id", required=true),
     *      @Parameter("purchase_lists[0][purchase_quantity]", type="integer", description="采购数", required=true),
     *      @Parameter("purchase_lists[0][shops_id]", type="integer", description="采购店铺id", required=true),
     *      @Parameter("purchase_lists[0][suppliers_id]", type="integer", description="供应商id", required=true),
     *      @Parameter("purchase_lists[0][purchase_cost]", type="numeric", description="采购成本", required=true),
     *      @Parameter("purchase_lists[0][purchase_freight]", type="numeric", description="采购运费", required=true),
     *      @Parameter("purchase_lists[0][warehouse_cost]", type="numeric", description="仓库成本", required=true),
     *      @Parameter("purchase_lists[0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("purchase_lists[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("purchase_lists[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("purchase_lists[0][arrival_time]", type="dateTime", description="到货时间", required=false),
     *      @Parameter("purchase_lists[0][remark]", description="备注", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][product_specs_id]", type="integer", description="产品规格id", required=true),
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
     *          "warehouse_id": "1",
     *          "remark": "备注",
     *          "status": "1",
     *          "purchase_lists[0][product_specs_id]":9,
     *          "purchase_lists[0][purchase_quantity]":10,
     *          "purchase_lists[0][shops_id]":1,
     *          "purchase_lists[0][suppliers_id]":1,
     *          "purchase_lists[0][purchase_cost]":10,
     *          "purchase_lists[0][purchase_freight]":10,
     *          "purchase_lists[0][warehouse_cost]":10,
     *          "purchase_lists[0][commission]":10,
     *          "purchase_lists[0][discount]":10,
     *          "purchase_lists[0][wooden_frame_costs]":10,
     *          "purchase_lists[0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_lists[0][remark]":"备注",
     *          "purchase_lists[0][purchase_details][0][product_specs_id]":10,
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
     *          "purchase_lists[0][purchase_details][0][product_specs_id]":11,
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
     *          "id": 66,
     *          "purchase_order_no": "PO2018080216025968866",
     *          "purchase_status": "新建",
     *          "order_no": null,
     *          "user_id": 1,
     *          "print_at": null,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": "1",
     *          "promise_ship_time": null,
     *          "business_personnel": null,
     *          "source": null,
     *          "client_name": null,
     *          "buyer_nick": null,
     *          "order_address": null,
     *          "is_submit": null,
     *          "is_print": null,
     *          "is_audit": null,
     *          "is_change": null,
     *          "remark": "备注5",
     *          "status": "1",
     *          "created_at": "2018-08-02 16:02:59",
     *          "purchase_lists": {
     *              {
     *                  "id": 64,
     *                  "product_specs_id": 9,
     *                  "product_specs_spec_code": "321",
     *                  "product_specs_spec": "32gsdgsa",
     *                  "goods_short_name": "商品简称",
     *                  "goods_commodity_code": "商品编码1",
     *                  "suppliers_id": 1,
     *                  "suppliers_name": "供应商1",
     *                  "shops_id": 1,
     *                  "shop_title": "店铺标题",
     *                  "purchase_quantity": 10,
     *                  "purchase_cost": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "commission": "10.00",
     *                  "discount": "10.00",
     *                  "wooden_frame_costs": "1.00",
     *                  "arrival_time": "2018-06-10 00:00:00",
     *                  "remark": "备注",
     *                  "purchase_details": {
     *                      {
     *                          "id": 73,
     *                          "product_specs_id": 10,
     *                          "product_specs_spec_code": "1ca",
     *                          "product_specs_spec": "32",
     *                          "goods_short_name": "商品简称",
     *                          "goods_commodity_code": "商品编码10",
     *                          "suppliers_id": 1,
     *                          "suppliers_name": "供应商1",
     *                          "shops_id": 1,
     *                          "shop_title": "店铺标题",
     *                          "purchase_quantity": 10,
     *                          "purchase_cost": "10.00",
     *                          "purchase_freight": "10.00",
     *                          "warehouse_cost": "10.00",
     *                          "commission": "10.00",
     *                          "discount": "10.00",
     *                          "wooden_frame_costs": "1.00",
     *                          "arrival_time": "2018-06-10 00:00:00",
     *                          "remark": "备注"
     *                      },
     *                      {
     *                          "id": 74,
     *                          "product_specs_id": 11,
     *                          "product_specs_spec_code": "cccc",
     *                          "product_specs_spec": "32",
     *                          "goods_short_name": "321",
     *                          "goods_commodity_code": "21",
     *                          "suppliers_id": 1,
     *                          "suppliers_name": "供应商1",
     *                          "shops_id": 1,
     *                          "shop_title": "店铺标题",
     *                          "purchase_quantity": 10,
     *                          "purchase_cost": "10.00",
     *                          "purchase_freight": "10.00",
     *                          "warehouse_cost": "10.00",
     *                          "commission": "10.00",
     *                          "discount": "10.00",
     *                          "wooden_frame_costs": "1.00",
     *                          "arrival_time": "2018-06-10 00:00:00",
     *                          "remark": "备注"
     *                      }
     *                  }
     *              }
     *          },
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
            return $purchase;
        });

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
     *          "id": 66,
     *          "purchase_order_no": "PO2018080216025968866",
     *          "purchase_status": "新建",
     *          "order_no": "",
     *          "user_id": 1,
     *          "print_at": null,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": 1,
     *          "promise_ship_time": null,
     *          "business_personnel": "",
     *          "source": "",
     *          "client_name": "",
     *          "buyer_nick": "",
     *          "order_address": "",
     *          "is_submit": 0,
     *          "is_print": 0,
     *          "is_audit": 0,
     *          "is_change": 0,
     *          "remark": "备注5",
     *          "status": 1,
     *          "created_at": "2018-08-02 16:02:59",
     *          "purchase_lists": {
     *              {
     *                  "id": 64,
     *                  "product_specs_id": 9,
     *                  "product_specs_spec_code": "321",
     *                  "product_specs_spec": "32gsdgsa",
     *                  "goods_short_name": "商品简称",
     *                  "goods_commodity_code": "商品编码1",
     *                  "suppliers_id": 1,
     *                  "suppliers_name": "供应商1",
     *                  "shops_id": 1,
     *                  "shop_title": "店铺标题",
     *                  "purchase_quantity": 10,
     *                  "purchase_cost": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "commission": "10.00",
     *                  "discount": "10.00",
     *                  "wooden_frame_costs": "1.00",
     *                  "arrival_time": "2018-06-10 00:00:00",
     *                  "remark": "备注",
     *                  "purchase_details": {
     *                      {
     *                          "id": 73,
     *                          "product_specs_id": 10,
     *                          "product_specs_spec_code": "1ca",
     *                          "product_specs_spec": "32",
     *                          "goods_short_name": "商品简称",
     *                          "goods_commodity_code": "商品编码10",
     *                          "suppliers_id": 1,
     *                          "suppliers_name": "供应商1",
     *                          "shops_id": 1,
     *                          "shop_title": "店铺标题",
     *                          "purchase_quantity": 10,
     *                          "purchase_cost": "10.00",
     *                          "purchase_freight": "10.00",
     *                          "warehouse_cost": "10.00",
     *                          "commission": "10.00",
     *                          "discount": "10.00",
     *                          "wooden_frame_costs": "1.00",
     *                          "arrival_time": "2018-06-10 00:00:00",
     *                          "remark": "备注"
     *                      },
     *                      {
     *                          "id": 74,
     *                          "product_specs_id": 11,
     *                          "product_specs_spec_code": "cccc",
     *                          "product_specs_spec": "32",
     *                          "goods_short_name": "321",
     *                          "goods_commodity_code": "21",
     *                          "suppliers_id": 1,
     *                          "suppliers_name": "供应商1",
     *                          "shops_id": 1,
     *                          "shop_title": "店铺标题",
     *                          "purchase_quantity": 10,
     *                          "purchase_cost": "10.00",
     *                          "purchase_freight": "10.00",
     *                          "warehouse_cost": "10.00",
     *                          "commission": "10.00",
     *                          "discount": "10.00",
     *                          "wooden_frame_costs": "1.00",
     *                          "arrival_time": "2018-06-10 00:00:00",
     *                          "remark": "备注"
     *                      }
     *                  }
     *              }
     *          }
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
     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=false),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status", type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     *      @Parameter("purchase_lists[0][id]", type="integer", description="采购清单id", required=false),
     *      @Parameter("purchase_lists[0][product_specs_id]", type="integer", description="产品规格id", required=false),
     *      @Parameter("purchase_lists[0][purchase_quantity]", type="integer", description="采购数", required=false),
     *      @Parameter("purchase_lists[0][shops_id]", type="integer", description="采购店铺id", required=false),
     *      @Parameter("purchase_lists[0][suppliers_id]", type="integer", description="供应商id", required=false),
     *      @Parameter("purchase_lists[0][purchase_cost]", type="numeric", description="采购成本", required=false),
     *      @Parameter("purchase_lists[0][purchase_freight]", type="numeric", description="采购运费", required=false),
     *      @Parameter("purchase_lists[0][warehouse_cost]", type="numeric", description="仓库成本", required=false),
     *      @Parameter("purchase_lists[0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("purchase_lists[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("purchase_lists[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("purchase_lists[0][arrival_time]", type="dateTime", description="到货时间", required=false),
     *      @Parameter("purchase_lists[0][remark]", description="备注", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][id]", type="integer", description="采购明细id", required=false),
     *      @Parameter("purchase_lists[0][purchase_details][0][product_specs_id]", type="integer", description="产品规格id", required=false),
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
     *          "warehouse_id": "1",
     *          "remark": "备注",
     *          "status": "1",
     *          "purchase_lists[0][product_specs_id]":9,
     *          "purchase_lists[0][purchase_quantity]":10,
     *          "purchase_lists[0][shops_id]":1,
     *          "purchase_lists[0][suppliers_id]":1,
     *          "purchase_lists[0][purchase_cost]":10,
     *          "purchase_lists[0][purchase_freight]":10,
     *          "purchase_lists[0][warehouse_cost]":10,
     *          "purchase_lists[0][commission]":10,
     *          "purchase_lists[0][discount]":10,
     *          "purchase_lists[0][wooden_frame_costs]":10,
     *          "purchase_lists[0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_lists[0][remark]":"备注",
     *          "purchase_lists[0][purchase_details][0][product_specs_id]":10,
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
     *          "purchase_lists[0][purchase_details][0][product_specs_id]":11,
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
     *              "warehouse_id": {
     *                  "仓库id必须int类型"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 49,
     *          "purchase_order_no": "PO2018080209522019409",
     *          "purchase_status": "新建",
     *          "order_no": "",
     *          "user_id": 1,
     *          "print_at": null,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": 1,
     *          "promise_ship_time": null,
     *          "business_personnel": "",
     *          "source": "",
     *          "client_name": "",
     *          "buyer_nick": "",
     *          "order_address": "",
     *          "is_submit": 0,
     *          "is_print": 0,
     *          "is_audit": 0,
     *          "is_change": 0,
     *          "remark": "备注5",
     *          "status": 1,
     *          "purchase_lists": {
     *              {
     *                  "product_specs_id": 9,
     *                  "product_specs_spec_code": "规格编码",
     *                  "product_specs_spec": "产品规格",
     *                  "goods_short_name": "商品简称",
     *                  "goods_commodity_code": "商品编码1",
     *                  "suppliers_name": "供应商1",
     *                  "shop_title": "店铺标题",
     *                  "purchase_lists_purchase_cost": "10.00",
     *                  "purchase_lists_purchase_freight": "10.00",
     *                  "purchase_lists_warehouse_cost": "10.00",
     *                  "purchase_lists_commission": "10.00",
     *                  "purchase_lists_discount": "10.00",
     *                  "purchase_lists_wooden_frame_costs": "1.00",
     *                  "purchase_lists_arrival_time": "2018-06-10 00:00:00",
     *                  "purchase_lists_remark": "备注"
     *              }
     *          },
     *          "purchase_details": {
     *              {
     *                  "product_specs_id": 10,
     *                  "product_specs_spec_code": "规格编码2",
     *                  "product_specs_spec": "产品规格2",
     *                  "goods_short_name": "商品简称2",
     *                  "goods_commodity_code": "商品编码10",
     *                  "suppliers_name": "供应商1",
     *                  "shop_title": "店铺标题",
     *                  "purchase_lists_purchase_cost": "10.00",
     *                  "purchase_lists_purchase_freight": "10.00",
     *                  "purchase_lists_warehouse_cost": "10.00",
     *                  "purchase_lists_commission": "10.00",
     *                  "purchase_lists_discount": "10.00",
     *                  "purchase_lists_wooden_frame_costs": "1.00",
     *                  "purchase_lists_arrival_time": "2018-06-10 00:00:00",
     *                  "purchase_lists_remark": "备注"
     *              },
     *              {
     *                  "product_specs_id": 11,
     *                  "product_specs_spec_code": "规格编码3",
     *                  "product_specs_spec": "产品规格3",
     *                  "goods_short_name": "商品简称3",
     *                  "goods_commodity_code": "商品编码12",
     *                  "suppliers_name": "供应商1",
     *                  "shop_title": "店铺标题",
     *                  "purchase_lists_purchase_cost": "10.00",
     *                  "purchase_lists_purchase_freight": "10.00",
     *                  "purchase_lists_warehouse_cost": "10.00",
     *                  "purchase_lists_commission": "10.00",
     *                  "purchase_lists_discount": "10.00",
     *                  "purchase_lists_wooden_frame_costs": "1.00",
     *                  "purchase_lists_arrival_time": "2018-06-10 00:00:00",
     *                  "purchase_lists_remark": "备注"
     *              }
     *          },
     *          "created_at": "2018-08-02 09:52:20",
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
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=true),
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
     * @Parameters({
     * @Parameter("is_submit", type="integer", description="是否提交", required=true)})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "is_submit": {
     *                  "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
     *              }
     *           },
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
     * @Parameters({
     * @Parameter("is_print", type="integer", description="是否打印", required=true)})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "is_print": {
     *                  "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
     *              }
     *           },
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
     * @Parameters({
     * @Parameter("is_audit", type="integer", description="是否审核", required=true)})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "is_audit": {
     *                  "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
     *              }
     *           },
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
