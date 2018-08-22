<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Traits\ProcedureTrait;

/**
 * 跟单部资源
 * @Resource("merchandiserdepts",uri="/api")
 */
class MerchandiserDepartmentsController extends Controller
{
    use ProcedureTrait;

    const MODEL = Order::class;
    const PerPage = 8;

    /**
     * 跟单驳回
     *
     * @PUT("/merchandiserdepts/:id/unaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单驳回出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CS_AUDIT,
            '跟单驳回出错',
            'unAudit'
        );
    }

    /**
     * 跟单一审
     *
     * @PUT("/merchandiserdepts/:id/oneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单一审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isOneAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CS_AUDIT,
            '跟单一审出错',
            'oneAudit'
        );
    }


    /**
     * 跟单一审退审
     *
     * @PUT("/merchandiserdepts/:id/unoneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "跟单一审退审出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnOneAudit(Order $order)
    {
        return $this->traitAction(
            $order,
            !$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_ONE_AUDIT,
            '跟单一审退审出错',
            'unOneAudit'
        );
    }

}
