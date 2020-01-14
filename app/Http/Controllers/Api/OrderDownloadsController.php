<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderDownload;
use Illuminate\Http\Request;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Http\Requests\Api\OrderDownloadRequest;
/**
 * 订单下载资源
 * @Resource("orderdownloads",uri="/api")
 */
class OrderDownloadsController extends Controller
{

//    protected const TRANSFORMER = MarkColorTransformer::class;
    const MODEL = OrderDownload::class;

    /**
     * 获取所有订单下载
     *
     * @Get("/orderdownloads")
     * @Versions({"v1"})
     * @Parameters({
     *     @Parameter("shop_id", type="integer", description="交易编号", required=true),
     *     @Parameter("start_created", type="date", description="起始日期", required=true),
     *     @Parameter("end_created", type="date", description="结束日期", required=true),
     *     @Parameter("buyer_nick", description="买家昵称", required=false, default="all"),
     *     @Parameter("tid", type="integer", description="交易编号", required=false, default="all")
     * }),
     * @Response(200, body={
     * "data": {
     *      {
     *        "PS": "安照erp做出界面，暂时还没数据"
     *      }
     *    }
     * })
     */
    public function index(OrderDownloadRequest $request)
    {
        return $request->validated();
    }
}
