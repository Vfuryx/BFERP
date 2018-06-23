<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Models\AccountingType as AccType;
use App\Transformers\AccountingTypeTransformer;
use App\Http\Requests\Api\AccountingTypeRequest;

/**
 * 记账类型资源
 * @Resource("AccountingTypes",uri="/api")
 */
class AccountingTypesController extends Controller
{
    /**
     * 获取所有记账类型 
     *  
     * @Get("/acctypes") 
     * @Versions({"v1"})
     * @Response(200, body={
     *       "data": {
     *           {
     *               "id": 1,
     *               "name": "记账类型1",
     *               "status": 1,
     *               "created_at": "2018-06-14 13:59:42",
     *               "updated_at": "2018-06-14 13:59:42"
     *           },
     *           {
     *               "id": 2,
     *               "name": "记账类型2",
     *               "status": 0,
     *               "created_at": "2018-06-14 13:59:46",
     *               "updated_at": "2018-06-14 13:59:46"
     *           }
     *       },
     *       "meta": {
     *           "pagination": {
     *               "total": 3,
     *               "count": 2,
     *               "per_page": 2,
     *               "current_page": 1,
     *               "total_pages": 2,
     *               "links": {
     *                   "previous": null,
     *                   "next": "http://127.0.0.1:8000/api/acctypes?page=2"
     *               }
     *           }
     *       }
     * })
     */
    public function index()
    {
        // return $this->response->collection(AccType::all(), new AccountingTypeTransformer());

        //分页响应返回
        $acctype = AccType::paginate(10);
        return $this->response->paginator($acctype, new AccountingTypeTransformer());

    }


    /**
     * 新增记账类型
     *  
     * @Post("/acctypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="记账类型名称", required=true),
     *      @Parameter("status", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "记账类型名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "记账类型1",
     *          "status": "1",
     *          "created_at": "2018-06-14 13:43:37",
     *          "updated_at": "2018-06-14 13:43:37",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(AccountingTypeRequest $request)
    {
        $acctype = new AccType();
        $acctype->fill($request->all());
        $acctype->save();
        return $this->response
                    ->item($acctype, new AccountingTypeTransformer())
                    ->setStatusCode(201)
                    ->addMeta('status_code', '201');
    }

    /**
     * 显示单条记账类型 
     *  
     * @Post("/acctypes/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "记账类型1",
     *          "status": 1,
     *          "created_at": "2018-06-14 13:59:42",
     *          "updated_at": "2018-06-14 13:59:42"
     *      })
     * })
     */
    public function show($id)
    {
        $acctype = AccType::findOrFail($id);
        return $this->response->item($acctype, new AccountingTypeTransformer());
    }

    /**
     * 修改记账类型
     *  
     * @Patch("/acctypes/:id") 
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
     *                  "记账类型名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "记账类型10",
     *          "status": "1",
     *          "created_at": "2018-06-14 13:59:42",
     *          "updated_at": "2018-06-14 14:06:30"
     *      })
     * })
     */
    public function update(AccountingTypeRequest $request, AccType $acctype)
    {
        $acctype->update($request->all());
        return $this->response
                    ->item($acctype, new AccountingTypeTransformer())
                    ->setStatusCode(201);
    }

    /**
     * 删除记账类型 
     *  
     * @Delete("/acctypes/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(AccType $acctype)
    {
        $acctype->delete();
        return $this->noContent();
    }

    /**
     * 删除一组记账类型 
     *  
     * @Delete("/acctypes") 
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="记账类型id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(AccountingTypeRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if(count($ids) !== AccType::destroy($ids)){
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
     * 更改一组记账类型状态 
     *  
     * @PUT("/acctypes") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="记账类型id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(AccountingTypeRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if(count($ids) !== AccType::whereIn('id',$ids)->update(['status'=>$status])){
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
