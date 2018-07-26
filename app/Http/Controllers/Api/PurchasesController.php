<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Purchase;
use App\Models\PurchaseDetail;

use App\Http\Requests\Api\PurchaseRequest;
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
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 91,
     *          "purchase_order_no": "PO2018071912575762929",
     *          "purchase_status": "新建",
     *          "order_no": "",
     *          "user_id": 1,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": 1,
     *          "promise_delivery_time": null,
     *          "salesman": "",
     *          "source": "",
     *          "client_name": "",
     *          "buyer_nick": "",
     *          "order_address": "",
     *          "is_submit": 0,
     *          "is_print": 0,
     *          "is_check": 0,
     *          "is_change": 0,
     *          "remark": "备注3",
     *          "status": 1,
     *          "purchase_details": {
     *              {
     *                  "id": 5,
     *                  "purchases_id": 91,
     *                  "product_specs_id": 2,
     *                  "purchase_quantity": 10,
     *                  "shops_id": 1,
     *                  "suppliers_id": 1,
     *                  "purchase_cost": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "commission": "10.00",
     *                  "discount": "10.00",
     *                  "colour_num": "色号",
     *                  "paint": "油漆",
     *                  "wooden_frame_costs": "0.00",
     *                  "arrival_time": "2018-06-10 00:00:00",
     *                  "remark": "备注",
     *                  "created_at": "2018-07-19 12:57:58",
     *                  "updated_at": "2018-07-19 12:57:58"
     *              }
     *          },
     *          "created_at": "2018-07-19 12:57:58",
     *          "updated_at": "2018-07-19 12:57:58"
     *      },
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
     *      @Parameter("purchase_details[0][product_specs_id]", type="integer", description="产品规格id", required=true),
     *      @Parameter("purchase_details[0][purchase_quantity]", type="integer", description="采购数", required=true),
     *      @Parameter("purchase_details[0][shops_id]", type="integer", description="采购店铺id", required=true),
     *      @Parameter("purchase_details[0][suppliers_id]", type="integer", description="供应商id", required=true),
     *      @Parameter("purchase_details[0][purchase_cost]", type="numeric", description="采购成本", required=true),
     *      @Parameter("purchase_details[0][purchase_freight]", type="numeric", description="采购运费", required=true),
     *      @Parameter("purchase_details[0][warehouse_cost]", type="numeric", description="仓库成本", required=true),
     *      @Parameter("purchase_details[0][commission]", type="numeric", description="金佣点", required=false),
     *      @Parameter("purchase_details[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("purchase_details[0][colour_num]", description="色号", required=false),
     *      @Parameter("purchase_details[0][paint]", description="油漆", required=false),
     *      @Parameter("purchase_details[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("purchase_details[0][arrival_time]", type="dateTime", description="到货时间", required=false),
     *      @Parameter("purchase_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "receiver": "收货人",
     *          "receiver_address": "收货地址",
     *          "warehouse_id": "1",
     *          "remark": "备注",
     *          "status": "1",
     *          "purchase_details[0][product_specs_id]":1,
     *          "purchase_details[0][purchase_quantity]":10,
     *          "purchase_details[0][shops_id]":1,
     *          "purchase_details[0][suppliers_id]":1,
     *          "purchase_details[0][purchase_cost]":10,
     *          "purchase_details[0][purchase_freight]":10,
     *          "purchase_details[0][warehouse_cost]":10,
     *          "purchase_details[0][commission]":10,
     *          "purchase_details[0][discount]":10,
     *          "purchase_details[0][colour_num]":"色号",
     *          "purchase_details[0][paint]":"油漆",
     *          "purchase_details[0][wooden_frame_costs]":10,
     *          "purchase_details[0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_details[0][remark]":"备注",
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
     *          "id": 91,
     *          "purchase_order_no": "PO2018071912575762929",
     *          "purchase_status": "新建",
     *          "order_no": null,
     *          "user_id": 1,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": "1",
     *          "promise_delivery_time": null,
     *          "salesman": null,
     *          "source": null,
     *          "client_name": null,
     *          "buyer_nick": null,
     *          "order_address": null,
     *          "is_submit": null,
     *          "is_print": null,
     *          "is_check": null,
     *          "is_change": null,
     *          "remark": "备注3",
     *          "status": "1",
     *          "purchase_details": {
     *          {
     *              "id": 5,
     *              "purchases_id": 91,
     *              "product_specs_id": 2,
     *              "purchase_quantity": 10,
     *              "shops_id": 1,
     *              "suppliers_id": 1,
     *              "purchase_cost": "10.00",
     *              "purchase_freight": "10.00",
     *              "warehouse_cost": "10.00",
     *              "commission": "10.00",
     *              "discount": "10.00",
     *              "colour_num": "色号",
     *              "paint": "油漆",
     *              "wooden_frame_costs": "0.00",
     *              "arrival_time": "2018-06-10 00:00:00",
     *              "remark": "备注",
     *              "created_at": "2018-07-19 12:57:58",
     *              "updated_at": "2018-07-19 12:57:58"
     *          }
     *          },
     *          "created_at": "2018-07-19 12:57:58",
     *          "updated_at": "2018-07-19 12:57:58",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(PurchaseRequest $purchaseRequest,
                          PurchaseDetailRequest $purchaseDetailRequest,
                          \App\Handlers\ValidatedHandler $validatedHandler)
    {

        $purchase = DB::transaction(function () use ($purchaseRequest, $purchaseDetailRequest, $validatedHandler) {

            $purchase = Purchase::create($purchaseRequest->validated());

            if ($purchasedDetails = $purchaseRequest->input('purchase_details')) {

                foreach ($purchasedDetails as $purchasedDetail) {

                    $purchase->purchaseDetails()->create(
                        $validatedHandler->getValidatedData($purchaseDetailRequest->rules(), $purchasedDetail)
                    );
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
     *          "id": 91,
     *          "purchase_order_no": "PO2018071912575762929",
     *          "purchase_status": "新建",
     *          "order_no": "",
     *          "user_id": 1,
     *          "receiver": "收货人3",
     *          "receiver_address": "收货地址3",
     *          "warehouse_id": 1,
     *          "promise_delivery_time": null,
     *          "salesman": "",
     *          "source": "",
     *          "client_name": "",
     *          "buyer_nick": "",
     *          "order_address": "",
     *          "is_submit": 0,
     *          "is_print": 0,
     *          "is_check": 0,
     *          "is_change": 0,
     *          "remark": "备注3",
     *          "status": 1,
     *          "purchase_details": {
     *              {
     *                  "id": 5,
     *                  "purchases_id": 91,
     *                  "product_specs_id": 2,
     *                  "purchase_quantity": 10,
     *                  "shops_id": 1,
     *                  "suppliers_id": 1,
     *                  "purchase_cost": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "commission": "10.00",
     *                  "discount": "10.00",
     *                  "colour_num": "色号",
     *                  "paint": "油漆",
     *                  "wooden_frame_costs": "0.00",
     *                  "arrival_time": "2018-06-10 00:00:00",
     *                  "remark": "备注",
     *                  "created_at": "2018-07-19 12:57:58",
     *                  "updated_at": "2018-07-19 12:57:58"
     *              }
     *          },
     *          "created_at": "2018-07-19 12:57:58",
     *          "updated_at": "2018-07-19 12:57:58"
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
     *      @Parameter("purchase_details[0][id]", type="integer", description="采购详情id", required=false),
     *      @Parameter("purchase_details[0][product_specs_id]", type="integer", description="产品规格id", required=false),
     *      @Parameter("purchase_details[0][purchase_quantity]", type="integer", description="采购数", required=false),
     *      @Parameter("purchase_details[0][shops_id]", type="integer", description="采购店铺id", required=false),
     *      @Parameter("purchase_details[0][suppliers_id]", type="integer", description="供应商id", required=false),
     *      @Parameter("purchase_details[0][purchase_cost]", type="numeric", description="采购成本", required=false),
     *      @Parameter("purchase_details[0][purchase_freight]", type="numeric", description="采购运费", required=false),
     *      @Parameter("purchase_details[0][warehouse_cost]", type="numeric", description="仓库成本", required=false),
     *      @Parameter("purchase_details[0][commission]", type="numeric", description="金佣点", required=false),
     *      @Parameter("purchase_details[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("purchase_details[0][colour_num]", description="色号", required=false),
     *      @Parameter("purchase_details[0][paint]", description="油漆", required=false),
     *      @Parameter("purchase_details[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("purchase_details[0][arrival_time]", type="dateTime", description="到货时间", required=false),
     *      @Parameter("purchase_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "receiver": "收货人",
     *          "receiver_address": "收货地址",
     *          "warehouse_id": "1",
     *          "remark": "备注",
     *          "status": "1",
     *          "purchase_details[0][id]":1,
     *          "purchase_details[0][product_specs_id]":1,
     *          "purchase_details[0][purchase_quantity]":10,
     *          "purchase_details[0][shops_id]":1,
     *          "purchase_details[0][suppliers_id]":1,
     *          "purchase_details[0][purchase_cost]":10,
     *          "purchase_details[0][purchase_freight]":10,
     *          "purchase_details[0][warehouse_cost]":10,
     *          "purchase_details[0][commission]":10,
     *          "purchase_details[0][discount]":10,
     *          "purchase_details[0][colour_num]":"色号",
     *          "purchase_details[0][paint]":"油漆",
     *          "purchase_details[0][wooden_frame_costs]":10,
     *          "purchase_details[0][arrival_time]":"2018-6-10 00:00:00",
     *          "purchase_details[0][remark]":"备注",
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
     *          "id": 1,
     *          "purchase_order_no": "PO2018071718055128755",
     *          "purchase_status": "新建",
     *          "order_no": "",
     *          "user_id": 1,
     *          "receiver": "收货人1",
     *          "receiver_address": "收货地址1",
     *          "warehouse_id": "1",
     *          "promise_delivery_time": null,
     *          "salesman": "",
     *          "source": "",
     *          "client_name": "",
     *          "buyer_nick": "",
     *          "order_address": "",
     *          "is_submit": 0,
     *          "is_print": 0,
     *          "is_check": 0,
     *          "is_change": 0,
     *          "remark": "备注1",
     *          "status": "1",
     *          "created_at": "2018-07-17 18:05:51",
     *          "updated_at": "2018-07-17 18:33:06"
     *      })
     * })
     */
    public function update(PurchaseRequest $purchaseRequest,
                           PurchaseDetailRequest $purchaseDetailRequest,
                           Purchase $purchase,
                           \App\Handlers\ValidatedHandler $validatedHandler)
    {
        //判断是否提交
        if ($purchase->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $purchase = DB::transaction(function () use ($purchaseRequest,
                                                     $purchaseDetailRequest,
                                                     $purchase,
                                                     $validatedHandler) {

            $purchase->update($purchaseRequest->validated());

            if ($purchasedDetails = $purchaseRequest->input('purchase_details')) {

                foreach ($purchasedDetails as $purchasedDetail) {
                    //过滤出经过验证的数据
                    $data = $validatedHandler->getValidatedData($purchaseDetailRequest->rules(), $purchasedDetail);
                    //存在id则更新，否则插入
                    if (isset($purchasedDetail['id'])) {
                        $purchase->purchaseDetails->findOrFail($purchasedDetail['id'])->update($data);
                    } else {
                        $purchase->purchaseDetails()->create($data);
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
            $delPurDet = $purchase->purchaseDetails()->delete();

            //删除产品
            $delPur = $purchase->delete();

            if ($delPurDet === false || $delPur === false) {
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
            //删除采购单详情
            $delPurDet = PurchaseDetail::whereIn('purchases_id', $ids)->delete();

            //删除采购单
            $delPur = Purchase::destroy($ids);

            if ($delPurDet === false || $delPur === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->errorResponse(204);
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
        return $this->traitAction($purchase, !$purchase->status || !$purchase->is_submit || !$purchase->is_check || $purchase->is_print, '打印出错，是否未提交未审核或重复打印', 'print');
    }

    /**
     * 审核
     *
     * @PUT("/purchases/:id/check")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("is_check", type="integer", description="是否审核", required=true)})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "is_check": {
     *                  "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isCheck(Purchase $purchase)
    {
        return $this->traitAction($purchase, !$purchase->status || !$purchase->is_submit || $purchase->is_check, '审核出错，是否未提交或重复审核', 'check');
    }

}
