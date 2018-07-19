<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Purchase;
use App\Models\PurchaseDetail;

use App\Http\Requests\Api\PurchaseRequest;
use App\Http\Requests\Api\PurchaseDetailRequest;

use App\Transformers\PurchaseTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\StoreResourceFailedException;
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

    protected const TRANSFORMER = PurchaseTransformer::class;
    protected const MODEL = Purchase::class;

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
     *      @Parameter("purchase_status", description="采购状态", required=true),
     *      @Parameter("receiver", description="收货人", required=true),
     *      @Parameter("receiver_address", description="收货地址", required=true),
     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status", type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     *      @Parameter("purchase_details", type="json", description="采购单详情", required=false),
     * })
     * @Request({
     *     {
     *          "purchase_status": "新建",
     *          "receiver": "收货人",
     *          "receiver_address": "收货地址",
     *          "warehouse_id": "1",
     *          "remark": "备注",
     *          "status": "1",
     *          "created_at": "2018-07-17 18:05:51",
     *          "updated_at": "2018-07-17 18:05:51",
     *          "purchase_details": {
     *              {
     *                  "product_specs_id": "2",
     *                  "purchase_quantity": "10",
     *                  "shops_id": "1",
     *                  "suppliers_id": "1",
     *                  "purchase_cost": "10",
     *                  "purchase_freight": "10",
     *                  "warehouse_cost": "10",
     *                  "commission": "10",
     *                  "discount": "10",
     *                  "colour_num": "色号",
     *                  "paint": "油漆",
     *                  "arrival_time": "2018-6-10 00:00:00",
     *                  "remark": "备注"
     *              },
     *              {
     *                  "product_specs_id": "2",
     *                  "purchase_quantity": "10",
     *                  "shops_id": "1",
     *                  "suppliers_id": "1",
     *                  "purchase_cost": "10",
     *                  "purchase_freight": "10",
     *                  "warehouse_cost": "10",
     *                  "commission": "10",
     *                  "discount": "10",
     *                  "colour_num": "色号",
     *                  "paint": "油漆",
     *                  "arrival_time": "2018-6-10 00:00:00",
     *                  "remark": "备注"
     *              }
     *          }
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
    public function store(PurchaseRequest $purchaseRequest, PurchaseDetailRequest $purchaseDetailRequest)
    {
        DB::beginTransaction();
        try {
            $date = $purchaseRequest->validated();
            $date['user_id'] = 1;//后期要更改
            //PR:Purchase Request Form 采购申请单,公司内部使用;
            //PO:Purchase Order Form 采购订单,公司对外使用。
            $date['purchase_order_no'] = 'PO' . date('YmdHis') . str_pad(mt_rand(1, 99999), 5, 0, STR_PAD_LEFT);

            $purchase = Purchase::create($date);

            if ($purchasedDetails = $purchaseRequest->input('purchase_details')) {

                $purchasedDetails = json_decode($purchasedDetails, true);

                foreach ($purchasedDetails as $purchasedDetail) {

                    $validator = Validator::make($purchasedDetail, $purchaseDetailRequest->rules(), $purchaseDetailRequest->messages());

                    if ($validator->fails()) {
                        throw new StoreResourceFailedException('The given data was invalid.', $validator->errors());
                    }

                    $data = array_intersect_key($validator->getData(), $validator->getRules());

                    $purchase->purchaseDetails()->create($data);
                }
            }
            DB::commit();
        } catch (StoreResourceFailedException $e) {
            DB::rollback();
            throw $e;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

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
     * 修改城市信息
     *
     * @Patch("/purchases/:id")
     * @Versions({"v1"})
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
    public function update(PurchaseRequest $purchaseRequest, PurchaseDetailRequest $purchaseDetailRequest, Purchase $purchase)
    {
        DB::beginTransaction();
        try {
            $purchase::update($purchaseRequest->validated());

            if ($purchasedDetails = $purchaseRequest->input('purchase_details')) {
                $purchasedDetails = json_decode($purchasedDetails, true);
                foreach ($purchasedDetails as $purchasedDetail) {
                    //验证purchasedDetail数据
                    $validator = Validator::make($purchasedDetail, $purchaseDetailRequest->rules(), $purchaseDetailRequest->messages());
                    if ($validator->fails()) {
                        throw new UpdateResourceFailedException('The given data was invalid.', $validator->errors());
                    }
                    //过滤出经过验证的数据
                    $data = array_intersect_key($validator->getData(), $validator->getRules());

                    //存在id则更新，否则插入
                    if(isset($purchasedDetail['id'])){
                        PurchaseDetail::findOrFail($purchasedDetail['id'])->update($data);
                    }else{
                        $purchase->purchaseDetails()->create($data);
                    }
                }
            }
            DB::commit();
        } catch (UpdateResourceFailedException $e) {
            DB::rollback();
            throw $e;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

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
    public function destroy(Purchase $Purchase)
    {
        DB::beginTransaction();
        try {
            //删除规格
            $delPurDet = $Purchase->purchaseDetails()->delete();

            //删除产品
            $delPur = $Purchase->delete();

            if ($delPurDet === false || $delPur === false ) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }

            DB::commit();
        } catch (DeleteResourceFailedException $e) {
            DB::rollback();
            throw $e;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

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
    public function destroybyIds(PurchaseRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            //删除采购单详情
            $delPurDet = PurchaseDetail::whereIn('purchases_id',$ids)->delete();

            //删除采购单
            $delPur = Purchase::destroy($ids);

            if ($delPurDet === false || $delPur === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }

            DB::commit();
        } catch (DeleteResourceFailedException $e) {
            DB::rollback();
            throw $e;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return $this->errorResponse(204);
    }

    /**
     * 更改一组采购单状态
     *
     * @PUT("/purchases")
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
    public function editStatusByIds(PurchaseRequest $request)
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
    public function isSubmit(PurchaseRequest $request, Purchase $purchase)
    {
        return $this->traitIsSubmit($request, $purchase);
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
    public function isPrint(PurchaseRequest $request, Purchase $purchase)
    {
        return $this->traitIsPrint($request, $purchase);
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
    public function isCheck(PurchaseRequest $request, Purchase $purchase)
    {
        return $this->traitIsCheck($request, $purchase);
    }

}
