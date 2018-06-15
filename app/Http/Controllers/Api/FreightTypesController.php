<?php

namespace App\Http\Controllers\Api;

use App\Models\FreightType;
use App\Http\Requests\Api\FreightTypeRequest;
use App\Transformers\FreightTypeTransformer;

/**
 * 运费类型资源
 * @Resource("FreightTypes",uri="/api")
 */
class FreightTypesController extends Controller
{
    /**
     * 获取所有运费类型 
     *  
     * @Get("/freighttypes") 
     * @Versions({"v1"})
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 2,
     *             "name": "运费类型名1",
     *             "is_default": 1,
     *             "created_at": "2018-06-14 15:59:10",
     *             "updated_at": "2018-06-14 15:59:10"
     *         },
     *         {
     *             "id": 3,
     *             "name": "运费类型名2",
     *             "is_default": 1,
     *             "created_at": "2018-06-14 15:59:12",
     *             "updated_at": "2018-06-14 15:59:12"        
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 5,
     *             "count": 2,
     *             "per_page": 2,
     *             "current_page": 1,
     *             "total_pages": 3,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/freighttypes?page=2"
     *             }
     *         }
     *     }
     * })
     */
    public function index()
    {
        // return $this->response->collection(FreightType::all(),new FreightTypeTransformer());
        
        //分页响应返回
        $freighttypes = FreightType::paginate(2);
        return $this->response->paginator($freighttypes, new FreightTypeTransformer());

    }

    /**
     * 新增运费类型 
     *  
     * @Post("/freighttypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="运费类型名称", required=true),
     *      @Parameter("is_default", description="是否默认", required=false,default=0),
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
        $freighttype = new FreightType();
        $freighttype->fill($request->all());
        $freighttype->save();
        return $this->response
                    ->item($freighttype, new FreightTypeTransformer())
                    ->setStatusCode(201)
                    ->addMeta('status_code', '201');
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
     *          "created_at": "2018-06-14 15:59:10",
     *          "updated_at": "2018-06-14 15:59:10"
     *      })
     * })
     */
    public function show($id)
    {
        $freighttype = FreightType::findOrFail($id);
        return $this->response->item($freighttype, new FreightTypeTransformer());
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
     *          "created_at": "2018-06-14 15:59:10",
     *          "updated_at": "2018-06-14 15:59:10"
     *      })
     * })
     */
    public function update(FreightTypeRequest $request, FreightType $freighttype)
    {
        $freighttype->update($request->all());
        return $this->response
                    ->item($freighttype, new FreightTypeTransformer())
                    ->setStatusCode(201);
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
        $freighttype->delete();
        return $this->noContent();
    }
}
