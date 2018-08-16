<?php

namespace App\Http\Controllers\Api;

use App\Models\TakeDeliveryGoodsWay;

use App\Http\Requests\Api\TakeDeliveryGoodsWayRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\TakeDeliveryGoodsWayTransformer;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 提货方式资源
 * @Resource("takedeliverygoodsways",uri="/api")
 */
class TakeDeliveryGoodsWaysController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = TakeDeliveryGoodsWayTransformer::class;
    const MODEL = TakeDeliveryGoodsWay::class;

    /**
     * 获取所有提货方式
     *
     * @Get("/takedeliverygoodsways{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "提货方式",
     *             "status": true,
     *             "created_at": "2018-06-14 16:55:32",
     *             "updated_at": "2018-06-14 16:55:32"
     *
     *         },
     *         {
     *             "id": 2,
     *             "name": "提货方式2",
     *             "status": true,
     *             "created_at": "2018-06-14 16:55:36",
     *             "updated_at": "2018-06-14 16:55:36"
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/takedeliverygoodsways?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(TakeDeliveryGoodsWayRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增提货方式
     *
     * @Post("/takedeliverygoodsways")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="提货方式名称", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "提货方式名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "提货方式",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:40",
     *          "updated_at": "2018-06-14 16:55:40",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(TakeDeliveryGoodsWayRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条提货方式
     *
     * @Get("/takedeliverygoodsways/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "提货方式",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:55:32"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }


    /**
     * 修改提货方式
     *
     * @Patch("/takedeliverygoodsways/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "提货方式名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "提货方式10",
     *          "status": true,
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:58:55"
     *      })
     * })
     */
    public function update(TakeDeliveryGoodsWayRequest $request, TakeDeliveryGoodsWay $takedeliverygoodsway)
    {
        return $this->traitUpdate($request, $takedeliverygoodsway, self::TRANSFORMER);
    }

    /**
     * 删除提货方式
     *
     * @Delete("/takedeliverygoodsways/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(TakeDeliveryGoodsWay $takedeliverygoodsway)
    {
        return $this->traitDestroy($takedeliverygoodsway);
    }

    /**
     * 删除一组提货方式
     *
     * @Delete("/takedeliverygoodsways")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="提货方式id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组提货方式状态
     *
     * @PUT("/takedeliverygoodsways/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="提货方式id组 格式: 1,2,3,4 ", required=true),
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
