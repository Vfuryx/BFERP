<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\CancelPurchase;

use App\Http\Requests\Api\CancelPurchaseRequest;
use App\Http\Requests\Api\CancelPurchaseDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\CancelPurchaseTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;


/**
 * 取消采购资源
 * @Resource("cancelpurchases",uri="/api")
 */
class CancelPurchasesController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = CancelPurchaseTransformer::class;
    const MODEL = CancelPurchase::class;

    /**
     * 获取所有取消采购
     *
     * @Get("/cancelpurchases[?status=true&include=purchase,cancelPurchaseDetails]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     *      "data": {
     *          {
     *               "id": 3,
     *               "cancel_purchases_no": "CP2018082018300421223",
     *               "purchases_id": 16,
     *               "creator": "admin",
     *               "submitter": "",
     *               "submit_at": null,
     *               "is_submit": false,
     *               "status": true,
     *               "created_at": "2018-08-20 18:30:04",
     *               "updated_at": "2018-08-20 18:30:04",
     *               "purchase": {
     *                   "id": 16,
     *                   "purchase_order_no": "PO2018081713593264379",
     *                   "purchase_status": "新建",
     *                   "order_no": "",
     *                   "user_id": 1,
     *                   "print_at": null,
     *                   "receiver": "采购收:",
     *                   "receiver_address": "采购收货地址2:",
     *                   "promise_ship_time": null,
     *                   "business_personnel": "",
     *                   "source": "",
     *                   "client_name": "",
     *                   "buyer_nick": "",
     *                   "order_address": "",
     *                   "is_submit": false,
     *                   "is_print": false,
     *                   "is_audit": true,
     *                   "is_change": true,
     *                   "remark": "采购备注2:",
     *                   "status": true
     *               },
     *               "cancelPurchaseDetails": {
     *                   "data": {
     *                       {
     *                           "id": 3,
     *                           "cancel_purchases_id": 3,
     *                           "purchase_details_id": 19,
     *                           "cancel_purchase_quantity": 1,
     *                           "created_at": "2018-08-20 18:30:04",
     *                           "updated_at": "2018-08-20 18:30:04"
     *                       }
     *                  }
     *              }
     *          }
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
     *                 "next": "{{host}}/api/cancelpurchases?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(CancelPurchaseRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增取消采购
     *
     * @Post("/cancelpurchases")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("purchases_id",type="integer", description="采购单id", required=true),
     *      @Parameter("cancel_purchase_details[*][purchase_details_id]",type="integer", description="采购详细id", required=true),
     *      @Parameter("cancel_purchase_details[*][cancel_purchase_quantity]",type="integer", description="取消采购数", required=true),
     * })
     * @Request({
     *     {
     *          "purchases_id": 13,
     *          "cancel_purchase_details[0][purchase_details_id]": 1,
     *          "cancel_purchase_details[0][cancel_purchase_quantity]": 5,
     *          "cancel_purchase_details[1][purchase_details_id]": 2,
     *          "cancel_purchase_details[1][cancel_purchase_quantity]": 5
     *     }
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "cancel_purchase_details.0.cancel_purchase_quantity": {
     *                  "取消采购数必须int类型"
     *              },
     *              "purchases_id": {
     *                  "需要添加的id在数据库中未找到或未启用或已完成"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 3,
     *          "cancel_purchases_no": "CP2018082018300421223",
     *          "purchases_id": 16,
     *          "creator": "admin",
     *          "submitter": "",
     *          "submit_at": null,
     *          "is_submit": false,
     *          "status": true,
     *          "created_at": "2018-08-20 18:30:04",
     *          "updated_at": "2018-08-20 18:30:04",
     *          "purchase": {
     *              "id": 16,
     *              "purchase_order_no": "PO2018081713593264379",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "print_at": null,
     *              "receiver": "采购收:",
     *              "receiver_address": "采购收货地址2:",
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": true,
     *              "is_change": true,
     *              "remark": "采购备注2:",
     *              "status": true
     *          },
     *          "cancelPurchaseDetails": {
     *              "data": {
     *                  {
     *                      "id": 3,
     *                      "cancel_purchases_id": 3,
     *                      "purchase_details_id": 19,
     *                      "cancel_purchase_quantity": 1,
     *                      "created_at": "2018-08-20 18:30:04",
     *                      "updated_at": "2018-08-20 18:30:04"
     *                  }
     *              }
     *          },
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(CancelPurchaseRequest $cancelPurchaseRequest,
                          CancelPurchaseDetailRequest $cancelPurchaseDetailRequest)
    {
        $data[] = $cancelPurchaseRequest->validated();
        $data[] = $cancelPurchaseDetailRequest->input('cancel_purchase_details');
        return $this->traitJoint2Store($data,'cancelPurchaseDetails',$cancelPurchaseDetailRequest->rules(),self::MODEL,self::TRANSFORMER);
    }

    /**
     * 显示单条取消采购
     *
     * @Get("/cancelpurchases/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 3,
     *          "cancel_purchases_no": "CP2018082018300421223",
     *          "purchases_id": 16,
     *          "creator": "admin",
     *          "submitter": "",
     *          "submit_at": null,
     *          "is_submit": false,
     *          "status": true,
     *          "created_at": "2018-08-20 18:30:04",
     *          "updated_at": "2018-08-20 18:30:04",
     *          "purchase": {
     *              "id": 16,
     *              "purchase_order_no": "PO2018081713593264379",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "print_at": null,
     *              "receiver": "采购收:",
     *              "receiver_address": "采购收货地址2:",
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": true,
     *              "is_change": true,
     *              "remark": "采购备注2:",
     *              "status": true
     *          },
     *          "cancelPurchaseDetails": {
     *              "data": {
     *                  {
     *                      "id": 3,
     *                      "cancel_purchases_id": 3,
     *                      "purchase_details_id": 19,
     *                      "cancel_purchase_quantity": 1,
     *                      "created_at": "2018-08-20 18:30:04",
     *                      "updated_at": "2018-08-20 18:30:04"
     *                  }
     *              }
     *          }
     *      })
     * })
     */
    public function show(CancelPurchase $cancelpurchase)
    {
        return $this->traitShow($cancelpurchase, self::TRANSFORMER);
    }


    /**
     * 修改取消采购
     *
     * @Patch("/cancelpurchases/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("purchases_id",type="integer", description="采购单id", required=true),
     *      @Parameter("cancel_purchase_details[*][id]",type="integer", description="取消采购 id (不存在 id 则视为新建)", required=false),
     *      @Parameter("cancel_purchase_details[*][purchase_details_id]",type="integer", description="采购详细id", required=true),
     *      @Parameter("cancel_purchase_details[*][cancel_purchase_quantity]",type="integer", description="取消采购数", required=true),
     * })
     * @Request({
     *     {
     *          "purchases_id": 13,
     *          "cancel_purchase_details[0][id]": 14,
     *          "cancel_purchase_details[0][purchase_details_id]": 1,
     *          "cancel_purchase_details[0][cancel_purchase_quantity]": 1,
     *          "cancel_purchase_details[1][purchase_details_id]": 2,
     *          "cancel_purchase_details[1][cancel_purchase_quantity]": 1
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
     *              "warehouse_id": {
     *                  "仓库id必填"
     *              },
     *              "stock_in_types_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "stock_in_details": {
     *                  "取消采购详情必须json类型"
     *              },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *               *          "id": 3,
     *          "cancel_purchases_no": "CP2018082018300421223",
     *          "purchases_id": 16,
     *          "creator": "admin",
     *          "submitter": "",
     *          "submit_at": null,
     *          "is_submit": false,
     *          "status": true,
     *          "created_at": "2018-08-20 18:30:04",
     *          "updated_at": "2018-08-20 18:30:04",
     *          "purchase": {
     *              "id": 16,
     *              "purchase_order_no": "PO2018081713593264379",
     *              "purchase_status": "新建",
     *              "order_no": "",
     *              "user_id": 1,
     *              "print_at": null,
     *              "receiver": "采购收:",
     *              "receiver_address": "采购收货地址2:",
     *              "promise_ship_time": null,
     *              "business_personnel": "",
     *              "source": "",
     *              "client_name": "",
     *              "buyer_nick": "",
     *              "order_address": "",
     *              "is_submit": false,
     *              "is_print": false,
     *              "is_audit": true,
     *              "is_change": true,
     *              "remark": "采购备注2:",
     *              "status": true
     *          },
     *          "cancelPurchaseDetails": {
     *              "data": {
     *                  {
     *                      "id": 3,
     *                      "cancel_purchases_id": 3,
     *                      "purchase_details_id": 19,
     *                      "cancel_purchase_quantity": 1,
     *                      "created_at": "2018-08-20 18:30:04",
     *                      "updated_at": "2018-08-20 18:30:04"
     *                  }
     *              }
     *          }
     *     })
     * })
     */
    public function update(CancelPurchaseRequest $cancelPurchaseRequest,
                           CancelPurchaseDetailRequest $cancelPurchaseDetailRequest,
                           CancelPurchase $cancelpurchase)
    {
        //判断是否提交
        if ($cancelpurchase->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $data[] = $cancelPurchaseRequest->validated();
        $data[] = $cancelPurchaseDetailRequest->input('cancel_purchase_details');

        return $this->traitJoint2Update($data,'cancelPurchaseDetails',$cancelPurchaseDetailRequest->rules(),$cancelpurchase,self::TRANSFORMER);

    }

    /**
     * 删除取消采购
     *
     * @Delete("/cancelpurchases/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(CancelPurchase $cancelpurchase)
    {
        return $this->traitJoint2Destroy($cancelpurchase,'cancelPurchaseDetails');
    }

    /**
     * 删除一组取消采购
     *
     * @Delete("/cancelpurchases")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="取消采购id组 格式: 1,2,3,4 ", required=true)
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
        return $this->traitJoint2DestroybyIds($request->input('ids'),'cancelPurchaseDetails',self::MODEL);
    }

    /**
     * 更改一组取消采购状态
     *
     * @PUT("/cancelpurchases/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="取消采购id组 格式: 1,2,3,4 ", required=true),
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
    public function isSubmit(CancelPurchase $cancelpurchase)
    {
        DB::transaction(function () use ($cancelpurchase) {
            //修改入库状态
            $this->traitAction(
                $cancelpurchase,
                !$cancelpurchase->status || $cancelpurchase->is_submit,
                '无需重复提交',
                'input'
            );

            //修改采购订单详情的采购数。
            foreach ($cancelpurchase->cancelPurchaseDetails as $item) {
                $item->purchaseDetail->decreasePurchaseQuantity($item->cancel_purchase_quantity);
            }

            //设置父订单状态
            $cancelpurchase->purchase->checkAndChangePurchaseStatus();
        });

        return $this->noContent();
    }

}
