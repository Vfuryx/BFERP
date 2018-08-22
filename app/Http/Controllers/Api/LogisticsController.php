<?php

namespace App\Http\Controllers\Api;

use App\Models\Logistics;

use App\Http\Requests\Api\LogisticsRequest;
use App\Http\Requests\Api\CityInfoRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\LogisticsTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 物流资源
 * @Resource("logistics",uri="/api")
 */
class LogisticsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = LogisticsTransformer::class;
    const MODEL = Logistics::class;

    /**
     * 获取所有物流
     *
     * @Get("/logistics[?status=true&include=cityInfos,printReport,freightType]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "code": "物流代码",
     *          "name": "物流名称",
     *          "report": {
     *              "id": 1,
     *              "file": "报表文件",
     *              "name": "报表名称",
     *              "paper_format": "报表格式",
     *              "status": true,
     *              "created_at": "2018-07-03 17:50:46",
     *              "updated_at": "2018-07-03 17:50:49"
     *          },
     *          "expected_days": 10,
     *          "phone": "物流电话",
     *          "address": "物流地址",
     *          "cityInfos": {
     *              "data": {
     *                  {
     *                      "id": 1,
     *                      "logistics_id": 1,
     *                      "province": "省",
     *                      "city": "市",
     *                      "district": "区",
     *                      "address": "提货地址",
     *                      "phone": "23333333333",
     *                      "price": "100.00",
     *                      "weight_univalent": "110.00",
     *                      "expected_days": 1,
     *                      "route": 1,
     *                      "is_free_shipping": true,
     *                      "remark": "备注",
     *                      "created_at": "2018-08-21 10:21:07",
     *                      "updated_at": "2018-08-21 10:21:07"
     *                  }
     *              }
     *          },
     *          "freight_type": {
     *              "id": 1,
     *              "name": "运费名称1",
     *              "status": true,
     *              "is_default": true,
     *              "created_at": "2018-07-03 17:51:25",
     *              "updated_at": "2018-07-03 17:51:25"
     *          },
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-07-03 17:52:28",
     *          "updated_at": "2018-07-03 17:52:28"
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
    public function index(LogisticsRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增物流
     *
     * @Post("/logistics")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("code", description="物流代码", required=true),
     *      @Parameter("name", description="物流名称", required=true),
     *      @Parameter("report_id",type="integer", description="报表格式id", required=true),
     *      @Parameter("expected_days",type="integer", description="预计天数", required=true),
     *      @Parameter("phone", description="物流电话", required=true),
     *      @Parameter("address", description="物流地址", required=true),
     *      @Parameter("freight_type_id",type="integer", description="运费类型id", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("city_infos[0][province]", description="省", required=true),
     *      @Parameter("city_infos[0][city]", description="市", required=true),
     *      @Parameter("city_infos[0][district]", description="区", required=true),
     *      @Parameter("city_infos[0][address]", description="提货地址", required=true),
     *      @Parameter("city_infos[0][phone]", description="提货电话", required=true),
     *      @Parameter("city_infos[0][price]",type="numeric", description="物流费用", required=true),
     *      @Parameter("city_infos[0][weight_univalent]",type="numeric", description="重量单价", required=true),
     *      @Parameter("city_infos[0][expected_days]",type="integer", description="城市到达天数", required=true),
     *      @Parameter("city_infos[0][route]",type="integer", description="中转或直达", required=true),
     *      @Parameter("city_infos[0][is_free_shipping]",type="boolean", description="是否包邮", required=true),
     *      @Parameter("city_infos[0][remark]", description="备注", required=true),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "report_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "logistics_area_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "expected_days": {
     *                  "预计天数必须int类型"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "code": "物流代码",
     *          "name": "物流名称",
     *          "report_id": 1,
     *          "expected_days": 1,
     *          "phone": "物流电话",
     *          "address": "物流地址",
     *          "freight_type_id": 1,
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-08-22 13:55:59",
     *          "updated_at": "2018-08-22 13:55:59",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(LogisticsRequest $request,CityInfoRequest $cityInfoRequest)
    {
        $data[] = $request->validated();
        $data[] = $cityInfoRequest->input('city_infos');
        return $this->traitJoint2Store(
            $data,
            'cityInfos',
            $cityInfoRequest->rules(),
            self::MODEL,
            self::TRANSFORMER
        );
    }

    /**
     * 显示单条物流
     *
     * @Get("/logistics/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "code": "物流代码",
     *          "name": "物流名称",
     *          "report": {
     *              "id": 1,
     *              "file": "报表文件",
     *              "name": "报表名称",
     *              "paper_format": "报表格式",
     *              "status": true,
     *              "created_at": "2018-07-03 17:50:46",
     *              "updated_at": "2018-07-03 17:50:49"
     *          },
     *          "expected_days": 10,
     *          "phone": "物流电话",
     *          "address": "物流地址",
     *          "cityInfos": {
     *              "data": {
     *                  {
     *                      "id": 1,
     *                      "logistics_id": 1,
     *                      "province": "省",
     *                      "city": "市",
     *                      "district": "区",
     *                      "address": "提货地址",
     *                      "phone": "23333333333",
     *                      "price": "100.00",
     *                      "weight_univalent": "110.00",
     *                      "expected_days": 1,
     *                      "route": 1,
     *                      "is_free_shipping": true,
     *                      "remark": "备注",
     *                      "created_at": "2018-08-21 10:21:07",
     *                      "updated_at": "2018-08-21 10:21:07"
     *                  }
     *              }
     *          },
     *          "freight_type": {
     *              "id": 1,
     *              "name": "运费名称1",
     *              "status": true,
     *              "is_default": true,
     *              "created_at": "2018-07-03 17:51:25",
     *              "updated_at": "2018-07-03 17:51:25"
     *          },
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-07-03 17:52:28",
     *          "updated_at": "2018-07-03 17:52:28"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改物流
     *
     * @Patch("/logistics/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("code", description="物流代码", required=false),
     *      @Parameter("name", description="物流名称", required=false),
     *      @Parameter("report_id",type="integer", description="报表格式id", required=false),
     *      @Parameter("expected_days",type="integer", description="预计天数", required=false),
     *      @Parameter("phone", description="物流电话", required=false),
     *      @Parameter("address", description="物流地址", required=false),
     *      @Parameter("freight_type_id",type="integer", description="运费类型id", required=false),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=false),
     *      @Parameter("city_infos[0][id]", description="城市信息id", required=false),
     *      @Parameter("city_infos[0][province]", description="省", required=false),
     *      @Parameter("city_infos[0][city]", description="市", required=false),
     *      @Parameter("city_infos[0][district]", description="区", required=false),
     *      @Parameter("city_infos[0][address]", description="提货地址", required=false),
     *      @Parameter("city_infos[0][phone]", description="提货电话", required=false),
     *      @Parameter("city_infos[0][price]",type="numeric", description="物流费用", required=false),
     *      @Parameter("city_infos[0][weight_univalent]",type="numeric", description="重量单价", required=false),
     *      @Parameter("city_infos[0][expected_days]",type="integer", description="城市到达天数", required=false),
     *      @Parameter("city_infos[0][route]",type="integer", description="中转或直达", required=false),
     *      @Parameter("city_infos[0][is_free_shipping]",type="boolean", description="是否包邮", required=false),
     *      @Parameter("city_infos[0][remark]", description="备注", required=false),
     * })
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "report_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *               },
     *              "freight_type_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *               },
     *              "code": {
     *                  "物流代码不能重复"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "code": "物流代码1",
     *          "name": "物流名称1",
     *          "report": {
     *              "id": 1,
     *              "file": "报表文件",
     *              "name": "报表名称",
     *              "paper_format": "报表格式",
     *              "status": true,
     *              "created_at": "2018-07-03 17:50:46",
     *              "updated_at": "2018-07-03 17:50:49"
     *          },
     *          "expected_days": "10",
     *          "phone": "物流电话1",
     *          "address": "物流地址1",
     *          "cityInfos": {
     *              "data": {
     *                  {
     *                      "id": 1,
     *                      "logistics_id": 1,
     *                      "province": "省",
     *                      "city": "市",
     *                      "district": "区",
     *                      "address": "提货地址",
     *                      "phone": "23333333333",
     *                      "price": "100.00",
     *                      "weight_univalent": "110.00",
     *                      "expected_days": 1,
     *                      "route": 1,
     *                      "is_free_shipping": true,
     *                      "remark": "备注",
     *                      "created_at": "2018-08-21 10:21:07",
     *                      "updated_at": "2018-08-21 10:21:07"
     *                  }
     *              }
     *          },
     *          "freight_type": {
     *              "id": 1,
     *              "name": "运费名称1",
     *              "status": true,
     *              "is_default": true,
     *              "created_at": "2018-07-03 17:51:25",
     *              "updated_at": "2018-07-03 17:51:25"
     *          },
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-07-03 17:52:28",
     *          "updated_at": "2018-07-03 18:30:59"
     *      })
     * })
     */
    public function update(LogisticsRequest $request,CityInfoRequest $cityInfoRequest, Logistics $logistics)
    {
        $data[] = $request->validated();
        $data[] = $cityInfoRequest->input('city_infos');
        return $this->traitJoint2Update(
            $data,
            'cityInfos',
            $cityInfoRequest->rules(),
            $logistics,
            self::TRANSFORMER
        );
    }

    /**
     * 删除物流
     *
     * @Delete("/logistics/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Logistics $logistics)
    {
        return $this->traitDestroy($logistics);
    }

    /**
     * 删除一组物流
     *
     * @Delete("/logistics")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="物流id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组物流状态
     * 
     * @PUT("/logistics/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="物流id组 格式: 1,2,3,4 ", required=true),
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
