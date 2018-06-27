<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
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
     * @Get("/storagetypes{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "入库类型1",
     *             "status": 1,
     *             "created_at": "2018-06-14 16:55:32",
     *             "updated_at": "2018-06-14 16:55:32"
     *             
     *         },
     *         {
     *             "id": 2,
     *             "name": "入库类型2",
     *             "status": 1,
     *             "created_at": "2018-06-14 16:55:36",
     *             "updated_at": "2018-06-14 16:55:36"
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
     *                 "next": "{{host}}/api/storagetypes?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(StorageTypeRequest $request)
    {
        // return $this->response->collection(StorageType::all(),new StorageTypeTransformer());
        
        //分页响应返回
        $storagetypes = StorageType::whereIn(
            'status',
            (array)$request->get('status',[1,0]))
            ->paginate(10);
        return $this->response->paginator($storagetypes, new StorageTypeTransformer());
    }


    /**
     * 新增入库类型 
     *  
     * @Post("/storagetypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="入库类型名称", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
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
     *          "status": "1",
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
     *          "status": 1,
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
     *          "status": "1",
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
     *      @Response(204, body={})
     * })
     */
    public function destroy(StorageType $storagetype)
    {
        $storagetype->delete();
        return $this->noContent();
    }
    
    /**
     * 删除一组入库类型 
     *  
     * @Delete("/storagetypes") 
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="入库类型id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(StorageTypeRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if(count($ids) !== StorageType::destroy($ids)){
                $this->errorResponse(500);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse(500,'删除错误',500);
        }

        return $this->errorResponse(204);
    }

    /**
     * 更改一组入库类型状态 
     *  
     * @PUT("/storagetypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="入库类型id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(StorageTypeRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if(count($ids) !== StorageType::whereIn('id',$ids)->update(['status'=>$status])){
                $this->errorResponse(500);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse(500,'更改错误',500);
        }

        return $this->errorResponse(204);
    }
}
