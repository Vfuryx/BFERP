<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use App\Http\Requests\Api\DepartmentRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\DepartmentTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 部门资源
 * @Resource("departments",uri="/api")
 */
class DepartmentsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = DepartmentTransformer::class;
    const MODEL = Department::class;


    /**
     * 获取所有部门
     *
     * @Get("/departments{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "dept_no": "部门代码",
     *          "name": "部门名称",
     *          "p_dept": 0,
     *          "remark": "备注",
     *          "is_verify": 1,
     *          "status": 1,
     *          "created_at": "2018-07-05 17:37:17",
     *          "updated_at": "2018-07-05 17:37:17"
     *      },
     *      {
     *          "id": 2,
     *          "dept_no": "部门代码1",
     *          "name": "部门名称",
     *          "p_dept": 1,
     *          "remark": "备注",
     *          "is_verify": 1,
     *          "status": 1,
     *          "created_at": "2018-07-05 17:39:24",
     *          "updated_at": "2018-07-05 17:39:24"
     *      },
     *      {
     *          "id": 3,
     *          "dept_no": "部门代码3",
     *          "name": "部门名称3",
     *          "p_dept": 0,
     *          "remark": "备注",
     *          "is_verify": 1,
     *          "status": 1,
     *          "created_at": "2018-07-05 17:42:06",
     *          "updated_at": "2018-07-05 17:42:06"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(DepartmentRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增部门
     *
     * @Post("/departments")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("dept_no", description="部门代码", required=true),
     *      @Parameter("name", description="部门名称", required=true),
     *      @Parameter("p_dept", type="integer", description="所属主部门", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("is_verify",type="integer", description="是否已经验证", required=false,default=0),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "dept_no": {
     *                  "部门代码不能重复"
     *              },
     *              "p_dept": {
     *                  "需要添加的id在数据库中未找到或未启用或未验证"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "dept_no": "部门代码",
     *          "name": "部门名称",
     *          "p_dept": "0",
     *          "remark": "备注",
     *          "is_verify": "1",
     *          "status": "1",
     *          "created_at": "2018-07-05 17:42:06",
     *          "updated_at": "2018-07-05 17:42:06",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(DepartmentRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条部门
     *
     * @Get("/departments/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "dept_no": "部门代码",
     *          "name": "部门名称",
     *          "p_dept": 0,
     *          "remark": "备注",
     *          "is_verify": 1,
     *          "status": 1,
     *          "created_at": "2018-07-05 17:37:17",
     *          "updated_at": "2018-07-05 17:37:17"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改部门
     *
     * @Patch("/departments/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "dept_no": {
     *                  "部门代码不能重复"
     *               },
     *              "p_dept": {
     *                  "需要添加的id在数据库中未找到或未启用或未验证"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "dept_no": "部门代码",
     *          "name": "部门名称",
     *          "p_dept": 0,
     *          "remark": "备注",
     *          "is_verify": 1,
     *          "status": 1,
     *          "created_at": "2018-07-05 17:37:17",
     *          "updated_at": "2018-07-05 17:37:17"
     *      })
     * })
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        return $this->traitUpdate($request, $department, self::TRANSFORMER);
    }

    /**
     * 删除部门
     *
     * @Delete("/departments/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Department $department)
    {
        return $this->traitDestroy($department);
    }

    /**
     * 删除一组部门
     *
     * @Delete("/departments")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="部门id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(DestroyRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组部门状态
     *
     * @PUT("/departments/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="部门id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(EditStatuRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }
}
