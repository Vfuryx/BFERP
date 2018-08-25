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
    const TRANSFORMER = WarehousingDepartmentTransformer::class;
    const PerPage = 8;

    /**
     * 显示仓储修改
     *
     * @Get("/warehousingdepts/:id[?include=logistic,distribution]")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 2,
     *          "logistics_id": 4,
     *          "logistics_sn": null,
     *          "actual_freight": null,
     *          "distributions_id": 1,
     *          "distribution_phone": "配送电话",
     *          "deliver_goods_fee": "10.00",
     *          "move_upstairs_fee": "10.00",
     *          "installation_fee": "10.00",
     *          "total_distribution_fee": "30.00",
     *          "receiver_name": "",
     *          "receiver_mobile": "",
     *          "logistic": {
     *              "id": 4,
     *              "code": "物流代码",
     *              "name": "物流名称",
     *              "report_id": 1,
     *              "expected_days": 1,
     *              "phone": "1",
     *              "address": "物流地址",
     *              "freight_type_id": 1,
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-23 14:22:29",
     *              "updated_at": "2018-08-23 16:39:22"
     *          },
     *          "distribution": {
     *              "id": 1,
     *              "name": "配送公司名称3",
     *              "phone": "配送公司电话",
     *              "address": "配送公司地址",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-08 16:15:57",
     *              "updated_at": "2018-08-08 16:21:59"
     *          }
     *      })
     * })
     */
    public function show(Order $order)
    {
        //是否已经货审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT)
            throw new ResourceException('未货审');

        return $this->response->item($order, self::TRANSFORMER);
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
     *          "id": 1,
     *          "logistics_id": "4",
     *          "logistics_sn": "123456",
     *          "actual_freight": "10.00",
     *          "distributions_id": "1",
     *          "distribution_phone": "123456",
     *          "deliver_goods_fee": "10",
     *          "move_upstairs_fee": "10",
     *          "installation_fee": "10",
     *          "total_distribution_fee": "30",
     *          "receiver_name": "收货人",
     *          "receiver_mobile": "123456",
     *          "logistic": {
     *              "id": 4,
     *              "code": "物流代码",
     *              "name": "物流名称",
     *              "report_id": 1,
     *              "expected_days": 1,
     *              "phone": "1",
     *              "address": "物流地址",
     *              "freight_type_id": 1,
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-23 14:22:29",
     *              "updated_at": "2018-08-23 16:39:22"
     *          },
     *          "distribution": {
     *              "id": 1,
     *              "name": "配送公司名称3",
     *              "phone": "配送公司电话",
     *              "address": "配送公司地址",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-08 16:15:57",
     *              "updated_at": "2018-08-08 16:21:59"
     *          }
     *      })
     * })
     */
    public function update(WarehousingDepartmentRequest $warehousingDepartmentRequest, Order $order)
    {
        //是否已经货审
        if(!$order->status || $order->getOriginal('order_status') != $order::ORDER_STATUS_CARGO_AUDIT)
            throw new ResourceException('未货审');

        return $this->traitUpdate($warehousingDepartmentRequest, $order, self::TRANSFORMER);
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

        return $this->traitAction($order, false, '仓储发货出错', 'stockOut');
    }

}
