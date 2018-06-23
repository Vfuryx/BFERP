<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
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
     *          "status": 1,
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
     *          "status": "1",
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
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if (count($ids) !== FreightType::destroy($ids)) {
                $this->errorResponse(500);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse(500, '删除错误', 500);
        }

        return $this->errorResponse(204);
    }

    /**
     * 更改一组运费类型状态 
     *  
     * @PUT("/freighttypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="运费类型id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status", description="状态(0:停用，1:启用)", required=true),
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
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if (count($ids) !== FreightType::whereIn('id', $ids)->update(['status' => $status])) {
                $this->errorResponse(500);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse(500, '更改错误', 500);
        }

        return $this->errorResponse(204);
    }
}
