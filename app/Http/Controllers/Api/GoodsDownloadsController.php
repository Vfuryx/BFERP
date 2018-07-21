<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\GoodsDownloadRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Models\GoodsDownload;

/**
 * 下载商品资源
 * @Resource("goodsdownloads",uri="/api")
 */
class GoodsDownloadsController extends Controller
{
//    protected const TRANSFORMER = CityInfoTransformer::class;
    protected const MODEL = GoodsDownload::class;

    /**
     * 获取所有下载商品
     *
     * @Get("/goodsdownloads")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("shop_id", type="integer", description="店铺id", required=true),
     *      @Parameter("dl_type",  description="下载类型 seller在售商品，inventory库存商品", required=true),
     *      @Parameter("commodity_code",  description="商品编码", required=false, default="all"),
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *        "PS": "安照erp做出界面，暂时还没数据"
     *      }
     *    }
     * })
     */
    public function index(GoodsDownloadRequest $request)
    {
        return $request->validated();
    }


}
