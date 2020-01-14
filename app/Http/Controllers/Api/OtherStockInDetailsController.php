<?php

namespace App\Http\Controllers\Api;

use App\Models\StockInDetail;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\StockInDetailTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 其他入库单详情资源
 * @Resource("otherstockindetails",uri="/api")
 */
class OtherStockInDetailsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = StockInDetailTransformer::class;
    const MODEL = StockInDetail::class;


    /**
     * 删除其他入库单详情
     *
     * @Delete("/otherstockindetails/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(StockInDetail $stockindetail)
    {

        return $this->traitDestroy($stockindetail);
    }

    /**
     * 删除一组其他入库单详情
     *
     * @Delete("/otherstockindetails")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="其他入库单详情id组 格式: 1,2,3,4 ", required=true)
     * })
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
