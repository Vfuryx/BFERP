<?php

namespace App\Http\Controllers\Api;

use App\Models\ReturnOrder;

use App\Http\Requests\Api\AfterSaleReturnRequest;

use App\Transformers\ReturnOrderTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 售后退货资源
 * @Resource("aftersalereturns",uri="/api")
 */
class AfterSaleReturnsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = ReturnOrderTransformer::class;
    const MODEL = ReturnOrder::class;
    const PerPage = 8;

    /**
     * 删除售后退货
     *
     * @Delete("/aftersalereturns/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ReturnOrder $returnorder)
    {
        $this->traitDestroy($returnorder);
    }

    /**
     * 售后一审
     *
     * @PUT("/aftersalereturns/:id/oneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法售后一审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isOneAudit(ReturnOrder $returnorder)
    {
        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_CS_ONE_AUDIT,
            '无法售后一审', 'asOneAudit');
    }


    /**
     * 售后一审退审
     *
     * @PUT("/aftersalereturns/:id/unoneaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法售后一审退审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnOneAudit(ReturnOrder $returnorder)
    {
        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_AS_ONE_AUDIT,
            '无法售后一审退审', 'asUnOneAudit');
    }


    /**
     * 售后二审
     *
     * @PUT("/aftersalereturns/:id/twoaudit")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("person_liable_id", type="integer", description="责任人", required=true),
     *      @Parameter("liable_fee", type="numeric", description="责任金额", required=true),
     *      @Parameter("as_remark", description="售后备注", required=true),
     * })
     * @Request({
     *      "person_liable_id": 1,
     *      "liable_fee": 10,
     *      "as_remark": "售后备注",
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法售后一审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isTwoAudit(
        AfterSaleReturnRequest $request,
        ReturnOrder $returnorder
    ){
        if($returnorder->isUnWhAudit())
            throw new UpdateResourceFailedException('订单无法修改');

        $this->traitUpdate($request, $returnorder, self::TRANSFORMER);

        return $this->traitAction(
            $returnorder,
            !$returnorder->status,
            '无法售后二审', 'asTwoAudit'
        );
    }

    /**
     * 售后二审退审
     *
     * @PUT("/aftersalereturns/:id/untwoaudit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "无法售后一审退审",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isUnTwoAudit(ReturnOrder $returnorder)
    {
        return $this->traitAction(
            $returnorder,
            !$returnorder->status
            ||
            $returnorder->getOriginal('return_order_status') != $returnorder::RETURN_STATUS_AS_TWO_AUDIT,
            '无法售后二审退审', 'asUnTwoAudit');
    }






}
