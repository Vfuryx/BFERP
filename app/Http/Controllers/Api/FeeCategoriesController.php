<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FeeCategoryRequest;
use App\Transformers\FeeCategoryTransformer;
use App\Models\FeeCategory;

/**
 * 费用类别资源
 * @Resource("FeeCategories",uri="/api")
 */
class FeeCategoriesController extends Controller
{
    /**
     * 获取所有费用类别 
     *  
     * @Get("/feecates") 
     * @Versions({"v1"})
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "name": "费用类别1",
     *             "created_at": "2018-06-14 15:01:51",
     *             "updated_at": "2018-06-14 15:01:51"
     *         },
     *         {
     *             "id": 2,
     *             "name": "费用类别2",
     *             "created_at": "2018-06-14 15:02:07",
     *             "updated_at": "2018-06-14 15:02:07"        
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
     *                 "next": "{{host}}/api/feecates?page=2"
     *             }
     *         }
     *     }
     * })
     */
    public function index()
    {
        //return $this->response->collection(FeeCategory::all(), new FeeCategoryTransformer());

        //分页响应返回
        $feecates = FeeCategory::paginate(2);
        return $this->response->paginator($feecates, new FeeCategoryTransformer());
    }

   /**
     * 新增费用类别 
     *  
     * @Post("/feecates") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="费用类别名称", required=true),
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
        $feecate = new FeeCategory();
        $feecate->fill($request->all());
        $feecate->save();
        return $this->response
                    ->item($feecate, new FeeCategoryTransformer())
                    ->setStatusCode(201)
                    ->addMeta('status_code', '201');
    }

    /**
     * 显示单条费用类别 
     *  
     * @Post("/feecates/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *              "id": 1,
     *              "name": "费用类别1",
     *              "created_at": "2018-06-14 15:01:51",
     *              "updated_at": "2018-06-14 15:01:51"
     *      })
     * })
     */
    public function show($id)
    {
        $feecate = FeeCategory::findOrFail($id);
        return $this->response->item($feecate, new FeeCategoryTransformer());
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
     *          "created_at": "2018-06-14 15:01:51",
     *          "updated_at": "2018-06-14 15:07:56"
     *      })
     * })
     */
    public function update(FeeCategoryRequest $request, FeeCategory $feecate)
    {
        $feecate->update($request->all());
        return $this->response
                    ->item($feecate, new FeeCategoryTransformer())
                    ->setStatusCode(201);
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
     *      @Response(200, body={
     *          "message": "删除成功",
     *          "code": 1,
     *          "status_code": 200
     *      })
     * })
     */
    public function destroy(FeeCategory $feecate)
    {
        $feecate->delete();
        return $this->errorResponse(200, '删除成功', 1);
    }
}
