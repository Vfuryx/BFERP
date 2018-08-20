<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\PurchaseReturn;

use App\Http\Requests\Api\PurchaseReturnRequest;
use App\Http\Requests\Api\PurchaseReturnDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\PurchaseReturnTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 采购退货资源
 * @Resource("purchasereturns",uri="/api")
 */
class PurchaseReturnsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = PurchaseReturnTransformer::class;
    const MODEL = PurchaseReturn::class;

    /**
     * 获取所有采购退货
     *
     * @Get("/purchasereturns{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *     {
     *          "id": 1,
     *          "purchase_return_no": "RG2018072411440706967",
     *          "creator": "admin",
     *          "is_submit": false,
     *          "submitter": "",
     *          "submit_at": null,
     *          "is_audit": false,
     *          "auditor": "",
     *          "audit_at": null,
     *          "is_print": false,
     *          "remark": "采购退货单备注",
     *          "status": true,
     *          "purchase_return_details": {
     *              {
     *                  "id": 1,
     *                  "purchase_returns_id": 1,
     *                  "stocks_id": 1,
     *                  "purchase_return_quantity": 10,
     *                  "suppliers_id": 1,
     *                  "price_differences": "1.00",
     *                  "purchase_return_types_id": 1,
     *                  "created_at": "2018-07-24 11:44:07",
     *                  "updated_at": "2018-07-24 11:44:07",
     *                  "stock": {
     *                      "id": 1,
     *                      "warehouse_id": 1,
     *                      "goods_id": 1,
     *                      "pro_specs_id": 1,
     *                      "quantity": 20,
     *                      "status": true,
     *                      "created_at": "2018-07-21 18:20:53",
     *                      "updated_at": "2018-07-21 18:27:38"
     *                  },
     *                  "supplier": {
     *                      "id": 1,
     *                      "name": "1",
     *                      "company": "1",
     *                      "code": "1",
     *                      "province": "1",
     *                      "city": "1",
     *                      "district": "1",
     *                      "address": "1",
     *                      "zipcode": "1",
     *                      "contacts": "1",
     *                      "phone": "1",
     *                      "mobile": "132131343242",
     *                      "fax": "1",
     *                      "email": "132@re.cn",
     *                      "remark": "1",
     *                      "is_scan": true,
     *                      "status": true,
     *                      "auto_valuation": true,
     *                      "created_at": "2018-07-17 17:54:01",
     *                      "updated_at": "2018-07-17 17:54:01"
     *                  },
     *                  "purchase_return_types": {
     *                      "id": 1,
     *                      "name": "采购退货类型名称",
     *                      "status": true,
     *                      "created_at": "2018-07-24 10:24:13",
     *                      "updated_at": "2018-07-24 10:24:13"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-24 11:44:07",
     *          "updated_at": "2018-07-24 11:44:07"
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/purchasereturns?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(PurchaseReturnRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增采购退货
     *
     * @Post("/purchasereturns")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("remark", description="采购退货单备注", required=false),
     *      @Parameter("status", type="integer", description="状态", required=false, default="1"),
     *      @Parameter("purchase_return_details[0][stocks_id]",type="integer", description="库存id", required=true),
     *      @Parameter("purchase_return_details[0][purchase_return_quantity]",type="integer", description="采购退货数", required=true),
     *      @Parameter("purchase_return_details[0][suppliers_id]",type="integer", description="供应商id", required=true),
     *      @Parameter("purchase_return_details[0][price_differences]",type="numeric", description="差价", required=true),
     *      @Parameter("purchase_return_details[0][purchase_return_types_id]",type="integer", description="采购退货类型id", required=true),
     * })
     * @Request({
     *     {
     *          "remark":"采购退货单备注",
     *          "status":1,
     *          "purchase_return_details[0][stocks_id]":1,
     *          "purchase_return_details[0][purchase_return_quantity]":12,
     *          "purchase_return_details[0][suppliers_id]":1,
     *          "purchase_return_details[0][price_differences]":1.00,
     *          "purchase_return_details[0][purchase_return_types_id]":1,
     *     }
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "status": {
     *                  "状态必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "purchase_return_no": "RG2018072411440706967",
     *          "creator": "admin",
     *          "is_submit": false,
     *          "submitter": null,
     *          "submit_at": null,
     *          "is_audit": false,
     *          "auditor": null,
     *          "audit_at": null,
     *          "is_print": false,
     *          "remark": "采购退货单备注",
     *          "status": true,
     *          "purchase_return_details": {
     *              {
     *                  "id": 1,
     *                  "purchase_returns_id": 1,
     *                  "stocks_id": 1,
     *                  "purchase_return_quantity": 10,
     *                  "suppliers_id": 1,
     *                  "price_differences": "1.00",
     *                  "purchase_return_types_id": 1,
     *                  "created_at": "2018-07-24 11:44:07",
     *                  "updated_at": "2018-07-24 11:44:07",
     *                  "stock": {
     *                      "id": 1,
     *                      "warehouse_id": 1,
     *                      "goods_id": 1,
     *                      "pro_specs_id": 1,
     *                      "quantity": 20,
     *                      "status": true,
     *                      "created_at": "2018-07-21 18:20:53",
     *                      "updated_at": "2018-07-21 18:27:38"
     *                  },
     *                  "supplier": {
     *                      "id": 1,
     *                      "name": "1",
     *                      "company": "1",
     *                      "code": "1",
     *                      "province": "1",
     *                      "city": "1",
     *                      "district": "1",
     *                      "address": "1",
     *                      "zipcode": "1",
     *                      "contacts": "1",
     *                      "phone": "1",
     *                      "mobile": "132131343242",
     *                      "fax": "1",
     *                      "email": "132@re.cn",
     *                      "remark": "1",
     *                      "is_scan": true,
     *                      "status": true,
     *                      "auto_valuation": true,
     *                      "created_at": "2018-07-17 17:54:01",
     *                      "updated_at": "2018-07-17 17:54:01"
     *                  },
     *                  "purchase_return_types": {
     *                      "id": 1,
     *                      "name": "采购退货类型名称",
     *                      "status": true,
     *                      "created_at": "2018-07-24 10:24:13",
     *                      "updated_at": "2018-07-24 10:24:13"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-24 11:44:07",
     *          "updated_at": "2018-07-24 11:44:07",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(PurchaseReturnRequest $purchaseReturnRequest,
                          PurchaseReturnDetailRequest $purchaseReturnDetailRequest,
                          \App\Handlers\ValidatedHandler $validatedHandler)
    {
        $data[] = $purchaseReturnRequest->validated();
        $data[] = $purchaseReturnDetailRequest->input('purchase_return_details');
        return $this->traitJoint2Store(
            $data,
            'purchaseReturnDetails',
            $purchaseReturnDetailRequest->rules(),
            self::MODEL,
            self::TRANSFORMER
        );
    }

    /**
     * 显示单条采购退货
     *
     * @Get("/purchasereturns/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "purchase_return_no": "RG2018072411440706967",
     *          "creator": "admin",
     *          "is_submit": false,
     *          "submitter": "",
     *          "submit_at": null,
     *          "is_audit": false,
     *          "auditor": "",
     *          "audit_at": null,
     *          "is_print": false,
     *          "remark": "采购退货单备注",
     *          "status": true,
     *          "purchase_return_details": {
     *              {
     *                  "id": 1,
     *                  "purchase_returns_id": 1,
     *                  "stocks_id": 1,
     *                  "purchase_return_quantity": 10,
     *                  "suppliers_id": 1,
     *                  "price_differences": "1.00",
     *                  "purchase_return_types_id": 1,
     *                  "created_at": "2018-07-24 11:44:07",
     *                  "updated_at": "2018-07-24 11:44:07",
     *                  "stock": {
     *                      "id": 1,
     *                      "warehouse_id": 1,
     *                      "goods_id": 1,
     *                      "pro_specs_id": 1,
     *                      "quantity": 20,
     *                      "status": true,
     *                      "created_at": "2018-07-21 18:20:53",
     *                      "updated_at": "2018-07-21 18:27:38"
     *                  },
     *                  "supplier": {
     *                      "id": 1,
     *                      "name": "1",
     *                      "company": "1",
     *                      "code": "1",
     *                      "province": "1",
     *                      "city": "1",
     *                      "district": "1",
     *                      "address": "1",
     *                      "zipcode": "1",
     *                      "contacts": "1",
     *                      "phone": "1",
     *                      "mobile": "132131343242",
     *                      "fax": "1",
     *                      "email": "132@re.cn",
     *                      "remark": "1",
     *                      "is_scan": true,
     *                      "status": true,
     *                      "auto_valuation": true,
     *                      "created_at": "2018-07-17 17:54:01",
     *                      "updated_at": "2018-07-17 17:54:01"
     *                  },
     *                  "purchase_return_types": {
     *                      "id": 1,
     *                      "name": "采购退货类型名称",
     *                      "status": true,
     *                      "created_at": "2018-07-24 10:24:13",
     *                      "updated_at": "2018-07-24 10:24:13"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-24 11:44:07",
     *          "updated_at": "2018-07-24 11:44:07"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }


    /**
     * 修改采购退货
     *
     * @Patch("/purchasereturns/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("remark", description="采购退货单备注", required=false),
     *      @Parameter("status", type="integer", description="状态", required=false),
     *      @Parameter("purchase_return_details[0][id]",type="integer", description="采购退货id (不存在 id 则视为新建)",required=false),
     *      @Parameter("purchase_return_details[0][stocks_id]",type="integer", description="库存id", required=false),
     *      @Parameter("purchase_return_details[0][purchase_return_quantity]",type="integer", description="采购退货数", required=false),
     *      @Parameter("purchase_return_details[0][suppliers_id]",type="integer", description="供应商id", required=false),
     *      @Parameter("purchase_return_details[0][price_differences]",type="numeric", description="差价", required=false),
     *      @Parameter("purchase_return_details[0][purchase_return_types_id]",type="integer", description="采购退货类型id", required=false),
     * })
     * @Request({
     *     {
     *          "remark":"采购退货单备注",
     *          "status":1,
     *          "purchase_return_details[0][id]":1,
     *          "purchase_return_details[0][stocks_id]":1,
     *          "purchase_return_details[0][purchase_return_quantity]":12,
     *          "purchase_return_details[0][suppliers_id]":1,
     *          "purchase_return_details[0][price_differences]":1,
     *          "purchase_return_details[0][purchase_return_types_id]":1,
     *     }
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "status": {
     *                  "状态必须int类型"
     *              },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 19,
     *          "cancel_$purchasereturns_no": "CP2018072316423654591",
     *          "purchase": {
     *              "id": 13,
     *              "purchase_order_no": "PO2018072116220517242",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "print_at": null,
     *              "receiver": "收货人3",
     *              "receiver_address": "收货地址3",
     *              "warehouse_id": 1,
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": false,
     *              "is_change": true,
     *              "remark": "备注5",
     *              "status": true,
     *              "created_at": "2018-07-21 16:22:05",
     *              "updated_at": "2018-07-23 16:26:19"
     *          },
     *          "creator": "admin",
     *          "submitter": null,
     *          "submit_at": null,
     *          "is_submit": false,
     *          "cancel_purchase_details": {
     *              {
     *                  "id": 14,
     *                  "cancel_$purchasereturns_id": 19,
     *                  "purchase_details_id": 1,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 1,
     *                      "$purchasereturns_id": 13,
     *                      "purchase_item_status": "新建",
     *                      "product_specs_id": 1,
     *                      "purchase_quantity": 10,
     *                      "stock_in_count": 0,
     *                      "shops_id": 1,
     *                      "suppliers_id": 1,
     *                      "purchase_cost": "0.00",
     *                      "purchase_freight": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "commission": "10.00",
     *                      "discount": "10.00",
     *                      "colour_num": "色号",
     *                      "paint": "油漆",
     *                      "wooden_frame_costs": "0.00",
     *                      "arrival_time": "2018-06-10 00:00:00",
     *                      "remark": "备注",
     *                      "created_at": "2018-07-21 16:22:05",
     *                      "updated_at": "2018-07-23 16:26:19"
     *                  }
     *              },
     *              {
     *                  "id": 15,
     *                  "cancel_$purchasereturns_id": 19,
     *                  "purchase_details_id": 2,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 2,
     *                      "$purchasereturns_id": 13,
     *                      "purchase_item_status": "新建",
     *                      "product_specs_id": 1,
     *                      "purchase_quantity": 10,
     *                      "stock_in_count": 0,
     *                      "shops_id": 1,
     *                      "suppliers_id": 1,
     *                      "purchase_cost": "0.00",
     *                      "purchase_freight": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "commission": "10.00",
     *                      "discount": "10.00",
     *                      "colour_num": "色号",
     *                      "paint": "油漆",
     *                      "wooden_frame_costs": "0.00",
     *                      "arrival_time": "2018-06-10 00:00:00",
     *                      "remark": "备注",
     *                      "created_at": "2018-07-21 16:22:05",
     *                      "updated_at": "2018-07-23 16:26:19"
     *                  }
     *              },
     *              {
     *                  "id": 16,
     *                  "cancel_$purchasereturns_id": 19,
     *                  "purchase_details_id": 2,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 17:01:21",
     *                  "updated_at": "2018-07-23 17:01:21",
     *                  "purchase_detail": {
     *                      "id": 2,
     *                      "$purchasereturns_id": 13,
     *                      "purchase_item_status": "新建",
     *                      "product_specs_id": 1,
     *                      "purchase_quantity": 10,
     *                      "stock_in_count": 0,
     *                      "shops_id": 1,
     *                      "suppliers_id": 1,
     *                      "purchase_cost": "0.00",
     *                      "purchase_freight": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "commission": "10.00",
     *                      "discount": "10.00",
     *                      "colour_num": "色号",
     *                      "paint": "油漆",
     *                      "wooden_frame_costs": "0.00",
     *                      "arrival_time": "2018-06-10 00:00:00",
     *                      "remark": "备注",
     *                      "created_at": "2018-07-21 16:22:05",
     *                      "updated_at": "2018-07-23 16:26:19"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-23 16:42:36",
     *          "updated_at": "2018-07-23 16:42:36",
     *     })
     * })
     */
    public function update(PurchaseReturnRequest $purchaseReturnRequest,
                           PurchaseReturnDetailRequest $purchaseReturnDetailRequest,
                           PurchaseReturn $purchasereturn)
    {
        //判断是否提交
        if ($purchasereturn->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $data[] = $purchaseReturnRequest->validated();
        $data[] = $purchaseReturnDetailRequest->input('purchase_return_details');
        return $this->traitJoint2Update(
            $data,
            'purchaseReturnDetails',
            $purchaseReturnDetailRequest->rules(),
            $purchasereturn,
            self::TRANSFORMER
        );
    }

    /**
     * 删除采购退货
     *
     * @Delete("/purchasereturns/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PurchaseReturn $purchasereturn)
    {
       return $this->traitJoint2Destroy($purchasereturn,'purchaseReturnDetails');
    }

    /**
     * 删除一组采购退货
     *
     * @Delete("/purchasereturns")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购退货id组 格式: 1,2,3,4 ", required=true)
     * })
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
        return $this->traitJoint2DestroybyIds(
            $request->input('ids'),
            'purchaseReturnDetails',
            self::MODEL
        );
    }

    /**
     * 更改一组采购退货状态
     *
     * @PUT("/purchasereturns/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="采购退货id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=true),
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
     * @PUT("/purchasereturns/:id/submit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无需重复提交",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isSubmit(PurchaseReturn $purchasereturn)
    {
        DB::transaction(function () use ($purchasereturn) {
            //修改入库状态
            $this->traitAction(
                $purchasereturn,
                !$purchasereturn->status || $purchasereturn->is_submit,
                '无需重复提交',
                'input'
            );
        });

        return $this->noContent();
    }


//    /**
//     * 退审
//     *
//     * @PUT("/purchasereturns/:id/auditfaild")
//     * @Versions({"v1"})
//     * @Transaction({
//     *      @Response(422, body={
//     *          "message": "无法退审",
//     *          "status_code": 422,
//     *      }),
//     *      @Response(204, body={})
//     * })
//     */
//    public function isAuditFaild(PurchaseReturn $purchasereturn)
//    {
//
//        return $this->traitAction($purchasereturn,
//            !$purchasereturn->status || !$purchasereturn->is_submit || $purchasereturn->is_audit,
//            '无法退审',
//            'auditFaild'
//        );
//
//    }

    /**
     * 审核
     *
     * @PUT("/purchasereturns/:id/audit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "审核出错，是否未提交或重复审核",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isAudit(PurchaseReturn $purchasereturn)
    {
        DB::transaction(function () use ($purchasereturn) {


            $this->traitAction($purchasereturn,
                !$purchasereturn->status || !$purchasereturn->is_submit || $purchasereturn->is_audit,
                '审核出错，是否未提交或重复审核',
                'audit');

            //生成出库单，记录出库的数量等信息



            //修改库存数量
            foreach ($purchasereturn->purchaseReturnDetails as $item) {
                if($item->stock->decreaseQuantity($item->purchase_return_quantity) <= 0){
                    throw new UpdateResourceFailedException('商品库存不足');
                }
            }
        });

        return $this->noContent();
    }

    /**
     * 打印
     *
     * @PUT("/purchasereturns/:id/print")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "打印出错，是否未提交未审核或重复打印",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isPrint(PurchaseReturn $purchasereturn)
    {
        return $this->traitAction($purchasereturn, !$purchasereturn->status || !$purchasereturn->is_submit || !$purchasereturn->is_audit || $purchasereturn->is_print, '打印出错，是否未提交未审核或重复打印', 'print');
    }

}
