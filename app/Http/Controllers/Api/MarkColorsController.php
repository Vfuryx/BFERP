<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\Api\MarkColorRequest;
use App\Models\MarkColor;
use App\Transformers\MarkColorTransformer;

/**
 * 标记颜色资源
 * @Resource("MarkColors",uri="/api")
 */
class MarkColorsController extends Controller
{
    /**
     * 获取所有标记颜色 
     *  
     * @Get("/markcolors") 
     * @Versions({"v1"})
     * @Response(200, body={
     * "data": {
     *         {
     *             "id": 1,
     *             "markcode": "CANCELORDER",
     *             "markname": "取消订单",
     *             "color": "#555555",
     *             "description": "描述",
     *             "status": 0,
     *             "created_at": "2018-06-11 15:04:17",
     *             "updated_at": "2018-06-11 15:04:17"
     *         },
     *         {
     *             "id": 2,
     *             "markcode": "TESTMARK",
     *             "markname": "测试挖",
     *             "color": "#888888",
     *             "description": "我不是描述",
     *             "status": 0,
     *             "created_at": "2018-06-12 09:52:16",
     *             "updated_at": "2018-06-12 09:52:16"
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
     *                 "next": "{{host}}/api/markcolors?page=2"
     *             }
     *         }
     *     }
     * })
     */
    public function index()
    {
        //不分页返回
        //return $this->response->collection(MarkColor::all(), new MarkColorTransformer());

        //分页响应返回
        $markcolors = MarkColor::paginate(15);
        return $this->response->paginator($markcolors, new MarkColorTransformer());
    }


    /**
     * 新增标记颜色 
     *  
     * @Post("/markcolors") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("markcode", description="标记代码", required=true),
     *      @Parameter("markname", description="标记名称", required=true),
     *      @Parameter("color", description="颜色", required=true),
     *      @Parameter("description", description="描述", required=false),
     *      @Parameter("status", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "status": {
     *                  "颜色必填"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 7,
     *          "markcode": "MARKCODE0",
     *          "markname": "标记名称0",
     *          "color": "颜色值0",
     *          "description": "描述0",
     *          "status": "1",
     *          "created_at": "2018-06-13 19:03:59",
     *          "updated_at": "2018-06-13 19:03:59",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(MarkColorRequest $request)
    {
        $markcolor = new MarkColor();
        $markcolor->fill($request->all());
        $markcolor->save();

        return $this->response
                    ->item($markcolor, new MarkColorTransformer())
                    ->setStatusCode(201)
                    ->addMeta('status_code', '201');
    }

    /**
     * 显示单条标记颜色 
     *  
     * @Post("/markcolors/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 7,
     *          "markcode": "MARKCODE0",
     *          "markname": "标记名称0",
     *          "color": "颜色值0",
     *          "description": "描述0",
     *          "status": "1",
     *          "created_at": "2018-06-13 19:03:59",
     *          "updated_at": "2018-06-13 19:03:59"
     *      })
     * })
     */
    public function show($id)
    {
        $markcolor = MarkColor::findOrFail($id);
        return $this->response->item($markcolor, new MarkColorTransformer());
    }


    /**
     * 修改标记颜色 
     *  
     * @Patch("/markcolors/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "markcode": {
     *                  "标记代码不能重复"
     *               }
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 7,
     *          "markcode": "MARKCODE0",
     *          "markname": "标记名称0",
     *          "color": "颜色值0",
     *          "description": "描述0",
     *          "status": "1",
     *          "created_at": "2018-06-13 19:03:59",
     *          "updated_at": "2018-06-13 19:03:59"
     *      })
     * })
     */
    public function update(MarkColorRequest $request, MarkColor $markcolor)
    {
        $markcolor->update($request->all());
        return $this->response
                    ->item($markcolor, new MarkColorTransformer())
                    ->setStatusCode(201);
    }

    /**
     * 删除标记颜色 
     *  
     * @Delete("/markcolors/:id") 
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(MarkColor $markcolor)
    {
        $markcolor->delete();
        return $this->noContent();
        // return $this->response->item($markcolor, new MarkColorTransformer());
    }

    
    /**
     * 删除一组标记颜色 
     *  
     * @Delete("/markcolors") 
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="标记颜色id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(MarkColorRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if(count($ids) !== MarkColor::destroy($ids)){
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
     * 更改一组标记颜色状态 
     *  
     * @PUT("/markcolors") 
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="标记颜色id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(MarkColorRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if(count($ids) !== MarkColor::whereIn('id',$ids)->update(['status'=>$status])){
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
