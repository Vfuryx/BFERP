<?php

namespace App\Http\Controllers\Api;

use App\Models\MarkColor;
use App\Http\Requests\Api\MarkColorRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\MarkColorTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 标记颜色资源
 * @Resource("MarkColors",uri="/api")
 */
class MarkColorsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = MarkColorTransformer::class;
    const MODEL = MarkColor::class;

    /**
     * 获取所有标记颜色 
     *  
     * @Get("/markcolors{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "markcode": "CANCELORDER",
     *             "markname": "取消订单",
     *             "color": "#555555",
     *             "description": "描述",
     *             "status": 0,
     *             "created_at": "2018-06-11 15:04:17",
     *             "updated_at": "2018-06-11 15:04:17"
     *         },
     *         {
     *             "id": 2,
     *             "markcode": "TESTMARK",
     *             "markname": "测试挖",
     *             "color": "#888888",
     *             "description": "我不是描述",
     *             "status": 0,
     *             "created_at": "2018-06-12 09:52:16",
     *             "updated_at": "2018-06-12 09:52:16"
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 5,
     *             "count": 5,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/markcolors?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(MarkColorRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增标记颜色 
     *  
     * @Post("/markcolors") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("markcode", description="标记代码", required=true),
     *      @Parameter("markname", description="标记名称", required=true),
     *      @Parameter("color", description="颜色", required=true),
     *      @Parameter("description", description="描述", required=false),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "status": {
     *                  "颜色必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 7,
     *          "markcode": "MARKCODE0",
     *          "markname": "标记名称0",
     *          "color": "颜色值0",
     *          "description": "描述0",
     *          "status": "1",
     *          "created_at": "2018-06-13 19:03:59",
     *          "updated_at": "2018-06-13 19:03:59",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(MarkColorRequest $request)
    {  
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条标记颜色 
     *  
     * @Get("/markcolors/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 7,
     *          "markcode": "MARKCODE0",
     *          "markname": "标记名称0",
     *          "color": "颜色值0",
     *          "description": "描述0",
     *          "status": "1",
     *          "created_at": "2018-06-13 19:03:59",
     *          "updated_at": "2018-06-13 19:03:59"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }


    /**
     * 修改标记颜色 
     *  
     * @Patch("/markcolors/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "markcode": {
     *                  "标记代码不能重复"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 7,
     *          "markcode": "MARKCODE0",
     *          "markname": "标记名称0",
     *          "color": "颜色值0",
     *          "description": "描述0",
     *          "status": "1",
     *          "created_at": "2018-06-13 19:03:59",
     *          "updated_at": "2018-06-13 19:03:59"
     *      })
     * })
     */
    public function update(MarkColorRequest $request, MarkColor $markcolor)
    {
        return $this->traitUpdate($request, $markcolor, self::TRANSFORMER);
    }

    /**
     * 删除标记颜色 
     *  
     * @Delete("/markcolors/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(MarkColor $markcolor)
    {
        return $this->traitDestroy($markcolor);
    }


    /**
     * 删除一组标记颜色 
     *  
     * @Delete("/markcolors") 
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="标记颜色id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组标记颜色状态 
     *  
     * @PUT("/markcolors") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="标记颜色id组 格式: 1,2,3,4 ", required=true),
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
