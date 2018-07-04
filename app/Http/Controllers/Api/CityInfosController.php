<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CityInfoRequest;
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

    protected const TRANSFORMER = CityInfoTransformer::class;
    protected const MODEL = CityInfo::class;
    
    /**
     * 获取所有城市信息
     *
     * @Get("/cityinfos{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
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
     *              "status": 1,
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
     *          "is_free_shipping": 1,
     *          "remark": "1",
     *          "status": 1,
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
     *              "status": 1,
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
     *          "is_free_shipping": 1,
     *          "remark": "1",
     *          "status": 1,
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
     * 新增城市信息
     *
     * @Post("/cityinfos")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("logistics_id",type="integer", description="物流id", required=true),
     *      @Parameter("province", description="省", required=true),
     *      @Parameter("city", description="市", required=true),
     *      @Parameter("district", description="区", required=true),
     *      @Parameter("address", description="提货地址", required=true),
     *      @Parameter("phone", description="提货电话", required=true),
     *      @Parameter("price",type="numeric" description="物流费用", required=true),
     *      @Parameter("weight_univalent",type="numeric" description="重量单价", required=true),
     *      @Parameter("expected_days",type="integer", description="城市到达天数", required=ture),
     *      @Parameter("route",type="integer", description="中转或直达：0=中转，1=直达", required=false, default=1),
     *      @Parameter("is_free_shipping",type="integer", description="是否包邮", required=false, default=0),
     *      @Parameter("remark", description="费用类别备注", required=false),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "logistics_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "code": {
     *                  "费用代码不能重复"
     *              },
     *              "price": {
     *                  "物流费用必须是数字"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
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
     *              "status": 1,
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
     *          "expected_days": "1",
     *          "route": "1",
     *          "is_free_shipping": "1",
     *          "remark": "1",
     *          "status": "1",
     *          "created_at": "2018-07-02 17:44:32",
     *          "updated_at": "2018-07-02 17:44:32",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(CityInfoRequest $request)
    {
        return $this->traitStore($request, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条城市信息
     *
     * @Post("/cityinfos/:id")
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
     *              "status": 1,
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
     *          "is_free_shipping": 1,
     *          "remark": "1",
     *          "status": 1,
     *          "created_at": "2018-07-02 17:44:32",
     *          "updated_at": "2018-07-02 17:44:32"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改城市信息
     *
     * @Patch("/cityinfos/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "code": {
     *                  "费用代码不能重复"
     *               },
     *              "logistics_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *               },
     *              "price": {
     *                  "物流费用必须是数字"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
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
     *              "status": 1,
     *              "created_at": "2018-07-02 17:40:39",
     *              "updated_at": "2018-07-02 17:40:42"
     *          },
     *          "province": "省5",
     *          "city": "市5",
     *          "district": "区5",
     *          "address": "提货地址5",
     *          "phone": "13333333333",
     *          "price": "100.00",
     *          "weight_univalent": "100.00",
     *          "expected_days": "1",
     *          "route": "1",
     *          "is_free_shipping": "1",
     *          "remark": "1",
     *          "status": "1",
     *          "created_at": "2018-07-02 17:44:32",
     *          "updated_at": "2018-07-02 18:06:55"
     *      })
     * })
     */
    public function update(CityInfoRequest $request, CityInfo $cityinfo)
    {
        return $this->traitUpdate($request, $cityinfo, self::TRANSFORMER);
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
     * @Parameter("ids", description="城市信息id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(CityInfoRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组城市信息状态
     * 
     * @PUT("/cityinfos")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="城市信息id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=true),
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
    public function editStatusByIds(CityInfoRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

}
