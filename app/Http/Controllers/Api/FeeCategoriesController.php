<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FeeCategoryRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\FeeCategoryTransformer;
use App\Models\FeeCategory;
use App\Http\Controllers\Traits\CURDTrait;


/**
 * 费用类别资源
 * @Resource("FeeCategories",uri="/api")
 */
class FeeCategoriesController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = FeeCategoryTransformer::class;
    const MODEL = FeeCategory::class;

    /**
     * 获取所有费用类别
     *
     * @Get("/feecates{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "name": "费用类别1",
     *          "status": 1,
     *          "created_at": "2018-06-25 10:45:30",
     *          "updated_at": "2018-06-25 10:45:30"
     *      },
     *      {
     *          "id": 2,
     *          "name": "费用类别2",
     *          "status": 1,
     *          "created_at": "2018-06-25 10:45:32",
     *          "updated_at": "2018-06-25 10:45:32"
     *      }
     *   }
     * })
     */
    public function index(FeeCategoryRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 0);
    }


    /**
     * 新增费用类别
     *
     * @Post("/feecates")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="费用类别名称", required=true),
     *      @Parameter("status", type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "费用类别名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "费用类别1",
     *          "status": 1,
     *          "created_at": "2018-06-14 15:02:10",
     *          "updated_at": "2018-06-14 15:02:10",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(FeeCategoryRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条费用类别
     *
     * @Get("/feecates/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *              "id": 1,
     *              "name": "费用类别1",
     *              "status": 1,
     *              "created_at": "2018-06-14 15:01:51",
     *              "updated_at": "2018-06-14 15:01:51"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改费用类别
     *
     * @Patch("/feecates/:id")
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
     *                  "费用类别名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "费用类别10",
     *          "status": 1,
     *          "created_at": "2018-06-14 15:01:51",
     *          "updated_at": "2018-06-14 15:07:56"
     *      })
     * })
     */
    public function update(FeeCategoryRequest $request, FeeCategory $feecate)
    {
        return $this->traitUpdate($request, $feecate, self::TRANSFORMER);
    }

    /**
     * 删除费用类别
     *
     * @Delete("/feecates/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(FeeCategory $feecate)
    {
        return $this->traitDestroy($feecate);
    }


    /**
     * 删除一组费用类别
     *
     * @Delete("/feecates")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="费用类别id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组费用类别状态
     *
     * @PUT("/feecates/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="费用类别id组 格式: 1,2,3,4 ", required=true),
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
