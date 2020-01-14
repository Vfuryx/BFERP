<?php

namespace App\Http\Controllers\Api;

use App\Models\RefundOrder;

use App\Http\Requests\Api\AfterSaleRefundRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\RefundOrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 售后退款资源
 * @Resource("aftersalerefunds",uri="/api")
 */
class AfterSaleRefundsController extends Controller
{

    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = RefundOrderTransformer::class;
    const MODEL = RefundOrder::class;
    const PerPage = 8;

    /**
     * 获取所有售后退款
     *
     * @Get("/aftersalerefunds{?status}[&include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 1,
     *              "refund_sn": "RA2018090316285916495",
     *              "order_sn": "12345645",
     *              "refund_order_status": "售后锁定",
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
     *              "return_reasons_id": 1,
     *              "buyer_nick": "买家昵称",
     *              "buyer_name": "买家名称",
     *              "payment": "10.00",
     *              "person_liable": "责任人",
     *              "liable_fee": "10",
     *              "undertaker": "承担人",
     *              "business_remark": "业务备注",
     *              "as_remark": "售后备注",
     *              "f_remark": "",
     *              "refund_description": "退款说明",
     *              "taobao_refund_status": "",
     *              "creator_id": 1,
     *              "business_personnel_id": 1,
     *              "cs_audit_at": "2018-09-03 16:29:55",
     *              "locker_id": 1,
     *              "after_sales_id": 0,
     *              "as_audit_at": null,
     *              "financial_id": 0,
     *              "f_audit_at": null,
     *              "status": true,
     *              "created_at": "2018-09-03 16:28:59",
     *              "updated_at": "2018-09-03 16:30:38"
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
    public function index(AfterSaleRefundRequest $requset)
    {
        return $this->allOrPage($requset, self::MODEL, self::TRANSFORMER, self::PerPage);
    }

    /**
     * 显示单条售后退款
     *
     * @Get("/aftersalerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial,creator]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "refund_sn": "RA2018090316285916495",
     *          "order_sn": "12345645",
     *          "refund_order_status": "售后锁定",
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
     *          "return_reasons_id": 1,
     *          "buyer_nick": "买家昵称",
     *          "buyer_name": "买家名称",
     *          "payment": "10.00",
     *          "person_liable": "责任人",
     *          "liable_fee": "10",
     *          "undertaker": "承担人",
     *          "business_remark": "业务备注",
     *          "as_remark": "售后备注",
     *          "f_remark": "",
     *          "refund_description": "退款说明",
     *          "taobao_refund_status": "",
     *          "creator_id": 1,
     *          "business_personnel_id": 1,
     *          "cs_audit_at": "2018-09-03 16:29:55",
     *          "locker_id": 1,
     *          "after_sales_id": 0,
     *          "as_audit_at": null,
     *          "financial_id": 0,
     *          "f_audit_at": null,
     *          "status": true,
     *          "created_at": "2018-09-03 16:28:59",
     *          "updated_at": "2018-09-03 16:30:38"
     *      })
     * })
     */
    public function show(RefundOrder $refundorder)
    {
        return $this->traitShow($refundorder, self::TRANSFORMER);
    }

    /**
     * 修改售后退款
     *
     * @Patch("/aftersalerefunds/:id[?include=paymentMethod,shop,refundPaymentMethod,returnReason,businessPersonnel,locker,afterSale,financial,creator]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("person_liable", description="责任人", required=false),
     *      @Parameter("liable_fee", type="numeric", description="责任金额", required=false),
     *      @Parameter("freight", type="numeric", description="运费", required=false),
     *      @Parameter("undertaker", description="承担人", required=false),
     *      @Parameter("as_remark", description="售后备注", required=false),
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
     *          "id": 1,
     *          "refund_sn": "RA2018090316285916495",
     *          "order_sn": "12345645",
     *          "refund_order_status": "售后锁定",
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
     *          "return_reasons_id": 1,
     *          "buyer_nick": "买家昵称",
     *          "buyer_name": "买家名称",
     *          "payment": "10.00",
     *          "person_liable": "责任人",
     *          "liable_fee": "10",
     *          "undertaker": "承担人",
     *          "business_remark": "业务备注",
     *          "as_remark": "售后备注",
     *          "f_remark": "",
     *          "refund_description": "退款说明",
     *          "taobao_refund_status": "",
     *          "creator_id": 1,
     *          "business_personnel_id": 1,
     *          "cs_audit_at": "2018-09-03 16:29:55",
     *          "locker_id": 1,
     *          "after_sales_id": 0,
     *          "as_audit_at": null,
     *          "financial_id": 0,
     *          "f_audit_at": null,
     *          "status": true,
     *          "created_at": "2018-09-03 16:28:59",
     *          "updated_at": "2018-09-03 16:30:38"
     *      })
     * })
     */
    public function update(AfterSaleRefundRequest $request, RefundOrder $refundorder)
    {
        //锁定才能修改
        if ($refundorder->asUnlock())
            throw new UpdateResourceFailedException('订单未锁定无法修改');

        return $this->traitUpdate($request, $refundorder, self::TRANSFORMER);
    }

    /**
     * 删除售后退款
     *
     * @Delete("/aftersalerefunds/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={
     *          "id": 1,
     *          "refund_sn": "RA2018090316285916495",
     *          "order_sn": "12345645",
     *          "refund_order_status": "售后锁定",
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
     *          "return_reasons_id": 1,
     *          "buyer_nick": "买家昵称",
     *          "buyer_name": "买家名称",
     *          "payment": "10.00",
     *          "person_liable": "责任人",
     *          "liable_fee": "10",
     *          "undertaker": "承担人",
     *          "business_remark": "业务备注",
     *          "as_remark": "售后备注",
     *          "f_remark": "",
     *          "refund_description": "退款说明",
     *          "taobao_refund_status": "",
     *          "creator_id": 1,
     *          "business_personnel_id": 1,
     *          "cs_audit_at": "2018-09-03 16:29:55",
     *          "locker_id": 1,
     *          "after_sales_id": 0,
     *          "as_audit_at": null,
     *          "financial_id": 0,
     *          "f_audit_at": null,
     *          "status": true,
     *          "created_at": "2018-09-03 16:28:59",
     *          "updated_at": "2018-09-03 16:30:38"
     *     })
     * })
     */
    public function destroy(RefundOrder $refundorder)
    {
        $this->traitDestroy($refundorder);
    }

    /**
     * 删除一组售后退款
     *
     * @Delete("/aftersalerefunds")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="售后退款id组 格式: 1,2,3,4 ", required=true)
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
     * @PUT("/aftersalerefunds/:id/lockorunlock")
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
            (
                $refundorder->getOriginal('refund_order_status') >= $refundorder::REFUND_STATUS_AS_AUDIT
                ||
                $refundorder->getOriginal('refund_order_status') < $refundorder::REFUND_STATUS_CS_AUDIT
            )
            ,
            '无法锁定', 'asLockOrUnlock');
    }

    /**
     * 售后审核
     *
     * @PUT("/aftersalerefunds/:id/audit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "售后审核出错",
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
            $refundorder->getOriginal('refund_order_status') != $refundorder::REFUND_STATUS_AS_LOCK,
            '售后审核出错',
            'asAudit'
        );
    }

    /**
     * 售后退审
     *
     * @PUT("/aftersalerefunds/:id/unaudit")
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
            $refundorder->getOriginal('refund_order_status') != $refundorder::REFUND_STATUS_AS_AUDIT,
            '售后退审出错',
            'asUnAudit'
        );
    }


}
