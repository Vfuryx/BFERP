<?php

namespace App\Http\Controllers\Api;

use App\Models\Warehouse;
use App\Http\Requests\Api\WarehouseRequest;
use App\Transformers\WarehouseTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 仓库资源
 * @Resource("warehouses",uri="/api")
 */
class WarehousesController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = WarehouseTransformer::class;
    protected const MODEL = Warehouse::class;
    
    /**
     * 获取所有仓库
     *
     * @Get("/warehouses{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *     {
     *          "id": 1,
     *          "name": "仓库名称1",
     *          "province": "仓库地（省）1",
     *          "city": "仓库地（市）1",
     *          "district": "仓库地（区）1",
     *          "address": "仓库地（地址）1",
     *          "is_default": 1,
     *          "status": 1,
     *          "created_at": "2018-07-04 10:06:35",
     *          "updated_at": "2018-07-04 10:06:35"
     *      },
     *      {
     *          "id": 2,
     *          "name": "仓库名称2",
     *          "province": "仓库地（省）2",
     *          "city": "仓库地（市）2",
     *          "district": "仓库地（区）2",
     *          "address": "仓库地（地址）2",
     *          "is_default": 0,
     *          "status": 1,
     *          "created_at": "2018-07-04 10:15:49",
     *          "updated_at": "2018-07-04 10:20:04"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *          "total": 2,
     *          "count": 2,
     *          "per_page": 10,
     *          "current_page": 1,
     *          "total_pages": 1,
     *          "links": null
     *         }
     *     }
     * })
     */
    public function index(WarehouseRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增仓库
     *
     * @Post("/warehouses")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="仓库名称", required=true),
     *      @Parameter("province", description="仓库地（省）", required=true),
     *      @Parameter("city", description="仓库地（市）", required=true),
     *      @Parameter("district", description="仓库地（区）", required=true),
     *      @Parameter("address", description="仓库地（地址）", required=true),
     *      @Parameter("is_default",type="integer", description="是否默认", required=false, default=0),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "is_default": {
     *                  "是否默认必须int类型"
     *              },
     *              "status": {
     *                  "状态必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "name": "仓库名称1",
     *          "province": "仓库地（省）1",
     *          "city": "仓库地（市）1",
     *          "district": "仓库地（区）1",
     *          "address": "仓库地（地址）1",
     *          "is_default": "1",
     *          "status": "1",
     *          "created_at": "2018-07-04 10:06:35",
     *          "updated_at": "2018-07-04 10:06:35",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(WarehouseRequest $request)
    {
        //是否要重置默认
        if($request->input('is_default') === '1'){
            $this->tableResetDefault(self::MODEL);
        }
        
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条仓库
     *
     * @Get("/warehouses/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 2,
     *          "name": "仓库名称2",
     *          "province": "仓库地（省）2",
     *          "city": "仓库地（市）2",
     *          "district": "仓库地（区）2",
     *          "address": "仓库地（地址）2",
     *          "is_default": 0,
     *          "status": 1,
     *          "created_at": "2018-07-04 10:15:49",
     *          "updated_at": "2018-07-04 10:20:04"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改仓库
     *
     * @Patch("/warehouses/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "is_default": {
     *                  "是否默认必须int类型"
     *              },
     *              "status": {
     *                  "状态必须int类型"
     *              },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 2,
     *          "name": "仓库名称2",
     *          "province": "仓库地（省）2",
     *          "city": "仓库地（市）2",
     *          "district": "仓库地（区）2",
     *          "address": "仓库地（地址）2",
     *          "is_default": "0",
     *          "status": "1",
     *          "created_at": "2018-07-04 10:15:49",
     *          "updated_at": "2018-07-04 10:20:04"
     *      })
     * })
     */
    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        //是否要重置默认
        if($request->input('is_default') === '1'){
            $this->tableResetDefault(self::MODEL);
        }

        return $this->traitUpdate($request, $warehouse, self::TRANSFORMER);
    }

    /**
     * 删除仓库
     *
     * @Delete("/warehouses/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Warehouse $warehouse)
    {
        return $this->traitDestroy($warehouse);
    }

    /**
     * 删除一组仓库
     *
     * @Delete("/warehouses")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="仓库id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(WarehouseRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组仓库状态
     * 
     * @PUT("/warehouses")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="仓库id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(WarehouseRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

}
