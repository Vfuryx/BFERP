<?php

namespace App\Http\Controllers\Api;

use App\Models\AccountingType as AccType;
use App\Transformers\AccountingTypeTransformer;
use App\Http\Requests\Api\AccountingTypeRequest;
use App\Http\Controllers\Traits\CURDTrait;


/**
 * 记账类型资源
 * @Resource("AccountingTypes",uri="/api")
 */
class AccountingTypesController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = AccountingTypeTransformer::class;
    protected const MODEL = AccType::class;

    /**
     * 获取所有记账类型
     *
     * @Get("/acctypes{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
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
     *               "total": 2,
     *               "count": 2,
     *               "per_page": 10,
     *               "current_page": 1,
     *               "total_pages": 1,
     *               "links": {
     *                   "previous": null,
     *                   "next": "http://127.0.0.1:8000/api/acctypes?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(AccountingTypeRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增记账类型
     *
     * @Post("/acctypes")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="记账类型名称", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
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
        return $this->traitStore($request->all(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条记账类型
     *
     * @Get("/acctypes/:id")
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
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
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
        return $this->traitUpdate($request, $acctype, self::TRANSFORMER);
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
        return $this->traitDestroy($acctype);
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
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组记账类型状态
     *
     * @PUT("/acctypes")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="记账类型id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(AccountingTypeRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }
}
