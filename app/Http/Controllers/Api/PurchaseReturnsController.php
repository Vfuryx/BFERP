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
     * @Get("/purchasereturns[?status=true&include=purchaseReturnDetails.stock,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("is_submit", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("is_audit", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     *      "data": {
     *          {
     *              "id": 3,
     *               "purchase_return_no": "RG2018082117042268516",
     *               "creator": "admin",
     *               "is_submit": false,
     *               "submitter": "",
     *               "submit_at": null,
     *               "is_audit": false,
     *               "auditor": "",
     *               "audit_at": null,
     *               "is_print": false,
     *               "remark": "采购退货单备注",
     *               "status": true,
     *               "created_at": "2018-08-21 17:04:22",
     *               "updated_at": "2018-08-21 17:04:22",
     *               "purchaseReturnDetails": {
     *                   "data": {
     *                       {
     *                           "id": 3,
     *                           "purchase_returns_id": 3,
     *                           "stocks_id": 18,
     *                           "purchase_return_quantity": 12,
     *                           "suppliers_id": 1,
     *                           "price_differences": "0.00",
     *                           "purchase_return_types_id": 2,
     *                           "created_at": "2018-08-21 17:04:22",
     *                           "updated_at": "2018-08-21 17:04:22",
     *                           "purchaseReturnType": {
     *                               "id": 2,
     *                               "name": "采购退货类型名称",
     *                               "status": true,
     *                               "created_at": "2018-08-21 17:04:08",
     *                               "updated_at": "2018-08-21 17:04:08"
     *                           },
     *                           "stock": {
     *                               "id": 18,
     *                               "warehouse_id": 1,
     *                               "products_id": 30,
     *                               "product_components_id": 7,
     *                               "quantity": 10,
     *                               "status": true,
     *                               "created_at": "2018-08-15 16:25:24",
     *                               "updated_at": "2018-08-16 11:43:51"
     *                           },
     *                           "supplier": {
     *                               "id": 1,
     *                               "name": "供应商名称",
     *                               "company": "供应商公司",
     *                               "code": "公司代码",
     *                               "province": "省",
     *                               "city": "市",
     *                               "district": "区",
     *                               "address": "地址",
     *                               "zipcode": "邮编",
     *                               "contacts": "联系人",
     *                               "phone": "电话",
     *                               "mobile": "手机",
     *                               "fax": "传真",
     *                               "email": "935661686@qq.com",
     *                               "remark": "备注",
     *                               "is_scan": true,
     *                               "status": true,
     *                               "auto_valuation": true,
     *                               "created_at": "2018-08-06 16:27:02",
     *                               "updated_at": "2018-08-06 16:27:02"
     *                           }
     *                       }
     *                   }
     *               }
     *           }
     *      },
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
     *          "id": 3,
     *          "purchase_return_no": "RG2018082117042268516",
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
     *          "created_at": "2018-08-21 17:04:22",
     *          "updated_at": "2018-08-21 17:04:22",
     *          "purchaseReturnDetails": {
     *              "data": {
     *                  {
     *                      "id": 3,
     *                      "purchase_returns_id": 3,
     *                      "stocks_id": 18,
     *                      "purchase_return_quantity": 12,
     *                      "suppliers_id": 1,
     *                      "price_differences": "0.00",
     *                      "purchase_return_types_id": 2,
     *                      "created_at": "2018-08-21 17:04:22",
     *                      "updated_at": "2018-08-21 17:04:22",
     *                      "purchaseReturnType": {
     *                          "id": 2,
     *                          "name": "采购退货类型名称",
     *                          "status": true,
     *                          "created_at": "2018-08-21 17:04:08",
     *                          "updated_at": "2018-08-21 17:04:08"
     *                      },
     *                      "stock": {
     *                          "id": 18,
     *                          "warehouse_id": 1,
     *                          "products_id": 30,
     *                          "product_components_id": 7,
     *                          "quantity": 10,
     *                          "status": true,
     *                          "created_at": "2018-08-15 16:25:24",
     *                          "updated_at": "2018-08-16 11:43:51"
     *                      },
     *                      "supplier": {
     *                          "id": 1,
     *                          "name": "供应商名称",
     *                          "company": "供应商公司",
     *                          "code": "公司代码",
     *                          "province": "省",
     *                          "city": "市",
     *                          "district": "区",
     *                          "address": "地址",
     *                          "zipcode": "邮编",
     *                          "contacts": "联系人",
     *                          "phone": "电话",
     *                          "mobile": "手机",
     *                          "fax": "传真",
     *                          "email": "935661686@qq.com",
     *                          "remark": "备注",
     *                          "is_scan": true,
     *                          "status": true,
     *                          "auto_valuation": true,
     *                          "created_at": "2018-08-06 16:27:02",
     *                          "updated_at": "2018-08-06 16:27:02"
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
     *          "id": 3,
     *          "purchase_return_no": "RG2018082117042268516",
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
     *          "created_at": "2018-08-21 17:04:22",
     *          "updated_at": "2018-08-21 17:04:22",
     *          "purchaseReturnDetails": {
     *              "data": {
     *                  {
     *                      "id": 3,
     *                      "purchase_returns_id": 3,
     *                      "stocks_id": 18,
     *                      "purchase_return_quantity": 12,
     *                      "suppliers_id": 1,
     *                      "price_differences": "0.00",
     *                      "purchase_return_types_id": 2,
     *                      "created_at": "2018-08-21 17:04:22",
     *                      "updated_at": "2018-08-21 17:04:22",
     *                      "purchaseReturnType": {
     *                          "id": 2,
     *                          "name": "采购退货类型名称",
     *                          "status": true,
     *                          "created_at": "2018-08-21 17:04:08",
     *                          "updated_at": "2018-08-21 17:04:08"
     *                      },
     *                      "stock": {
     *                          "id": 18,
     *                          "warehouse_id": 1,
     *                          "products_id": 30,
     *                          "product_components_id": 7,
     *                          "quantity": 10,
     *                          "status": true,
     *                          "created_at": "2018-08-15 16:25:24",
     *                          "updated_at": "2018-08-16 11:43:51"
     *                      },
     *                      "supplier": {
     *                          "id": 1,
     *                          "name": "供应商名称",
     *                          "company": "供应商公司",
     *                          "code": "公司代码",
     *                          "province": "省",
     *                          "city": "市",
     *                          "district": "区",
     *                          "address": "地址",
     *                          "zipcode": "邮编",
     *                          "contacts": "联系人",
     *                          "phone": "电话",
     *                          "mobile": "手机",
     *                          "fax": "传真",
     *                          "email": "935661686@qq.com",
     *                          "remark": "备注",
     *                          "is_scan": true,
     *                          "status": true,
     *                          "auto_valuation": true,
     *                          "created_at": "2018-08-06 16:27:02",
     *                          "updated_at": "2018-08-06 16:27:02"
     *                      }
     *                  }
     *              }
     *          }
     *      })
     * })
     */
    public function show(PurchaseReturn $purchasereturn)
    {
        return $this->traitShow($purchasereturn, self::TRANSFORMER);
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
     *          "id": 3,
     *          "purchase_return_no": "RG2018082117042268516",
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
     *          "created_at": "2018-08-21 17:04:22",
     *          "updated_at": "2018-08-21 17:04:22",
     *          "purchaseReturnDetails": {
     *              "data": {
     *                  {
     *                      "id": 3,
     *                      "purchase_returns_id": 3,
     *                      "stocks_id": 18,
     *                      "purchase_return_quantity": 12,
     *                      "suppliers_id": 1,
     *                      "price_differences": "0.00",
     *                      "purchase_return_types_id": 2,
     *                      "created_at": "2018-08-21 17:04:22",
     *                      "updated_at": "2018-08-21 17:04:22",
     *                      "purchaseReturnType": {
     *                          "id": 2,
     *                          "name": "采购退货类型名称",
     *                          "status": true,
     *                          "created_at": "2018-08-21 17:04:08",
     *                          "updated_at": "2018-08-21 17:04:08"
     *                      },
     *                      "stock": {
     *                          "id": 18,
     *                          "warehouse_id": 1,
     *                          "products_id": 30,
     *                          "product_components_id": 7,
     *                          "quantity": 10,
     *                          "status": true,
     *                          "created_at": "2018-08-15 16:25:24",
     *                          "updated_at": "2018-08-16 11:43:51"
     *                      },
     *                      "supplier": {
     *                          "id": 1,
     *                          "name": "供应商名称",
     *                          "company": "供应商公司",
     *                          "code": "公司代码",
     *                          "province": "省",
     *                          "city": "市",
     *                          "district": "区",
     *                          "address": "地址",
     *                          "zipcode": "邮编",
     *                          "contacts": "联系人",
     *                          "phone": "电话",
     *                          "mobile": "手机",
     *                          "fax": "传真",
     *                          "email": "935661686@qq.com",
     *                          "remark": "备注",
     *                          "is_scan": true,
     *                          "status": true,
     *                          "auto_valuation": true,
     *                          "created_at": "2018-08-06 16:27:02",
     *                          "updated_at": "2018-08-06 16:27:02"
     *                      }
     *                  }
     *              }
     *          }
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
