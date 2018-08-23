<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CityInfoRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\CityInfoTransformer;
use App\Models\CityInfo;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 城市信息资源
 * @Resource("cityinfos",uri="/api")
 */
class CityInfosController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = CityInfoTransformer::class;
    const MODEL = CityInfo::class;

    /**
     * 获取所有城市信息
     *
     * @Get("/cityinfos[?status=true&include=logistics]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "logistics": {
     *              "id": 1,
     *              "code": "物流代码1",
     *              "name": "物流名称1",
     *              "report_id": 1,
     *              "logistics_area_id": 1,
     *              "expected_days": 1,
     *              "phone": "1333333333",
     *              "address": "物流地址",
     *              "freight_type_id": 1,
     *              "remark": "",
     *              "status": true,
     *              "created_at": "2018-07-02 17:40:39",
     *              "updated_at": "2018-07-02 17:40:42"
     *          },
     *          "province": "省",
     *          "city": "市",
     *          "district": "区",
     *          "address": "提货地址",
     *          "phone": "13333333333",
     *          "price": "100.00",
     *          "weight_univalent": "100.00",
     *          "expected_days": 1,
     *          "route": 1,
     *          "is_free_shipping": true,
     *          "remark": "1",
     *          "status": true,
     *          "created_at": "2018-07-02 17:44:32",
     *          "updated_at": "2018-07-02 17:44:32"
     *      },
     *      {
     *          "id": 2,
     *          "logistics": {
     *              "id": 1,
     *              "code": "物流代码1",
     *              "name": "物流名称1",
     *              "report_id": 1,
     *              "logistics_area_id": 1,
     *              "expected_days": 1,
     *              "phone": "1333333333",
     *              "address": "物流地址",
     *              "freight_type_id": 1,
     *              "remark": "",
     *              "status": true,
     *              "created_at": "2018-07-02 17:40:39",
     *              "updated_at": "2018-07-02 17:40:42"
     *          },
     *          "province": "省2",
     *          "city": "市2",
     *          "district": "区2",
     *          "address": "提货地址2",
     *          "phone": "13333333333",
     *          "price": "100.00",
     *          "weight_univalent": "100.00",
     *          "expected_days": 1,
     *          "route": 1,
     *          "is_free_shipping": true,
     *          "remark": "1",
     *          "status": true,
     *          "created_at": "2018-07-02 17:58:56",
     *          "updated_at": "2018-07-02 17:58:56"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(CityInfoRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 显示单条城市信息
     *
     * @Get("/cityinfos/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "logistics": {
     *              "id": 1,
     *              "code": "物流代码1",
     *              "name": "物流名称1",
     *              "report_id": 1,
     *              "logistics_area_id": 1,
     *              "expected_days": 1,
     *              "phone": "1333333333",
     *              "address": "物流地址",
     *              "freight_type_id": 1,
     *              "remark": "",
     *              "status": true,
     *              "created_at": "2018-07-02 17:40:39",
     *              "updated_at": "2018-07-02 17:40:42"
     *          },
     *          "province": "省",
     *          "city": "市",
     *          "district": "区",
     *          "address": "提货地址",
     *          "phone": "13333333333",
     *          "price": "100.00",
     *          "weight_univalent": "100.00",
     *          "expected_days": 1,
     *          "route": 1,
     *          "is_free_shipping": true,
     *          "remark": "1",
     *          "status": true,
     *          "created_at": "2018-07-02 17:44:32",
     *          "updated_at": "2018-07-02 17:44:32"
     *      })
     * })
     */
    public function show(CityInfo $cityinfo)
    {
        return $this->traitShow($cityinfo, self::TRANSFORMER);
    }

    /**
     * 删除城市信息
     *
     * @Delete("/cityinfos/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(CityInfo $cityinfo)
    {
        return $this->traitDestroy($cityinfo);
    }

    /**
     * 删除一组城市信息
     *
     * @Delete("/cityinfos")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="城市信息id组 格式: 1,2,3,4 ", required=true)})
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
     * 更改一组城市信息状态
     * 
     * @PUT("/cityinfos/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="城市信息id组 格式: 1,2,3,4 ", required=true),
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
