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

use Dingo\Api\Exception\DeleteResourceFailedException;
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
     * @Get("/cancelpurchases{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *     {
     *          "id": 19,
     *          "cancel_purchases_no": "CP2018072316423654591",
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
     *              "is_submit": 0,
     *              "is_print": 0,
     *              "is_check": 0,
     *              "is_change": 1,
     *              "remark": "备注5",
     *              "status": 1,
     *              "created_at": "2018-07-21 16:22:05",
     *              "updated_at": "2018-07-23 16:26:19"
     *          },
     *          "creator": "admin",
     *          "submitter": null,
     *          "submit_at": null,
     *          "is_submit": null,
     *          "cancel_purchase_details": {
     *              {
     *                  "id": 14,
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 1,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 1,
     *                      "purchases_id": 13,
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
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 2,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 2,
     *                      "purchases_id": 13,
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
     *          "id": 19,
     *          "cancel_purchases_no": "CP2018072316423654591",
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
     *              "is_submit": 0,
     *              "is_print": 0,
     *              "is_check": 0,
     *              "is_change": 1,
     *              "remark": "备注5",
     *              "status": 1,
     *              "created_at": "2018-07-21 16:22:05",
     *              "updated_at": "2018-07-23 16:26:19"
     *          },
     *          "creator": "admin",
     *          "submitter": null,
     *          "submit_at": null,
     *          "is_submit": null,
     *          "cancel_purchase_details": {
     *              {
     *                  "id": 14,
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 1,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 1,
     *                      "purchases_id": 13,
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
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 2,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 2,
     *                      "purchases_id": 13,
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
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(CancelPurchaseRequest $cancelPurchaseRequest,
                          CancelPurchaseDetailRequest $cancelPurchaseDetailRequest,
                          \App\Handlers\ValidatedHandler $validatedHandler)
    {
        $cancelPurchase = DB::transaction(function () use ($cancelPurchaseRequest, $cancelPurchaseDetailRequest, $validatedHandler) {

            $cancelPurchase = CancelPurchase::create($cancelPurchaseRequest->validated());

            if ($cancelPurchaseDetails = $cancelPurchaseDetailRequest->input('cancel_purchase_details')) {

                foreach ($cancelPurchaseDetails as $cancelPurchaseDetail) {

                    $cancelPurchase->cancelPurchaseDetails()->create(
                        $validatedHandler->getValidatedData(
                            $cancelPurchaseDetailRequest->rules(),
                            $cancelPurchaseDetail)
                    );
                }
            }
            return $cancelPurchase;
        });

        return $this->response
            ->item($cancelPurchase, new CancelPurchaseTransformer())
            ->setStatusCode(201)
            ->addMeta('status_code', '201');
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
     *          "id": 19,
     *          "cancel_purchases_no": "CP2018072316423654591",
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
     *              "is_submit": 0,
     *              "is_print": 0,
     *              "is_check": 0,
     *              "is_change": 1,
     *              "remark": "备注5",
     *              "status": 1,
     *              "created_at": "2018-07-21 16:22:05",
     *              "updated_at": "2018-07-23 16:26:19"
     *          },
     *          "creator": "admin",
     *          "submitter": null,
     *          "submit_at": null,
     *          "is_submit": null,
     *          "cancel_purchase_details": {
     *              {
     *                  "id": 14,
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 1,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 1,
     *                      "purchases_id": 13,
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
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 2,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 2,
     *                      "purchases_id": 13,
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
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
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
     *          "id": 19,
     *          "cancel_purchases_no": "CP2018072316423654591",
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
     *              "is_submit": 0,
     *              "is_print": 0,
     *              "is_check": 0,
     *              "is_change": 1,
     *              "remark": "备注5",
     *              "status": 1,
     *              "created_at": "2018-07-21 16:22:05",
     *              "updated_at": "2018-07-23 16:26:19"
     *          },
     *          "creator": "admin",
     *          "submitter": null,
     *          "submit_at": null,
     *          "is_submit": null,
     *          "cancel_purchase_details": {
     *              {
     *                  "id": 14,
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 1,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 1,
     *                      "purchases_id": 13,
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
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 2,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 16:42:37",
     *                  "updated_at": "2018-07-23 16:42:37",
     *                  "purchase_detail": {
     *                      "id": 2,
     *                      "purchases_id": 13,
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
     *                  "cancel_purchases_id": 19,
     *                  "purchase_details_id": 2,
     *                  "cancel_purchase_quantity": 1,
     *                  "created_at": "2018-07-23 17:01:21",
     *                  "updated_at": "2018-07-23 17:01:21",
     *                  "purchase_detail": {
     *                      "id": 2,
     *                      "purchases_id": 13,
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
    public function update(CancelPurchaseRequest $cancelPurchaseRequest,
                           CancelPurchaseDetailRequest $cancelPurchaseDetailRequest,
                           CancelPurchase $cancelpurchase,
                           \App\Handlers\ValidatedHandler $validatedHandler)
    {
        //判断是否提交
        if ($cancelpurchase->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $cancelpurchase = DB::transaction(function () use ($cancelPurchaseRequest,
                                                           $cancelPurchaseDetailRequest,
                                                           $cancelpurchase,
                                                           $validatedHandler) {

            $cancelpurchase->update($cancelPurchaseRequest->validated());

            if ($cancelPurchaseDetails = $cancelPurchaseDetailRequest->input('cancel_purchase_details')) {

                foreach ($cancelPurchaseDetails as $cancelPurchaseDetail) {

                    $data = $validatedHandler->getValidatedData($cancelPurchaseDetailRequest->rules(), $cancelPurchaseDetail);

                    //存在id则更新，否则插入
                    if (isset($cancelPurchaseDetail['id'])) {

                        $cancelpurchase->cancelPurchaseDetails()->findOrFail($cancelPurchaseDetail['id'])->update($data);
                    } else {
                        $cancelpurchase->cancelPurchaseDetails()->create($data);
                    }
                }
            }
            return $cancelpurchase;
        });

        return $this->response
            ->item($cancelpurchase, new CancelPurchaseTransformer())
            ->setStatusCode(201);
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
        DB::transaction(function () use ($cancelpurchase) {

            $delStoDet = $cancelpurchase->cancelPurchaseDetails()->delete();

            $delSto = $cancelpurchase->delete();

            if ($delStoDet === false || $delSto === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
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
        $ids = explode(',', $request->input('ids'));

        DB::transaction(function () use ($ids) {
            $delitem = \App\Models\CancelPurchaseDetail::whereIn('cancel_purchases_id', $ids)->delete();

            $del = CancelPurchase::destroy($ids);

            if ($delitem === false || $del === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->errorResponse(204);
    }

    /**
     * 更改一组取消采购状态
     *
     * @PUT("/cancelpurchases/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="取消采购id组 格式: 1,2,3,4 ", required=true),
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
        });

        return $this->noContent();
    }

}
