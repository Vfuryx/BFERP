<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Models\GoodsCategory;
use App\Http\Requests\Api\GoodsCategoryRequest;
use App\Transformers\GoodsCategoryTransformer;

/**
 * 商品类别资源
 * @Resource("GoodsCategories",uri="/api")
 */
class GoodsCategoriesController extends Controller
{
    /**
     * 获取所有商品类别 
     *  
     * @Get("/goodscates") 
     * @Versions({"v1"})
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "code": "商品类别代码1",
     *             "name": "商品类别名1",
     *             "status": 1,
     *             "description": "商品类别详情1",
     *             "remark": "商品类别备注1",
     *             "created_at": "2018-06-14 16:33:26",
     *             "updated_at": "2018-06-14 16:33:26"
     *         },
     *         {
     *             "id": 2,
     *             "code": "商品类别代码2",
     *             "name": "商品类别名2",
     *             "status": 1,
     *             "description": "商品类别详情2",
     *             "remark": "商品类别备注2",
     *             "created_at": "2018-06-14 16:40:44",
     *             "updated_at": "2018-06-14 16:40:44"
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
     *                 "next": "{{host}}/api/goodscates?page=2"
     *             }
     *         }
     *     }
     * })
     */
    public function index()
    {
        // return $this->response->collection(GoodsCategory::all(),new GoodsCategoryTransformer());

         //分页响应返回
         $goodscates = GoodsCategory::paginate(2);
         return $this->response->paginator($goodscates, new GoodsCategoryTransformer()); 
    }

   /**
     * 新增商品类别 
     *  
     * @Post("/goodscates") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("code", description="商品类别代码", required=true),
     *      @Parameter("name", description="商品类别名称", required=true),
     *      @Parameter("description", description="描述", required=false),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "status": {
     *                  "商品类别代码不能重复"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "code": "商品类别代码1",
     *          "name": "商品类别名1",
     *          "status": "1",
     *          "description": "商品类别详情1",
     *          "remark": "商品类别备注1",
     *          "created_at": "2018-06-14 16:33:26",
     *          "updated_at": "2018-06-14 16:33:26",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(GoodsCategoryRequest $request)
    {
        $goodscate=new GoodsCategory();
        $goodscate->fill($request->all());
        $goodscate->save();
        return $this->response
                    ->item($goodscate, new GoodsCategoryTransformer())
                    ->setStatusCode(201)
                    ->addMeta('status_code', '201');
    }

    /**
     * 显示单条商品类别 
     *  
     * @Post("/goodscates/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "code": "商品类别代码1",
     *          "name": "商品类别名1",
     *          "status": 1,
     *          "description": "商品类别详情1",
     *          "remark": "商品类别备注1",
     *          "created_at": "2018-06-14 16:33:26",
     *          "updated_at": "2018-06-14 16:33:26"
     *      })
     * })
     */
    public function show($id)
    {
        $goodscate = GoodsCategory::findOrFail($id);
        return $this->response->item($goodscate, new GoodsCategoryTransformer());
    }


/**
     * 修改商品类别 
     *  
     * @Patch("/goodscates/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "code": {
     *                  "商品类别代码不能重复"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 3,
     *          "code": "商品类别代码30",
     *          "name": "商品类别名30",
     *          "status": "1",
     *          "description": "商品类别详情30",
     *          "remark": "商品类别备注30",
     *          "created_at": "2018-06-14 16:40:54",
     *          "updated_at": "2018-06-14 16:43:00"
     *      })
     * })
     */
    public function update(GoodsCategoryRequest $request,GoodsCategory $goodscate)
    {
        $goodscate->update($request->all());
        return $this->response
                    ->item($goodscate, new GoodsCategoryTransformer())
                    ->setStatusCode(201);
    }

    /**
     * 删除商品类别 
     *  
     * @Delete("/goodscates/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(GoodsCategory $goodscate)
    {
        $goodscate->delete();
        return $this->noContent();
    }
    
    /**
     * 删除一组商品类别 
     *  
     * @Delete("/goodscates") 
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="商品类别id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(GoodsCategoryRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if(count($ids) !== GoodsCategory::destroy($ids)){
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
     * 更改一组商品类别状态 
     *  
     * @PUT("/goodscates") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="商品类别id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(GoodsCategoryRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if(count($ids) !== GoodsCategory::whereIn('id',$ids)->update(['status'=>$status])){
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
