<?php

namespace App\Http\Controllers\Api;

use App\Models\GoodsCategory;
use App\Http\Requests\Api\GoodsCategoryRequest;
use App\Transformers\GoodsCategoryTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 商品类别资源
 * @Resource("GoodsCategories",uri="/api")
 */
class GoodsCategoriesController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = GoodsCategoryTransformer::class;
    protected const MODEL = GoodsCategory::class;

    /**
     * 获取所有商品类别 
     *  
     * @Get("/goodscates{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
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
     *             "count": 5,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/goodscates?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(GoodsCategoryRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
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
        return $this->traitStore($request->all(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条商品类别 
     *  
     * @Get("/goodscates/:id")
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
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
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
        return $this->traitUpdate($request, $goodscate, self::TRANSFORMER);
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
        return $this->traitDestroy($goodscate);
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
        return $this->traitDestroybyIds($request, self::MODEL);
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
        return $this->traitEditStatusByIds($request, self::MODEL);
    }
}
