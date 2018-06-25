<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
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
     *      {
     *          "id": 1,
     *          "name": "费用类别1",
     *          "status": 1,
     *          "created_at": "2018-06-25 10:45:30",
     *          "updated_at": "2018-06-25 10:45:30"
     *      },
     *      {
     *          "id": 2,
     *          "name": "费用类别2",
     *          "status": 1,
     *          "created_at": "2018-06-25 10:45:32",
     *          "updated_at": "2018-06-25 10:45:32"
     *      }
     *   }
     * })
     */
    public function index()
    {
        return $this->response->collection(FeeCategory::all(), new FeeCategoryTransformer());

        //分页响应返回
        // $feecates = FeeCategory::paginate(2);
        // return $this->response->paginator($feecates, new FeeCategoryTransformer());
    }


    /**
     * 新增费用类别
     *
     * @Post("/feecates")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="费用类别名称", required=true),
     *      @Parameter("status", type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
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
     *          "status": 1,
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
     *              "status": 1,
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
     *          "status": 1,
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
     *      @Response(204, body={})
     * })
     */
    public function destroy(FeeCategory $feecate)
    {
        $feecate->delete();
        return $this->noContent();
    }


    /**
     * 删除一组费用类别
     *
     * @Delete("/feecates")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="费用类别id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(FeeCategoryRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            if (count($ids) !== FeeCategory::destroy($ids)) {
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
     * 更改一组费用类别状态
     *
     * @PUT("/feecates")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="费用类别id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(FeeCategoryRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        $status = $request->input('status');
        DB::beginTransaction();

        try {
            if (count($ids) !== FeeCategory::whereIn('id', $ids)->update(['status' => $status])) {
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
