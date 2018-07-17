<?php

namespace App\Http\Controllers\Api;

use App\Models\Combination;
use App\Transformers\CombinationTransformer;
use App\Http\Requests\Api\CombinationRequest;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 组合资源
 * @Resource("combinations",uri="/api")
 */
class CombinationsController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = CombinationTransformer::class;
    protected const MODEL = Combination::class;

    /**
     * 获取所有组合
     *
     * @Get("/combinations{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 1,
     *              "product_specs": {
     *                  "id": 3,
     *                  "goods_id": 1,
     *                  "spec_code": "规格编码1",
     *                  "jd_specs_code": "京东规格编码1",
     *                  "vips_specs_code": "唯品会规格编码1",
     *                  "tb_price": "10.00",
     *                  "cost": "10.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_combination": 0,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 1,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 1,
     *                  "bar_code": "条形码1",
     *                  "img_url": "http://image.img.com",
     *                  "spec": "规格1",
     *                  "color": "颜色1",
     *                  "materials": "材质1",
     *                  "function": "功能1",
     *                  "special": "特殊1",
     *                  "other": "其他1",
     *                  "length": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro": 1,
     *                  "is_stop_pro": 0,
     *                  "status": 1,
     *                  "created_at": "2018-07-07 10:41:02",
     *                  "updated_at": "2018-07-07 10:51:12",
     *                  "deleted_at": null
     *              },
     *              "com_pro_specs": {
     *                  "id": 4,
     *                  "goods_id": 1,
     *                  "spec_code": "规格编码2",
     *                  "jd_specs_code": "京东规格编码2",
     *                  "vips_specs_code": "唯品会规格编码2",
     *                  "tb_price": "10.00",
     *                  "cost": "10.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_combination": 0,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 1,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 1,
     *                  "bar_code": "条形码2",
     *                  "img_url": "http://image.img.com",
     *                  "spec": "规格2",
     *                  "color": "颜色2",
     *                  "materials": "材质2",
     *                  "function": "功能2",
     *                  "special": "特殊2",
     *                  "other": "其他2",
     *                  "length": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro": 1,
     *                  "is_stop_pro": 0,
     *                  "status": 1,
     *                  "created_at": "2018-07-07 11:29:49",
     *                  "updated_at": "2018-07-07 11:29:49",
     *                  "deleted_at": null
     *              },
     *              "count": 1,
     *              "status": 1,
     *              "created_at": "2018-07-06 16:59:20",
     *              "updated_at": "2018-07-06 16:59:20"
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
     *                   "next": "http://127.0.0.1:8000/api/combinations?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(CombinationRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增组合
     *
     * @Post("/combinations")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("product_specs_id",type="integer", description="产品规格id", required=true),
     *      @Parameter("com_pro_specs_id",type="integer", description="组合产品规格id", required=true),
     *      @Parameter("count",type="integer", description="组合件数", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "product_specs_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "com_pro_specs_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "count": {
     *                  "组合件数必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "product_specs": {
     *              "id": 3,
     *              "goods_id": 1,
     *              "spec_code": "规格编码1",
     *              "jd_specs_code": "京东规格编码1",
     *              "vips_specs_code": "唯品会规格编码1",
     *              "tb_price": "10.00",
     *              "cost": "10.00",
     *              "price": "10.00",
     *              "highest_price": "10.00",
     *              "lowest_price": "10.00",
     *              "warehouse_cost": "10.00",
     *              "assembly_price": "10.00",
     *              "discount": "1.00",
     *              "commission": "1.00",
     *              "is_combination": 0,
     *              "package_quantity": 10,
     *              "package_costs": "10.00",
     *              "wooden_frame_costs": "10.00",
     *              "purchase_freight": "10.00",
     *              "inventory_warning": 10,
     *              "purchase_days_warning": 1,
     *              "available_warning": 10,
     *              "distribution_method_id": 1,
     *              "bar_code": "条形码1",
     *              "img_url": "http://image.img.com",
     *              "spec": "规格1",
     *              "color": "颜色1",
     *              "materials": "材质1",
     *              "function": "功能1",
     *              "special": "特殊1",
     *              "other": "其他1",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro": 1,
     *              "is_stop_pro": 0,
     *              "status": 1,
     *              "created_at": "2018-07-07 10:41:02",
     *              "updated_at": "2018-07-07 10:51:12",
     *              "deleted_at": null
     *          },
     *          "com_pro_specs": {
     *              "id": 4,
     *              "goods_id": 1,
     *              "spec_code": "规格编码2",
     *              "jd_specs_code": "京东规格编码2",
     *              "vips_specs_code": "唯品会规格编码2",
     *              "tb_price": "10.00",
     *              "cost": "10.00",
     *              "price": "10.00",
     *              "highest_price": "10.00",
     *              "lowest_price": "10.00",
     *              "warehouse_cost": "10.00",
     *              "assembly_price": "10.00",
     *              "discount": "1.00",
     *              "commission": "1.00",
     *              "is_combination": 0,
     *              "package_quantity": 10,
     *              "package_costs": "10.00",
     *              "wooden_frame_costs": "10.00",
     *              "purchase_freight": "10.00",
     *              "inventory_warning": 10,
     *              "purchase_days_warning": 1,
     *              "available_warning": 10,
     *              "distribution_method_id": 1,
     *              "bar_code": "条形码2",
     *              "img_url": "http://image.img.com",
     *              "spec": "规格2",
     *              "color": "颜色2",
     *              "materials": "材质2",
     *              "function": "功能2",
     *              "special": "特殊2",
     *              "other": "其他2",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro": 1,
     *              "is_stop_pro": 0,
     *              "status": 1,
     *              "created_at": "2018-07-07 11:29:49",
     *              "updated_at": "2018-07-07 11:29:49",
     *              "deleted_at": null
     *          },
     *          "count": 1,
     *          "status": 1,
     *          "created_at": "2018-07-06 16:59:20",
     *          "updated_at": "2018-07-06 16:59:20",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
     public function store(CombinationRequest $request)
     {
         return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
     }


    /**
     * 显示单条组合
     *
     * @Get("/combinations/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "product_specs": {
     *              "id": 3,
     *              "goods_id": 1,
     *              "spec_code": "规格编码1",
     *              "jd_specs_code": "京东规格编码1",
     *              "vips_specs_code": "唯品会规格编码1",
     *              "tb_price": "10.00",
     *              "cost": "10.00",
     *              "price": "10.00",
     *              "highest_price": "10.00",
     *              "lowest_price": "10.00",
     *              "warehouse_cost": "10.00",
     *              "assembly_price": "10.00",
     *              "discount": "1.00",
     *              "commission": "1.00",
     *              "is_combination": 0,
     *              "package_quantity": 10,
     *              "package_costs": "10.00",
     *              "wooden_frame_costs": "10.00",
     *              "purchase_freight": "10.00",
     *              "inventory_warning": 10,
     *              "purchase_days_warning": 1,
     *              "available_warning": 10,
     *              "distribution_method_id": 1,
     *              "bar_code": "条形码1",
     *              "img_url": "http://image.img.com",
     *              "spec": "规格1",
     *              "color": "颜色1",
     *              "materials": "材质1",
     *              "function": "功能1",
     *              "special": "特殊1",
     *              "other": "其他1",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro": 1,
     *              "is_stop_pro": 0,
     *              "status": 1,
     *              "created_at": "2018-07-07 10:41:02",
     *              "updated_at": "2018-07-07 10:51:12",
     *              "deleted_at": null
     *          },
     *          "com_pro_specs": {
     *              "id": 4,
     *              "goods_id": 1,
     *              "spec_code": "规格编码2",
     *              "jd_specs_code": "京东规格编码2",
     *              "vips_specs_code": "唯品会规格编码2",
     *              "tb_price": "10.00",
     *              "cost": "10.00",
     *              "price": "10.00",
     *              "highest_price": "10.00",
     *              "lowest_price": "10.00",
     *              "warehouse_cost": "10.00",
     *              "assembly_price": "10.00",
     *              "discount": "1.00",
     *              "commission": "1.00",
     *              "is_combination": 0,
     *              "package_quantity": 10,
     *              "package_costs": "10.00",
     *              "wooden_frame_costs": "10.00",
     *              "purchase_freight": "10.00",
     *              "inventory_warning": 10,
     *              "purchase_days_warning": 1,
     *              "available_warning": 10,
     *              "distribution_method_id": 1,
     *              "bar_code": "条形码2",
     *              "img_url": "http://image.img.com",
     *              "spec": "规格2",
     *              "color": "颜色2",
     *              "materials": "材质2",
     *              "function": "功能2",
     *              "special": "特殊2",
     *              "other": "其他2",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro": 1,
     *              "is_stop_pro": 0,
     *              "status": 1,
     *              "created_at": "2018-07-07 11:29:49",
     *              "updated_at": "2018-07-07 11:29:49",
     *              "deleted_at": null
     *          },
     *          "count": 1,
     *          "status": 1,
     *          "created_at": "2018-07-06 16:59:20",
     *          "updated_at": "2018-07-06 16:59:20"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改组合
     *
     * @Patch("/combinations/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "product_specs_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "com_pro_specs_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "count": {
     *                  "组合件数必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "product_specs": {
     *              "id": 4,
     *              "goods_id": 1,
     *              "spec_code": "规格编码2",
     *              "jd_specs_code": "京东规格编码2",
     *              "vips_specs_code": "唯品会规格编码2",
     *              "tb_price": "10.00",
     *              "cost": "10.00",
     *              "price": "10.00",
     *              "highest_price": "10.00",
     *              "lowest_price": "10.00",
     *              "warehouse_cost": "10.00",
     *              "assembly_price": "10.00",
     *              "discount": "1.00",
     *              "commission": "1.00",
     *              "is_combination": 0,
     *              "package_quantity": 10,
     *              "package_costs": "10.00",
     *              "wooden_frame_costs": "10.00",
     *              "purchase_freight": "10.00",
     *              "inventory_warning": 10,
     *              "purchase_days_warning": 1,
     *              "available_warning": 10,
     *              "distribution_method_id": 1,
     *              "bar_code": "条形码2",
     *              "img_url": "http://image.img.com",
     *              "spec": "规格2",
     *              "color": "颜色2",
     *              "materials": "材质2",
     *              "function": "功能2",
     *              "special": "特殊2",
     *              "other": "其他2",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro": 1,
     *              "is_stop_pro": 0,
     *              "status": 1,
     *              "created_at": "2018-07-07 11:29:49",
     *              "updated_at": "2018-07-07 11:29:49",
     *              "deleted_at": null
     *          },
     *          "com_pro_specs": {
     *              "id": 3,
     *              "goods_id": 1,
     *              "spec_code": "规格编码1",
     *              "jd_specs_code": "京东规格编码1",
     *              "vips_specs_code": "唯品会规格编码1",
     *              "tb_price": "10.00",
     *              "cost": "10.00",
     *              "price": "10.00",
     *              "highest_price": "10.00",
     *              "lowest_price": "10.00",
     *              "warehouse_cost": "10.00",
     *              "assembly_price": "10.00",
     *              "discount": "1.00",
     *              "commission": "1.00",
     *              "is_combination": 0,
     *              "package_quantity": 10,
     *              "package_costs": "10.00",
     *              "wooden_frame_costs": "10.00",
     *              "purchase_freight": "10.00",
     *              "inventory_warning": 10,
     *              "purchase_days_warning": 1,
     *              "available_warning": 10,
     *              "distribution_method_id": 1,
     *              "bar_code": "条形码1",
     *              "img_url": "http://image.img.com",
     *              "spec": "规格1",
     *              "color": "颜色1",
     *              "materials": "材质1",
     *              "function": "功能1",
     *              "special": "特殊1",
     *              "other": "其他1",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro": 1,
     *              "is_stop_pro": 0,
     *              "status": 1,
     *              "created_at": "2018-07-07 10:41:02",
     *              "updated_at": "2018-07-07 10:51:12",
     *              "deleted_at": null
     *          },
     *          "count": "1",
     *          "status": 1,
     *          "created_at": "2018-07-06 16:59:20",
     *          "updated_at": "2018-07-07 11:38:16"
     *      })
     * })
     */
    public function update(CombinationRequest $request, Combination $combination)
    {
        return $this->traitUpdate($request, $combination, self::TRANSFORMER);
    }

    /**
     * 删除组合
     *
     * @Delete("/combinations/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Combination $combination)
    {
        return $this->traitDestroy($combination);
    }

    /**
     * 删除一组组合
     *
     * @Delete("/combinations")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="组合id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(CombinationRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组组合状态
     *
     * @PUT("/combinations")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="组合id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(CombinationRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }
}
