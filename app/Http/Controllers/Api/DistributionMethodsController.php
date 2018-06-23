<?php

namespace App\Http\Controllers\Api;

use App\Models\DistributionMethod;
use App\Http\Requests\Api\DistributionMethodRequest;
use App\Transformers\DistributionMethodTransformer;
use Illuminate\Support\Facades\DB;


/**
 * 配送方式资源
 * @Resource("DistributionMethods",uri="/api")
 */
class DistributionMethodsController extends Controller
{
    /**
     * 获取所有配送方式 
     *  
     * @Get("/distmets") 
     * @Versions({"v1"})
     * @Response(200, body={
     * "data": {
     *         {
     *              "id": 1,
     *              "name": "配送方式1",
     *              "status": "1",
     *              "created_at": "2018-06-14 14:39:45",
     *              "updated_at": "2018-06-14 14:39:45"
     *         },
     *         {
     *             "id": 2,
     *             "name": "配送方式2",
     *             "status": "1",
     *             "created_at": "2018-06-14 14:42:23",
     *             "updated_at": "2018-06-14 14:42:23"
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 3,
     *             "count": 2,
     *             "per_page": 2,
     *             "current_page": 1,
     *             "total_pages": 3,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/distmets?page=2"
     *             }
     *         }
     *     }
     * })
     */
    public function index()
    {
        // return $this->response->collection(DistributionMethod::all(),new DistributionMethodTransformer());

        //分页响应返回
        $distmets = DistributionMethod::paginate(2);
        return $this->response->paginator($distmets, new DistributionMethodTransformer());
    }


    /**
     * 新增配送方式 
     *  
     * @Post("/distmets") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="配送方式名", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "name": {
     *                  "配送方式名称必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "配送方式1",
     *          "status": "1",
     *          "created_at": "2018-06-14 14:39:45",
     *          "updated_at": "2018-06-14 14:39:45",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(DistributionMethodRequest $request)
    {
        $dismet = new DistributionMethod();
        $dismet->fill($request->all());
        $dismet->save();
        return $this->response
                    ->item($dismet, new DistributionMethodTransformer())
                    ->setStatusCode(201)
                    ->addMeta('status_code', '201');
    }

    /**
     * 显示单条配送方式 
     *  
     * @Post("/distmets/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "name": "配送方式1",
     *          "status": "1",
     *          "created_at": "2018-06-14 14:39:45",
     *          "updated_at": "2018-06-14 14:45:14"
     *      })
     * })
     */
    public function show($id)
    {
        $dismet = DistributionMethod::findOrFail($id);
        return $this->response->item($dismet, new DistributionMethodTransformer());
    }

    /**
     * 修改配送方式 
     *  
     * @Patch("/distmets/:id") 
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
     *                  "配送方式名称必须string类型"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "配送方式10",
     *          "status": "1",
     *          "created_at": "2018-06-14 14:39:45",
     *          "updated_at": "2018-06-14 14:40:45",
     *      })
     * })
     */
    public function update(DistributionMethodRequest $request, DistributionMethod $distmet)
    {
        $distmet->update($request->all());
        return $this->response
                    ->item($distmet, new DistributionMethodTransformer())
                    ->setStatusCode(201);
    }

    /**
     * 删除配送方式 
     *  
     * @Delete("/distmets/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(DistributionMethod $distmet)
    {
        $distmet->delete();
        return $this->noContent();

        // return $this->response->item($distmet, new DistributionMethodTransformer());
    }

    /**
     * 删除一组配送方式 
     *  
     * @Delete("/distmets") 
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="配送方式id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(DistributionMethodRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if (count($ids) !== DistributionMethod::destroy($ids)) {
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
     * 更改一组配送方式状态 
     *  
     * @PUT("/distmets") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="配送方式id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(DistributionMethodRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if (count($ids) !== DistributionMethod::whereIn('id', $ids)->update(['status' => $status])) {
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
