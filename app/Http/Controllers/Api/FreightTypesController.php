<?php

namespace App\Http\Controllers\Api;

use App\Models\FreightType;
use App\Http\Requests\Api\FreightTypeRequest;
use App\Transformers\FreightTypeTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 运费类型资源
 * @Resource("FreightTypes",uri="/api")
 */
class FreightTypesController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = FreightTypeTransformer::class;
    protected const MODEL = FreightType::class;

    /**
     * 获取所有运费类型 
     *  
     * @Get("/freighttypes{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 2,
     *             "name": "运费类型名1",
     *             "is_default": 1,
     *             "status": 1,
     *             "created_at": "2018-06-14 15:59:10",
     *             "updated_at": "2018-06-14 15:59:10"
     *         },
     *         {
     *             "id": 3,
     *             "name": "运费类型名2",
     *             "is_default": 1,
     *             "status": 1,
     *             "created_at": "2018-06-14 15:59:12",
     *             "updated_at": "2018-06-14 15:59:12"        
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
     *                 "next": "{{host}}/api/freighttypes?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(FreightTypeRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增运费类型 
     *  
     * @Post("/freighttypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="运费类型名称", required=true),
     *      @Parameter("is_default",type="integer", description="是否默认", required=false,default=0),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "name": {
     *              "status": {
     *                  "运费名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 3,
     *          "name": "运费类型名1",
     *          "is_default": "1",
     *          "status": "1",
     *          "created_at": "2018-06-14 15:59:12",
     *          "updated_at": "2018-06-14 15:59:12",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(FreightTypeRequest $request)
    {
        //是否要重置默认
        if ($request->input('is_default') === '1') {
            $this->tableResetDefault(self::MODEL);
        }

        return $this->traitStore($request, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条运费类型 
     *  
     * @Post("/freighttypes/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 2,
     *          "name": "运费类型名1",
     *          "is_default": 1,
     *          "status": 1,
     *          "created_at": "2018-06-14 15:59:10",
     *          "updated_at": "2018-06-14 15:59:10"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改运费类型 
     *  
     * @Patch("/freighttypes/:id") 
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
     *                  "运费名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 2,
     *          "name": "运费类型名1",
     *          "is_default": "1",
     *          "status": "1",
     *          "created_at": "2018-06-14 15:59:10",
     *          "updated_at": "2018-06-14 15:59:10"
     *      })
     * })
     */
    public function update(FreightTypeRequest $request, FreightType $freighttype)
    {
        //是否要重置默认
        if($request->input('is_default') === '1'){
            $this->tableResetDefault(self::MODEL);
        }

        return $this->traitUpdate($request, $freighttype, self::TRANSFORMER);
    }

    /**
     * 删除运费类型 
     *  
     * @Delete("/freighttypes/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(FreightType $freighttype)
    {
        return $this->traitDestroy($freighttype);
    }

    /**
     * 删除一组运费类型 
     *  
     * @Delete("/freighttypes") 
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="运费类型id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(FreightTypeRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组运费类型状态 
     *  
     * @PUT("/freighttypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="运费类型id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(FreightTypeRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }
}
