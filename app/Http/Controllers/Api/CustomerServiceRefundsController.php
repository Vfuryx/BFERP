<?php

namespace App\Http\Controllers\Api;

use App\Models\RefundOrder;

use App\Http\Requests\Api\CustomerServiceRefundRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\RefundOrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 客服退款资源
 * @Resource("customerservicerefunds",uri="/api")
 */
class CustomerServiceRefundsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = RefundOrderTransformer::class;
    const MODEL = RefundOrder::class;
    const PerPage = 8;

    /**
     * 获取所有客服退款
     *
     * @Get("/customerservicerefunds{?status}[&include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 1,
     *              "refund_sn": "RA2018090110411131562",
     *              "order_sn": "12345645",
     *              "refund_order_status": "未处理",
     *              "order_source": "system",
     *              "payment_methods_id": 1,
     *              "time_out_at": "2018-08-31 00:00:00",
     *              "shops_id": 1,
     *              "account": "10",
     *              "refund_payment_methods_id": 1,
     *              "bank": "开户银行",
     *              "address": "开户地址",
     *              "refund_amount": "10.00",
     *              "transaction_sn": "12345645",
     *              "refund_reasons_id": 1,
     *              "buyer_nick": "买家昵称",
     *              "buyer_name": "买家名称",
     *              "payment": "10.00",
     *              "business_remark": "业务备注",
     *              "as_remark": "",
     *              "f_remark": "",
     *              "refund_description": "退款说明",
     *              "taobao_refund_status": "",
     *              "creator_id": 1,
     *              "business_personnel_id": 0,
     *              "cs_audit_at": null,
     *              "locker_id": 0,
     *              "after_sales_id": 0,
     *              "as_audit_at": null,
     *              "financial_id": 0,
     *              "f_audit_at": null,
     *              "status": true,
     *              "created_at": "2018-09-01 10:41:11",
     *              "updated_at": "2018-09-01 10:41:11",
     *          }
     *       },
     *     "meta": {
     *          "pagination": {
     *              "total": 1,
     *              "count": 1,
     *              "per_page": 8,
     *              "current_page": 1,
     *              "total_pages": 1,
     *              "links": null
     *          }
     *      }
     * })
     */
    public function index(CustomerServiceRefundRequest $requset)
    {
        return $this->allOrPage($requset, self::MODEL, self::TRANSFORMER, self::PerPage);
    }

    /**
     * 新增客服退款(可选参数：include)
     *
     * @Post("/customerservicerefunds[?include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial,creator]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("order_sn", description="系统单号", required=false),
     *      @Parameter("payment_methods_id", type="integer", description="支付方式id", required=true),
     *      @Parameter("time_out_at", type="datetime", description="超时时间", required=true),
     *      @Parameter("shops_id", type="integer", description="还款账号", required=false),
     *      @Parameter("payment_methods_id", type="integer", description="还款支付方式id", required=true),
     *      @Parameter("bank", description="开户银行", required=false),
     *      @Parameter("address", description="开户地址", required=false),
     *      @Parameter("refund_amount", type="numeric", description="退款金额", required=false),
     *      @Parameter("transaction_sn", description="交易单号", required=false),
     *      @Parameter("refund_reasons_id", type="integer", description="退款原因id", required=true),
     *      @Parameter("buyer_nick", description="买家昵称", required=false),
     *      @Parameter("buyer_name", description="买家名称", required=false),
     *      @Parameter("payment", type="numeric", description="支付金额", required=false),
     *      @Parameter("business_remark", description="业务备注", required=false),
     *      @Parameter("refund_description", description="退款说明", required=false),
     *      @Parameter("status", type="boolean", description="状态", required=false),
     *     })
     * @Request({
     *      "order_sn":"12345645",
     *      "payment_methods_id":1,
     *      "time_out_at":"2018-8-31 00:00:00",
     *      "shops_id":1,
     *      "account":10,
     *      "refund_payment_methods_id":1,
     *      "bank":"开户银行",
     *      "address":"开户地址",
     *      "refund_amount":10,
     *      "transaction_sn":"12345645",
     *      "refund_reasons_id":1,
     *      "buyer_nick":"买家昵称",
     *      "buyer_name":"买家名称",
     *      "payment":10,
     *      "business_remark":"业务备注",
     *      "refund_description":"退款说明",
     *      "status":true,
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
     *          "id": 1,
     *          "refund_sn": "RA2018090110411131562",
     *          "order_sn": "12345645",
     *          "refund_order_status": "未处理",
     *          "order_source": "system",
     *          "payment_methods_id": 1,
     *          "time_out_at": "2018-08-31 00:00:00",
     *          "shops_id": 1,
     *          "account": "10",
     *          "refund_payment_methods_id": 1,
     *          "bank": "开户银行",
     *          "address": "开户地址",
     *          "refund_amount": "10.00",
     *          "transaction_sn": "12345645",
     *          "refund_reasons_id": 1,
     *          "buyer_nick": "买家昵称",
     *          "buyer_name": "买家名称",
     *          "payment": "10.00",
     *          "business_remark": "业务备注",
     *          "as_remark": "",
     *          "f_remark": "",
     *          "refund_description": "退款说明",
     *          "taobao_refund_status": "",
     *          "creator_id": 1,
     *          "business_personnel_id": 0,
     *          "cs_audit_at": null,
     *          "locker_id": 0,
     *          "after_sales_id": 0,
     *          "as_audit_at": null,
     *          "financial_id": 0,
     *          "f_audit_at": null,
     *          "status": true,
     *          "created_at": "2018-09-01 10:41:11",
     *          "updated_at": "2018-09-01 10:41:11",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(CustomerServiceRefundRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条客服退款
     *
     * @Get("/customerservicerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial,creator]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "refund_sn": "RA2018090110411131562",
     *          "order_sn": "12345645",
     *          "refund_order_status": "未处理",
     *          "order_source": "system",
     *          "payment_methods_id": 1,
     *          "time_out_at": "2018-08-31 00:00:00",
     *          "shops_id": 1,
     *          "account": "10",
     *          "refund_payment_methods_id": 1,
     *          "bank": "开户银行",
     *          "address": "开户地址",
     *          "refund_amount": "10.00",
     *          "transaction_sn": "12345645",
     *          "refund_reasons_id": 1,
     *          "buyer_nick": "买家昵称",
     *          "buyer_name": "买家名称",
     *          "payment": "10.00",
     *          "business_remark": "业务备注",
     *          "as_remark": "",
     *          "f_remark": "",
     *          "refund_description": "退款说明",
     *          "taobao_refund_status": "",
     *          "creator_id": 1,
     *          "business_personnel_id": 0,
     *          "cs_audit_at": null,
     *          "locker_id": 0,
     *          "after_sales_id": 0,
     *          "as_audit_at": null,
     *          "financial_id": 0,
     *          "f_audit_at": null,
     *          "status": true,
     *          "created_at": "2018-09-01 10:41:11",
     *          "updated_at": "2018-09-01 10:41:11",
     *      })
     * })
     */
    public function show(RefundOrder $refundorder)
    {
        return $this->traitShow($refundorder, self::TRANSFORMER);
    }

    /**
     * 修改客服退款
     *
     * @Patch("/customerservicerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,refundReason,businessPersonnel,locker,afterSale,financial,creator]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("order_sn", description="系统单号", required=false),
     *      @Parameter("payment_methods_id", type="integer", description="支付方式id", required=false),
     *      @Parameter("time_out_at", type="datetime", description="超时时间", required=false),
     *      @Parameter("shops_id", type="integer", description="还款账号", required=false),
     *      @Parameter("payment_methods_id", type="integer", description="还款支付方式id", required=false),
     *      @Parameter("bank", description="开户银行", required=false),
     *      @Parameter("address", description="开户地址", required=false),
     *      @Parameter("refund_amount", type="numeric", description="退款金额", required=false),
     *      @Parameter("transaction_sn", description="交易单号", required=false),
     *      @Parameter("refund_reasons_id", type="integer", description="退款原因id", required=false),
     *      @Parameter("buyer_nick", description="买家昵称", required=false),
     *      @Parameter("buyer_name", description="买家名称", required=false),
     *      @Parameter("payment", type="numeric", description="支付金额", required=false),
     *      @Parameter("business_remark", description="业务备注", required=false),
     *      @Parameter("refund_description", description="退款说明", required=false),
     *      @Parameter("status", type="boolean", description="状态", required=false),
     * })
     * @Request({
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "shops_id": {
     *                  "店铺id必填"
     *              },
     *           },
     *          "message": "还未锁定无法修改",
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          
     *      })
     * })
     */
    public function update(CustomerServiceRefundRequest $request, RefundOrder $refundorder)
    {
        //锁定才能修改
        if ($refundorder->unlock())
            throw new UpdateResourceFailedException('订单未锁定无法修改');

        return $this->traitUpdate($request, $refundorder, self::TRANSFORMER);
    }

    /**
     * 删除客服退款
     *
     * @Delete("/customerservicerefunds/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(RefundOrder $refundorder)
    {
        $this->traitDestroy($refundorder);
    }

    /**
     * 删除一组客服退款
     *
     * @Delete("/customerservicerefunds")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="客服退款id组 格式: 1,2,3,4 ", required=true)
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
        $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 锁定或释放
     *
     * @PUT("/customerservicerefunds/:id/lockorunlock")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法锁定",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isLockOrUnlock(RefundOrder $refundorder)
    {
        return $this->traitAction(
            $refundorder,
            !$refundorder->status
            ||
            $refundorder->getOriginal('refund_order_status') >= $refundorder::REFUND_STATUS_CS_AUDIT,
            '无法锁定', 'lockOrUnlock');
    }

    /**
     * 客审
     *
     * @PUT("/customerservicerefunds/:id/audit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "客审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isAudit(RefundOrder $refundorder)
    {
        return $this->traitAction(
            $refundorder,
            !$refundorder->status
            ||
            $refundorder->getOriginal('refund_order_status') != $refundorder::REFUND_STATUS_LOCK,
            '客审出错',
            'audit'
        );
    }

    /**
     * 退审
     *
     * @PUT("/customerservicerefunds/:id/unaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "退审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnAudit(RefundOrder $refundorder)
    {
        return $this->traitAction(
            $refundorder,
            !$refundorder->status
            ||
            $refundorder->getOriginal('refund_order_status') != $refundorder::REFUND_STATUS_CS_AUDIT,
            '退审出错',
            'unAudit'
        );
    }


}
