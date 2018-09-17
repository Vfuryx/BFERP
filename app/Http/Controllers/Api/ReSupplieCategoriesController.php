<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReSupplieCategorieRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\ReSupplieCategorieTransformer;

use App\Models\ReSupplieCategorie;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 补件类别资源
 * @Resource("resuppliecategories",uri="/api")
 */
class ReSupplieCategoriesController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = ReSupplieCategorieTransformer::class;
    const MODEL = ReSupplieCategorie::class;

    /**
     * 获取所有补件类别
     *
     * @Get("/resuppliecategories{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "name": "补件类别1",
     *          "status": true,
     *          "created_at": "2018-06-25 10:45:30",
     *          "updated_at": "2018-06-25 10:45:30"
     *      },
     *      {
     *          "id": 2,
     *          "name": "补件类别2",
     *          "status": true,
     *          "created_at": "2018-06-25 10:45:32",
     *          "updated_at": "2018-06-25 10:45:32"
     *      }
     *   }
     * })
     */
    public function index(ReSupplieCategorieRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 0);
    }


    /**
     * 新增补件类别
     *
     * @Post("/resuppliecategories")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="补件类别名称", required=true),
     *      @Parameter("status", type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "补件类别名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "补件类别1",
     *          "status": true,
     *          "created_at": "2018-06-14 15:02:10",
     *          "updated_at": "2018-06-14 15:02:10",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(ReSupplieCategorieRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条补件类别
     *
     * @Get("/resuppliecategories/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *              "id": 1,
     *              "name": "补件类别1",
     *              "status": true,
     *              "created_at": "2018-06-14 15:01:51",
     *              "updated_at": "2018-06-14 15:01:51"
     *      })
     * })
     */
    public function show(ReSupplieCategorie $resuppliecategorie)
    {
        return $this->traitShow($resuppliecategorie, self::TRANSFORMER);
    }

    /**
     * 修改补件类别
     *
     * @Patch("/resuppliecategories/:id")
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
     *                  "补件类别名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "补件类别10",
     *          "status": true,
     *          "created_at": "2018-06-14 15:01:51",
     *          "updated_at": "2018-06-14 15:07:56"
     *      })
     * })
     */
    public function update(ReSupplieCategorieRequest $request, ReSupplieCategorie $resuppliecategorie)
    {
        return $this->traitUpdate($request, $resuppliecategorie, self::TRANSFORMER);
    }

    /**
     * 删除补件类别
     *
     * @Delete("/resuppliecategories/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ReSupplieCategorie $resuppliecategorie)
    {
        return $this->traitDestroy($resuppliecategorie);
    }


    /**
     * 删除一组补件类别
     *
     * @Delete("/resuppliecategories")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="补件类别id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组补件类别状态
     *
     * @PUT("/resuppliecategories/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="补件类别id组 格式: 1,2,3,4 ", required=true),
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
