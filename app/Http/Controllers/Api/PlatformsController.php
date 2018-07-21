<?php

namespace App\Http\Controllers\Api;

use App\Models\Platform;
use App\Http\Requests\Api\PlatformRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\PlatformTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 平台类型资源
 * @Resource("platforms",uri="/api")
 */
class PlatformsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = PlatformTransformer::class;
    const MODEL = Platform::class;
    
    /**
     * 获取所有平台类型
     *
     * @Get("/platforms{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "name": "平台名称1",
     *          "status": 1,
     *          "created_at": "2018-07-04 12:54:52",
     *          "updated_at": "2018-07-04 12:54:55"
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
    public function index(PlatformRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增平台类型
     *
     * @Post("/platforms")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="平台类型名称", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "平台类型名称必填"
     *              },
     *              "status": {
     *                  "状态必须int类型"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 2,
     *          "name": "平台类型名称",
     *          "status": "1",
     *          "created_at": "2018-07-04 14:44:39",
     *          "updated_at": "2018-07-04 14:44:39",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(PlatformRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条平台类型
     *
     * @Get("/platforms/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "平台名称1",
     *          "status": 1,
     *          "created_at": "2018-07-04 12:54:52",
     *          "updated_at": "2018-07-04 12:54:55"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改平台类型
     *
     * @Patch("/platforms/:id")
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
     *              },
     *              "name": {
     *                  "平台类型名称必须string类型"
     *              },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "平台类型名称10",
     *          "status": "1",
     *          "created_at": "2018-07-04 12:54:52",
     *          "updated_at": "2018-07-04 14:51:08"
     *      })
     * })
     */
    public function update(PlatformRequest $request, Platform $platform)
    {
        return $this->traitUpdate($request, $platform, self::TRANSFORMER);
    }

    /**
     * 删除平台类型
     *
     * @Delete("/platforms/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Platform $platform)
    {
        return $this->traitDestroy($platform);
    }

    /**
     * 删除一组平台类型
     *
     * @Delete("/platforms")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="平台类型id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组平台类型状态
     * 
     * @PUT("/platforms")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="平台类型id组 格式: 1,2,3,4 ", required=true),
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
