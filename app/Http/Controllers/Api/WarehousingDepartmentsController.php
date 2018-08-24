<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;

use App\Http\Requests\Api\WarehousingDepartmentRequest;
use App\Transformers\WarehousingDepartmentTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;
use Dingo\Api\Exception\ResourceException;

/**
 * 跟单部资源
 * @Resource("warehousingdepts",uri="/api")
 */
class WarehousingDepartmentsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const MODEL = Order::class;
    const TRANSFORMER = OrderTransformer::class;
    const PerPage = 8;

    /**
     * 显示仓储修改
     *
     * @Get("/warehousingdepts/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *      })
     * })
     */
    public function show(Order $order)
    {
        //是否已经货审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT)
            throw new ResourceException('未货审');

        return $this->response->item($order, WarehousingDepartmentTransformer::class);
    }

    /**
     * 仓储修改
     *
     * @Get("/warehousingdepts/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *
     *      })
     * })
     */
    public function update(WarehousingDepartmentRequest $warehousingDepartmentRequest, Order $order)
    {
        //是否已经货审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT)
            throw new ResourceException('未货审');

        return $this->traitUpdate($warehousingDepartmentRequest,$order,WarehousingDepartmentTransformer::class);
    }

    /**
     * 仓储发货
     *
     * @PUT("/warehousingdepts/:id/stockout")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "仓储发货出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isStockOut(Order $order)
    {
        //是否已经货审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT)
            throw new UpdateResourceFailedException('仓储发货出错');

        //发货---减少库存---新增出库单

        return $this->traitAction($order, false, '仓储发货出错', 'stockOut');
    }

}
