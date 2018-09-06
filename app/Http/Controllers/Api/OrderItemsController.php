<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Traits\CURDTrait;
use App\Models\OrderItem;

/**
 * 子订单资源
 * @Resource("orderitems",uri="/api")
 */
class OrderItemsController extends Controller
{
    use CURDTrait;

    const MODEL = OrderItem::class;
    
    /**
     * 删除子订单
     *
     * @Delete("/orderitems/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(OrderItem $orderitem)
    {
        return $this->traitDestroy($orderitem);
    }
}
