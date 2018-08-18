<?php

namespace App\Http\Controllers\Api;

use App\Transformers\PaymentMethodTransformer;
use Illuminate\Support\Facades\DB;

use App\Models\Order;

use App\Http\Requests\Api\CustomerServiceDepartmentRequset;
use App\Http\Requests\Api\PaymentDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\OrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;

use Dingo\Api\Exception\DeleteResourceFailedException;

/**
 * 客服部资源
 * @Resource("customerservicedepts",uri="/api")
 */
class CustomerServiceDepartmentsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = OrderTransformer::class;
    const MODEL = Order::class;
    const PerPage = 8;

    /**
     * 获取所有客服部
     *
     * @Get("/customerservicedepts{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     *       "data": {
     *       }
     * })
     */
    public function index(CustomerServiceDepartmentRequset $requset)
    {
        return $this->allOrPage($requset, self::MODEL, self::TRANSFORMER, self::PerPage);
    }


    /**
     * 新增客服部
     *
     * @Post("/customerservicedepts")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="客服部编码", required=true),
     *      @Parameter("jd_sn", description="京东编码", required=false),
     *      @Parameter("vips_sn", description="唯品会编码", required=false),
     *      @Parameter("factory_model", description="工厂型号", required=false),
     *      @Parameter("productspecs[0][height]", type="numeric", description="高度（mm）", required=false),
     * })
     * @Request({
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
     *          "id": 37,
     *          "system_order_no": "DD2018081818175193616",
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
     *          "business_personnel_id": 1,
     *          "locker_id": 0,
     *          "audit_at": null,
     *          "association_taobao_oid": "",
     *          "is_merge": false,
     *          "is_split": false,
     *          "is_association": false,
     *          "created_at": "2018-08-18 18:17:51",
     *          "updated_at": "2018-08-18 18:17:51",
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
     * @Get("/customerservicedepts/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改客服部
     *
     * @Patch("/customerservicedepts/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="客服部编码", required=false),
     *      @Parameter("jd_sn", description="京东编码", required=false),
     *      @Parameter("vips_sn", description="唯品会编码", required=false),
     *      @Parameter("factory_model", description="工厂型号", required=false),
     *      @Parameter("short_name", description="客服部简称", required=false),
     *      @Parameter("productspecs[0][finished_pro]", type="boolean", description="是否成品 0 不是 1 是", required=false),
     *      @Parameter("productspecs[0][is_stop_pro]", type="boolean", description="是否停产 0 不是 1 是", required=false),
     *      @Parameter("productspecs[0][combinations][0][id]", type="integer", description="组合id ( 存在 id 视为更新，不存在视为插入 )", required=false),
     *      @Parameter("productspecs[0][combinations][0][com_pro_specs_id]", type="integer", description="组合产品规格id", required=false),
     * })
     * @Request({
     *      "commodity_code": "客服部编码",
     *      "jd_sn": "京东编码",
     *      "category_id": 1,
     *      "remark": "备注",
     *      "title": "客服部标题",
     *      "img": "客服部图片",
     *      "url": "https://www.taobao.com/",
     *      "status": true,
     *      "nis_stop_proick": 1,
     *      "productspecs[0][id]":"2",
     *      "productspecs[0][spec_code]":"规格编码1",
     *      "productspecs[0][jd_specs_code]":"京东规格编码",
     *      "productspecs[0][vips_specs_code]":"唯品会规格编码",
     *      "productspecs[0][weight]":"10",
     *      "productspecs[0][remark]":"备注",
     *      "productspecs[0][finished_pro]":true,
     *      "productspecs[0][is_stop_pro]": false,
     *      "productspecs[0][combinations][0][id]":"2",
     *      "productspecs[0][combinations][0][com_pro_specs_id]":"1",
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "url": {
     *                  "客服部网址必须有效的url"
     *              },
     *              "category_id": {
     *                  "产品类别id必须int类型"
     *              },
     *              "category_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "supplier_id": {
     *                  "供应商id必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *      })
     * })
     */
    public function update(
        CustomerServiceDepartmentRequset $customerServiceDepartmentRequset,
        PaymentDetailRequest $paymentDetailRequest,
        Order $order,
        \App\Handlers\ValidatedHandler $validatedHandler)
    {
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
                    //存在id则更新，否则插入
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
                    //存在id则更新，否则插入
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
}
