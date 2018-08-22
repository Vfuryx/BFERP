<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Traits\ProcedureTrait;

/**
 * 财务部资源
 * @Resource("financialdepts",uri="/api")
 */
class FinancialDepartmentsController extends Controller
{
    use ProcedureTrait;

    const MODEL = Order::class;
    const PerPage = 8;

    /**
     * 财务驳回
     *
     * @PUT("/financialdepts/:id/reject")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "财务驳回出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isReject(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_ONE_AUDIT,
            '财务驳回出错',
            'unOneAudit'
        );
    }


    /**
     * 财审
     *
     * @PUT("/financialdepts/:id/financialaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "财审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isFinancialAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_ONE_AUDIT,
            '财审出错',
            'financialAudit'
        );
    }




    /**
     * 退回财审
     *
     * @PUT("/financialdepts/:id/unfinancialaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "退回财审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnFinancialAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_FD_AUDIT,
            '退回财审出错',
            'unFinancialAudit'
        );
    }

}
