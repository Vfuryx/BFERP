<?php

namespace App\Http\Controllers\Api;

use App\Models\Logistics;
use App\Http\Requests\Api\LogisticsRequest;
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
     * @Get("/logistics{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
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
     *              "status": 1,
     *              "created_at": "2018-07-03 17:50:46",
     *              "updated_at": "2018-07-03 17:50:49"
     *          },
     *          "expected_days": 10,
     *          "phone": "物流电话",
     *          "address": "物流地址",
     *          "freight_type": {
     *              "id": 1,
     *              "name": "运费名称1",
     *              "status": 1,
     *              "is_default": 1,
     *              "created_at": "2018-07-03 17:51:25",
     *              "updated_at": "2018-07-03 17:51:25"
     *          },
     *          "remark": "备注",
     *          "status": 1,
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
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
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
     *          "report": {
     *              "id": 1,
     *              "file": "报表文件",
     *              "name": "报表名称",
     *              "paper_format": "报表格式",
     *              "status": 1,
     *              "created_at": "2018-07-03 17:50:46",
     *              "updated_at": "2018-07-03 17:50:49"
     *          },
     *          "expected_days": "10",
     *          "phone": "物流电话",
     *          "address": "物流地址",
     *          "freight_type": {
     *              "id": 1,
     *              "name": "运费名称1",
     *              "status": 1,
     *              "is_default": 1,
     *              "created_at": "2018-07-03 17:51:25",
     *              "updated_at": "2018-07-03 17:51:25"
     *          },
     *          "remark": "备注",
     *          "status": "1",
     *          "created_at": "2018-07-03 17:52:28",
     *          "updated_at": "2018-07-03 17:52:28",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(LogisticsRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
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
     *              "status": 1,
     *              "created_at": "2018-07-03 17:50:46",
     *              "updated_at": "2018-07-03 17:50:49"
     *          },
     *          "expected_days": 10,
     *          "phone": "物流电话",
     *          "address": "物流地址",
     *          "freight_type": {
     *              "id": 1,
     *              "name": "运费名称1",
     *              "status": 1,
     *              "is_default": 1,
     *              "created_at": "2018-07-03 17:51:25",
     *              "updated_at": "2018-07-03 17:51:25"
     *          },
     *          "remark": "备注",
     *          "status": 1,
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
     *              "status": 1,
     *              "created_at": "2018-07-03 17:50:46",
     *              "updated_at": "2018-07-03 17:50:49"
     *          },
     *          "expected_days": "10",
     *          "phone": "物流电话1",
     *          "address": "物流地址1",
     *          "freight_type": {
     *              "id": 1,
     *              "name": "运费名称1",
     *              "status": 1,
     *              "is_default": 1,
     *              "created_at": "2018-07-03 17:51:25",
     *              "updated_at": "2018-07-03 17:51:25"
     *          },
     *          "remark": "备注",
     *          "status": "1",
     *          "created_at": "2018-07-03 17:52:28",
     *          "updated_at": "2018-07-03 18:30:59"
     *      })
     * })
     */
    public function update(LogisticsRequest $request, Logistics $logistics)
    {
        return $this->traitUpdate($request, $logistics, self::TRANSFORMER);
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
     * @PUT("/logistics")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="物流id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(EditStatuRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

}
