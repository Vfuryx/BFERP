<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\PurchaseDetailTransformer;
use App\Models\PurchaseDetail;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 采购单详情资源
 * @Resource("purchasedetails",uri="/api")
 */
class PurchaseDetailsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = PurchaseDetailTransformer::class;
    const MODEL = PurchaseDetail::class;

    /**
     * 删除采购单详情
     *
     * @Delete("/purchasedetails/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PurchaseDetail $Purchasedetail)
    {
        return $this->traitDestroy($Purchasedetail);
    }

    /**
     * 删除一组采购单详情
     *
     * @Delete("/purchasedetails")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购单详情id组 格式: 1,2,3,4 ", required=true)})
     * @Transaction({
     *      @Response(500, body={
     *          "message": "删除错误",
     *          "code": 500,
     *          "status_code": 500,
     *      }),
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
        return $this->traitDestroybyIds($request, self::MODEL);
    }

}
