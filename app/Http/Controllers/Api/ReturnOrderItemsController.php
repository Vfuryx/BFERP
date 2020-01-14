<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Traits\CURDTrait;
use App\Models\ReturnOrderItem;

/**
 * 退货子单资源
 * @Resource("returnorderitems",uri="/api")
 */
class ReturnOrderItemsController extends Controller
{
    use CURDTrait;

    /**
     * 删除退货子单
     *
     * @Delete("/returnorderitems/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ReturnOrderItem $returnorderitem)
    {
        return $this->traitDestroy($returnorderitem);
    }
}
