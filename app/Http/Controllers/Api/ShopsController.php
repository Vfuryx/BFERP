<?php

namespace App\Http\Controllers\Api;

use App\Models\Shop;
use App\Http\Requests\Api\ShopRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\ShopTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 店铺资源
 * @Resource("shops",uri="/api")
 */
class ShopsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = ShopTransformer::class;
    const MODEL = Shop::class;

    /**
     * 获取所有店铺
     *
     * @Get("/shops[?status=true&include=warehouse,platform]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "nick": "卖家昵称",
     *          "title": "店铺标题",
     *          "session_key": "SessionKey",
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称1",
     *              "province": "仓库地（省）1",
     *              "city": "仓库地（市）1",
     *              "district": "仓库地（区）1",
     *              "address": "仓库地（地址）1",
     *              "is_default": true,
     *              "status": true,
     *              "created_at": "2018-07-05 10:49:24",
     *              "updated_at": "2018-07-05 10:49:24"
     *          },
     *          "shop_account": "店铺账号1",
     *          "shop_passwd": "店铺密码1",
     *          "rebate": "10.00",
     *          "principal": "店铺负责人1",
     *          "principal_mobile": "负责人电话1",
     *          "province": "发货地（省）1",
     *          "city": "发货地（市）1",
     *          "district": "发货地（区）",
     *          "address": "发货地（地址）",
     *          "gross_profit_rate": "10.00",
     *          "platform": {
     *              "id": 1,
     *              "name": "平台类型名称1",
     *              "status": true,
     *              "created_at": "2018-07-05 10:49:30",
     *              "updated_at": "2018-07-05 10:49:30"
     *          },
     *          "is_waybill": true,
     *          "status": true,
     *          "created_at": "2018-07-05 10:49:44",
     *          "updated_at": "2018-07-05 10:49:44"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 1,
     *             "count": 1,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(ShopRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增店铺
     *
     * @Post("/shops")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("nick", description="卖家昵称", required=true),
     *      @Parameter("title", description="店铺标题", required=true),
     *      @Parameter("session_key", description="SessionKey", required=true),
     *      @Parameter("warehouse_id",type="integer", description="默认仓库", required=true),
     *      @Parameter("shop_account", description="店铺账号", required=true),
     *      @Parameter("shop_passwd", description="店铺密码", required=true),
     *      @Parameter("rebate", description="返点（%）", required=true),
     *      @Parameter("principal", description="店铺负责人", required=true),
     *      @Parameter("principal_mobile", description="负责人电话", required=true),
     *      @Parameter("province", description="发货地（省）", required=true),
     *      @Parameter("city", description="发货地（市）", required=true),
     *      @Parameter("district", description="发货地（区）", required=true),
     *      @Parameter("address", description="发货地（地址）", required=true),
     *      @Parameter("gross_profit_rate", description="毛利率（%）", required=true),
     *      @Parameter("platform_id",type="integer", description="平台类型", required=true),
     *      @Parameter("is_waybill",type="boolean", description="电子面单", required=false,default=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "warehouse_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "platform_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "nick": "卖家昵称",
     *          "title": "店铺标题",
     *          "session_key": "SessionKey",
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称1",
     *              "province": "仓库地（省）1",
     *              "city": "仓库地（市）1",
     *              "district": "仓库地（区）1",
     *              "address": "仓库地（地址）1",
     *              "is_default": true,
     *              "status": true,
     *              "created_at": "2018-07-05 10:49:24",
     *              "updated_at": "2018-07-05 10:49:24"
     *          },
     *          "shop_account": "店铺账号",
     *          "shop_passwd": "店铺密码",
     *          "rebate": "10.00",
     *          "principal": "店铺负责人",
     *          "principal_mobile": "负责人电话",
     *          "province": "发货地（省）",
     *          "city": "发货地（市）",
     *          "district": "发货地（区）",
     *          "address": "发货地（地址）",
     *          "gross_profit_rate": "10.00",
     *          "platform": {
     *              "id": 1,
     *              "name": "平台类型名称1",
     *              "status": true,
     *              "created_at": "2018-07-05 10:49:30",
     *              "updated_at": "2018-07-05 10:49:30"
     *          },
     *          "is_waybill": true,
     *          "status": true,
     *          "created_at": "2018-07-05 10:49:44",
     *          "updated_at": "2018-07-05 10:49:44",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(ShopRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条店铺
     *
     * @Get("/shops/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "店铺名称",
     *          "session_key": "SessionKey",
     *          "warehouse": {
     *              "id": 4,
     *              "name": "仓库名称4",
     *              "province": "仓库地（省）4",
     *              "city": "仓库地（市）4",
     *              "district": "仓库地（区）4",
     *              "address": "仓库地（地址）4",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-04 10:26:13",
     *              "updated_at": "2018-07-04 10:48:23"
     *          },
     *          "shop_account": "店铺账号",
     *          "shop_passwd": "店铺密码",
     *          "rebate": "10.00",
     *          "principal": "店铺负责人",
     *          "principal_mobile": "负责人电话",
     *          "province": "发货地（省）",
     *          "city": "发货地（市）",
     *          "district": "发货地（区）",
     *          "address": "发货地（地址）",
     *          "gross_profit_rate": "10.00",
     *          "platform": {
     *              "id": 1,
     *              "name": "平台名称1",
     *              "status": true,
     *              "created_at": "2018-07-04 12:54:52",
     *              "updated_at": "2018-07-04 12:54:55"
     *          },
     *          "is_waybill": true,
     *          "status": true,
     *          "created_at": "2018-07-04 12:56:57",
     *          "updated_at": "2018-07-04 12:56:57"
     *      })
     * })
     */
    public function show(Shop $shop)
    {
        return $this->traitShow($shop, self::TRANSFORMER);
    }

    /**
     * 修改店铺
     *
     * @Patch("/shops/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "warehouse_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "platform_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "nick": "卖家昵称",
     *          "title": "店铺标题",
     *          "session_key": "SessionKey",
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称1",
     *              "province": "仓库地（省）1",
     *              "city": "仓库地（市）1",
     *              "district": "仓库地（区）1",
     *              "address": "仓库地（地址）1",
     *              "is_default": true,
     *              "status": true,
     *              "created_at": "2018-07-05 10:49:24",
     *              "updated_at": "2018-07-05 10:49:24"
     *          },
     *          "shop_account": "店铺账号10",
     *          "shop_passwd": "店铺密码10",
     *          "rebate": "10.00",
     *          "principal": "店铺负责人10",
     *          "principal_mobile": "负责人电话10",
     *          "province": "发货地（省）10",
     *          "city": "发货地（市）10",
     *          "district": "发货地（区）10",
     *          "address": "发货地（地址）10",
     *          "gross_profit_rate": "10.00",
     *          "platform": {
     *              "id": 1,
     *              "name": "平台类型名称1",
     *              "status": true,
     *              "created_at": "2018-07-05 10:49:30",
     *              "updated_at": "2018-07-05 10:49:30"
     *          },
     *          "is_waybill": true,
     *          "status": true,
     *          "created_at": "2018-07-05 10:49:44",
     *          "updated_at": "2018-07-05 10:49:44"
     *      })
     * })
     */
    public function update(ShopRequest $request, Shop $shop)
    {
        return $this->traitUpdate($request, $shop, self::TRANSFORMER);
    }

    /**
     * 删除店铺
     *
     * @Delete("/shops/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Shop $shop)
    {
        return $this->traitDestroy($shop);
    }

    /**
     * 删除一组店铺
     *
     * @Delete("/shops")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="店铺id组 格式: 1,2,3,4 ", required=true)
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

    /**
     * 更改一组店铺状态
     * 
     * @PUT("/shops/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="店铺id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=true),
     * })
     * @Transaction({
     *      @Response(500, body={
     *          "message": "更改错误",
     *          "code": 500,
     *          "status_code": 500,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "ids": {
     *                  "id组必填"
     *              },
     *              "status": {
     *                  "状态必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function editStatusByIds(EditStatuRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

}
