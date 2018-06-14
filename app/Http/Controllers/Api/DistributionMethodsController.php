<?php

namespace App\Http\Controllers\Api;

use App\Models\DistributionMethod;
use App\Http\Requests\Api\DistributionMethodRequest;
use App\Transformers\DistributionMethodTransformer;

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
     *              "created_at": "2018-06-14 14:39:45",
     *              "updated_at": "2018-06-14 14:39:45"
     *         },
     *         {
     *             "id": 2,
     *             "name": "配送方式2",
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
     *      @Response(200, body={
     *          "message": "删除成功",
     *          "code": 1,
     *          "status_code": 200
     *      })
     * })
     */
    public function destroy(DistributionMethod $distmet)
    {
        $distmet->delete();
        return $this->errorResponse(200, '删除成功', 1);

        // return $this->response->item($distmet, new DistributionMethodTransformer());
    }
}
