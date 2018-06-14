<?php

namespace App\Http\Controllers\Api;

use App\Models\StorageType;
use App\Http\Requests\Api\StorageTypeRequest;
use App\Transformers\StorageTypeTransformer;


/**
 * 入库类型资源
 * @Resource("StorageTypes",uri="/api")
 */
class StorageTypesController extends Controller
{
   /**
     * 获取所有入库类型 
     *  
     * @Get("/storagetypes") 
     * @Versions({"v1"})
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "入库类型1",
     *             "created_at": "2018-06-14 16:55:32",
     *             "updated_at": "2018-06-14 16:55:32"
     *             
     *         },
     *         {
     *             "id": 2,
     *             "name": "入库类型2",
     *             "created_at": "2018-06-14 16:55:36",
     *             "updated_at": "2018-06-14 16:55:36"
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
     *                 "next": "{{host}}/api/storagetypes?page=2"
     *             }
     *         }
     *     }
     * })
     */
    public function index()
    {
        // return $this->response->collection(StorageType::all(),new StorageTypeTransformer());
        
        //分页响应返回
        $storagetypes = StorageType::paginate(2);
        return $this->response->paginator($storagetypes, new StorageTypeTransformer());
    }


    /**
     * 新增入库类型 
     *  
     * @Post("/storagetypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="入库类型名称", required=true),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "入库类型名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 3,
     *          "name": "入库类型3",
     *          "created_at": "2018-06-14 16:55:40",
     *          "updated_at": "2018-06-14 16:55:40",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(StorageTypeRequest $request)
    {
        $storagetype=new StorageType();
        $storagetype->fill($request->all());
        $storagetype->save();

        return $this->response
                    ->item($storagetype, new StorageTypeTransformer())
                    ->setStatusCode(201)
                    ->addMeta('status_code', '201');
    }

    /**
     * 显示单条入库类型 
     *  
     * @Post("/storagetypes/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "入库类型1",
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:55:32"
     *      })
     * })
     */
    public function show($id)
    {
        $storagetype = StorageType::findOrFail($id);
        return $this->response->item($storagetype, new StorageTypeTransformer());
    }


    /**
     * 修改入库类型 
     *  
     * @Patch("/storagetypes/:id") 
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
     *                  "入库类型名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "入库类型10",
     *          "created_at": "2018-06-14 16:55:32",
     *          "updated_at": "2018-06-14 16:58:55"
     *      })
     * })
     */
    public function update(StorageTypeRequest $request,StorageType $storagetype)
    {
        $storagetype->update($request->all());
        return $this->response
                    ->item($storagetype, new StorageTypeTransformer())
                    ->setStatusCode(201);
    }

    /**
     * 删除入库类型 
     *  
     * @Delete("/storagetypes/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "message": "删除成功",
     *          "code": 1,
     *          "status_code": 200
     *      })
     * })
     */
    public function destroy(StorageType $storagetype)
    {
        $storagetype->delete();
        return $this->errorResponse(200, '删除成功', 1);
    }
}
