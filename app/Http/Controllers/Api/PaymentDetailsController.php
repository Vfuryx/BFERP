<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FDPaymentDetailRequest;

use App\Http\Controllers\Traits\CURDTrait;
use App\Models\PaymentDetail;
use App\Transformers\PaymentDetailTransformer;

/**
 * 支付明细资源
 * @Resource("financialdepts",uri="/api")
 */
class PaymentDetailsController extends Controller
{
    use CURDTrait;

    const MODEL = PaymentDetail::class;
    const TRANSFORMER = PaymentDetailTransformer::class;
    const PerPage = 8;

    /**
     * 新增支付明细
     * @Post("/paymentdetails[?include=order,paymentMethod]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("orders_id", type="integer", description="订单id", required=true),
     *      @Parameter("payment_methods_id", type="integer", description="支付方式id", required=true),
     *      @Parameter("payment", type="numeric", description="支付金额", required=false),
     *      @Parameter("taobao_tid", description="交易号", required=false),
     *      @Parameter("taobao_oid", description="子订单编号", required=false),
     *      @Parameter("pay_time", type="datetime", description="付款时间", required=false),
     *      @Parameter("remark", description="备注", required=true),
     * })
     * @Request({
     *     "orders_id": 1,
     *     "payment_methods_id": 1,
     *     "payment": 100,
     *     "taobao_tid": "123456",
     *     "taobao_oid": "123456",
     *     "pay_time": "2018-8-18 00:00:00",
     *     "remark": "备注",
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "orders_id": {
     *                  "支付明细id必须为int类型"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "orders_id": 1,
     *          "payment_methods_id": 1,
     *          "payment": "100.00",
     *          "taobao_tid": 123456,
     *          "taobao_oid": 123456,
     *          "pay_time": "2018-08-18",
     *          "remark": "备注",
     *          "created_at": "2018-08-29 17:19:21",
     *          "updated_at": "2018-08-29 17:19:21",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(FDPaymentDetailRequest $FDPaymentDetailRequest)
    {
        return $this->traitStore($FDPaymentDetailRequest->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 更新支付明细
     * @Patch("/paymentdetails[?include=order,paymentMethod]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("orders_id", type="integer", description="订单id", required=true),
     *      @Parameter("payment_methods_id", type="integer", description="支付方式id", required=true),
     *      @Parameter("payment", type="numeric", description="支付金额", required=true),
     *      @Parameter("taobao_tid", description="交易号", required=true),
     *      @Parameter("taobao_oid", description="子订单编号", required=true),
     *      @Parameter("pay_time", type="datetime", description="付款时间", required=true),
     *      @Parameter("remark", description="备注", required=true),
     * })
     * @Request({
     *     "orders_id": 1,
     *     "payment_methods_id": 1,
     *     "payment": 100,
     *     "taobao_tid": "123456",
     *     "taobao_oid": "123456",
     *     "pay_time": "2018-8-18 00:00:00",
     *     "remark": "备注",
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "orders_id": {
     *                  "支付明细id必须为int类型"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "orders_id": 1,
     *          "payment_methods_id": 1,
     *          "payment": "100.00",
     *          "taobao_tid": 123456,
     *          "taobao_oid": 123456,
     *          "pay_time": "2018-08-18",
     *          "remark": "备注",
     *          "created_at": "2018-08-29 17:19:21",
     *          "updated_at": "2018-08-29 17:19:21",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function update(FDPaymentDetailRequest $FDPaymentDetailRequest, PaymentDetail $paymentdetail)
    {
        return $this->traitUpdate($FDPaymentDetailRequest, $paymentdetail, self::TRANSFORMER);
    }

    /**
     * 删除支付明细
     *
     * @Delete("/paymentdetails/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PaymentDetail $paymentdetail)
    {
        return $this->traitDestroy($paymentdetail);
    }
}
