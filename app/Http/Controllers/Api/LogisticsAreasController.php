<?php

namespace App\Http\Controllers\Api;

use App\Models\LogisticsArea;
use App\Http\Requests\Api\LogisticsAreaRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\LogisticsAreaTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 物流区域资源
 * @Resource("logisticsareas",uri="/api")
 */
class LogisticsAreasController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = LogisticsAreaTransformer::class;
    const MODEL = LogisticsArea::class;

    /**
     * 获取所有物流区域
     *
     * @Get("/logisticsareas{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "code": "区域代码1",
     *          "name": "区域名称1",
     *          "status": true,
     *          "created_at": "2018-07-03 16:29:28",
     *          "updated_at": "2018-07-03 16:29:28"
     *      },
     *      {
     *          "id": 2,
     *          "code": "区域代码2",
     *          "name": "区域名称2",
     *          "status": true,
     *          "created_at": "2018-07-03 16:35:55",
     *          "updated_at": "2018-07-03 16:35:55"
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
    public function index(LogisticsAreaRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增物流区域
     *
     * @Post("/logisticsareas")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("code", description="区域代码", required=true),
     *      @Parameter("name", description="区域名称", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "code": {
     *                  "区域代码必填"
     *              },
     *              "code": {
     *                  "区域代码不能重复"
     *              },
     *              "name": {
     *                  "区域名称必填"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "code": "区域代码1",
     *          "name": "区域名称1",
     *          "status": true,
     *          "created_at": "2018-07-03 16:29:28",
     *          "updated_at": "2018-07-03 16:29:28",
     *          "meta": {
     *              "status_code": "201"
     *          }      
     *      })
     * })
     */
    public function store(LogisticsAreaRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条物流区域
     *
     * @Get("/logisticsareas/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "code": "区域代码1",
     *          "name": "区域名称1",
     *          "status": true,
     *          "created_at": "2018-07-03 16:29:28",
     *          "updated_at": "2018-07-03 16:29:28"
     *      })
     * })
     */
    public function show(LogisticsArea $logisticsarea)
    {
        return $this->traitShow($logisticsarea, self::TRANSFORMER);
    }

    /**
     * 修改物流区域
     *
     * @Patch("/logisticsareas/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "status": {
     *                  "状态必须int类型"
     *               },
     *              "code": {
     *                  "区域代码不能重复"
     *              },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "code": "区域代码10",
     *          "name": "区域名称10",
     *          "status": true,
     *          "created_at": "2018-07-03 16:29:28",
     *          "updated_at": "2018-07-03 16:38:32"
     *      })
     * })
     */
    public function update(LogisticsAreaRequest $request, LogisticsArea $logisticsarea)
    {
        return $this->traitUpdate($request, $logisticsarea, self::TRANSFORMER);
    }

    /**
     * 删除物流区域
     *
     * @Delete("/logisticsareas/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(LogisticsArea $logisticsarea)
    {
        return $this->traitDestroy($logisticsarea);
    }

    /**
     * 删除一组物流区域
     *
     * @Delete("/logisticsareas")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="物流区域id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组物流区域状态
     * 
     * @PUT("/logisticsareas/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="物流区域id组 格式: 1,2,3,4 ", required=true),
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
