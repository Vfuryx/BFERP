<?php

namespace App\Http\Controllers\Api;

use App\Models\PurchaseList;
use App\Http\Requests\Api\DestroyRequest;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 采购清单资源
 * @Resource("purchaselists",uri="/api")
 */
class PurchaseListsController extends Controller
{
    use CURDTrait;

    const MODEL = PurchaseList::class;

    /**
     * 删除采购清单
     *
     * @Delete("/purchaselists/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PurchaseList $purchaselist)
    {
        $this->traitJoint2Destroy($purchaselist,'purchaseDetails');
    }

    /**
     * 删除一组采购清单
     *
     * @Delete("/purchaselists")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="采购清单id组 格式: 1,2,3,4 ", required=true)})
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
        $this->traitJoint2DestroybyIds($request->input('ids'),'purchaseDetails',self::MODEL);
    }

}
