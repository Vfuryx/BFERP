<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReSupplieResponsibleRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\ReSupplieResponsibleTransformer;

use App\Models\ReSupplieResponsible;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 补件责任方资源
 * @Resource("resupplieresponsibles",uri="/api")
 */
class ReSupplieResponsiblesController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = ReSupplieResponsibleTransformer::class;
    const MODEL = ReSupplieResponsible::class;

    /**
     * 获取所有补件责任方
     *
     * @Get("/resupplieresponsibles{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "name": "补件责任方1",
     *          "status": true,
     *          "created_at": "2018-06-25 10:45:30",
     *          "updated_at": "2018-06-25 10:45:30"
     *      },
     *      {
     *          "id": 2,
     *          "name": "补件责任方2",
     *          "status": true,
     *          "created_at": "2018-06-25 10:45:32",
     *          "updated_at": "2018-06-25 10:45:32"
     *      }
     *   }
     * })
     */
    public function index(ReSupplieResponsibleRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 0);
    }


    /**
     * 新增补件责任方
     *
     * @Post("/resupplieresponsibles")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="补件责任方名称", required=true),
     *      @Parameter("status", type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "补件责任方名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "补件责任方1",
     *          "status": true,
     *          "created_at": "2018-06-14 15:02:10",
     *          "updated_at": "2018-06-14 15:02:10",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(ReSupplieResponsibleRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条补件责任方
     *
     * @Get("/resupplieresponsibles/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *              "id": 1,
     *              "name": "补件责任方1",
     *              "status": true,
     *              "created_at": "2018-06-14 15:01:51",
     *              "updated_at": "2018-06-14 15:01:51"
     *      })
     * })
     */
    public function show(ReSupplieResponsible $resupplieresponsible)
    {
        return $this->traitShow($resupplieresponsible, self::TRANSFORMER);
    }

    /**
     * 修改补件责任方
     *
     * @Patch("/resupplieresponsibles/:id")
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
     *                  "补件责任方名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "补件责任方10",
     *          "status": true,
     *          "created_at": "2018-06-14 15:01:51",
     *          "updated_at": "2018-06-14 15:07:56"
     *      })
     * })
     */
    public function update(ReSupplieResponsibleRequest $request, ReSupplieResponsible $resupplieresponsible)
    {
        return $this->traitUpdate($request, $resupplieresponsible, self::TRANSFORMER);
    }

    /**
     * 删除补件责任方
     *
     * @Delete("/resupplieresponsibles/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ReSupplieResponsible $resupplieresponsible)
    {
        return $this->traitDestroy($resupplieresponsible);
    }


    /**
     * 删除一组补件责任方
     *
     * @Delete("/resupplieresponsibles")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="补件责任方id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组补件责任方状态
     *
     * @PUT("/resupplieresponsibles/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="补件责任方id组 格式: 1,2,3,4 ", required=true),
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
