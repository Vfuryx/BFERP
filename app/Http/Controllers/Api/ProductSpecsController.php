<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductSpec;
use App\Transformers\ProductSpecTransformer;
use App\Http\Requests\Api\ProductSpecRequest;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 产品规格资源
 * @Resource("productspecs",uri="/api")
 */
class ProductSpecsController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = ProductSpecTransformer::class;
    protected const MODEL = ProductSpec::class;

    /**
     * 获取所有产品规格
     *
     * @Get("/productspecs{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 1,
     *              "goods": {
     *                  "id": 1,
     *                  "goods_sn": "商品编码",
     *                  "jd_sn": "京东编码",
     *                  "vips_sn": "唯品会编码",
     *                  "factory_model": "工厂型号",
     *                  "short_name": "商品简称",
     *                  "nick": "卖家昵称1",
     *                  "supplier_id": 1,
     *                  "category_id": 1,
     *                  "remark": "备注",
     *                  "title": "商品标题",
     *                  "img": "商品图片",
     *                  "url": "https://www.taobao.com/",
     *                  "status": 1,
     *                  "is_stop_pro": 1,
     *                  "created_at": "2018-07-07 09:59:36",
     *                  "updated_at": "2018-07-07 10:06:01",
     *                  "deleted_at": null
     *              },
     *              "spec_code": "规格编码",
     *              "jd_specs_code": "京东规格编码",
     *              "vips_specs_code": "唯品会规格编码",
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
     *              "distribution_method": {
     *                  "id": 1,
     *                  "name": "配送方式",
     *                  "status": 1,
     *                  "created_at": "2018-07-07 10:40:40",
     *                  "updated_at": "2018-07-07 10:40:40"
     *              },
     *              "bar_code": "条形码",
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
     *           }
     *       },
     *       "meta": {
     *           "pagination": {
     *               "total": 1,
     *               "count": 1,
     *               "per_page": 10,
     *               "current_page": 1,
     *               "total_pages": 1,
     *               "links": {
     *                   "previous": null,
     *                   "next": "http://127.0.0.1:8000/api/productspecs?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(ProductSpecRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增产品规格
     *
     * @Post("/productspecs")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("goods_id",type="integer", description="产品id", required=true),
     *      @Parameter("spec_code", description="规格编码", required=true),
     *      @Parameter("jd_specs_code", description="京东规格编码", required=true),
     *      @Parameter("vips_specs_code", description="唯品会规格编码", required=true),
     *      @Parameter("tb_price",type="numeric", description="淘宝价格", required=true),
     *      @Parameter("cost",type="numeric", description="成本价格", required=true),
     *      @Parameter("price",type="numeric", description="售价", required=true),
     *      @Parameter("highest_price",type="numeric", description="最高售价", required=true),
     *      @Parameter("lowest_price",type="numeric", description="最低售价", required=true),
     *      @Parameter("warehouse_cost",type="numeric", description="仓库成本", required=true),
     *      @Parameter("assembly_price",type="numeric", description="装配价格", required=true),
     *      @Parameter("discount",type="numeric", description="折扣", required=true),
     *      @Parameter("commission",type="numeric", description="金佣点", required=true),
     *      @Parameter("is_combination",type="integer", description="是否组合", required=false,default=0),
     *      @Parameter("package_quantity",type="integer", description="包件数量", required=true),
     *      @Parameter("package_costs",type="numeric", description="打包费用", required=true),
     *      @Parameter("wooden_frame_costs",type="numeric", description="木架费", required=true),
     *      @Parameter("purchase_freight",type="numeric", description="采购运费", required=true),
     *      @Parameter("inventory_warning",type="integer", description="库存预警(数量)", required=true),
     *      @Parameter("purchase_days_warning",type="integer", description="采购预警天数", required=true),
     *      @Parameter("available_warning",type="integer", description="可售数预警", required=true),
     *      @Parameter("distribution_method_id",type="integer", description="配送类别", required=true),
     *      @Parameter("bar_code", description="条形码", required=true),
     *      @Parameter("img_url", type="url", description="图片地址", required=true),
     *      @Parameter("spec", description="规格", required=true),
     *      @Parameter("color", description="颜色", required=true),
     *      @Parameter("materials", description="材质", required=true),
     *      @Parameter("function", description="功能", required=true),
     *      @Parameter("special", description="特殊", required=true),
     *      @Parameter("other", description="其他", required=true),
     *      @Parameter("length",type="numeric", description="长度（mm）", required=true),
     *      @Parameter("width",type="numeric", description="宽度（mm）", required=true),
     *      @Parameter("height",type="numeric", description="高度（mm）", required=true),
     *      @Parameter("volume",type="numeric", description="体积(m²)", required=true),
     *      @Parameter("weight",type="numeric", description="重量", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("finished_pro",type="integer", description="是否成品 0 不是 1 是", required=false,default=0),
     *      @Parameter("is_stop_pro",type="integer", description="是否停产 0 不是 1 是", required=false,default=0),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "goods_id": {
     *                  "产品id必须int类型"
     *              },
     *              "tb_price": {
     *                  "淘宝价格必须是数字"
     *              },
     *              "package_quantity": {
     *                  "包件数量必填"
     *              },
     *              "img_url": {
     *                  "产品规格名称必填"
     *              },
     *              "name": {
     *                  "产品规格名称必填"
     *              },
     *              "name": {
     *                  "产品规格名称必填"
     *              },
     *              "name": {
     *                  "产品规格名称必填"
     *              },
     *              "name": {
     *                  "产品规格名称必填"
     *              },
     *              "name": {
     *                  "产品规格名称必填"
     *              },
     *              "name": {
     *                  "产品规格名称必填"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "goods": {
     *              "id": 1,
     *              "goods_sn": "商品编码",
     *              "jd_sn": "京东编码",
     *              "vips_sn": "唯品会编码",
     *              "factory_model": "工厂型号",
     *              "short_name": "商品简称",
     *              "nick": "卖家昵称",
     *              "supplier_id": 1,
     *              "category_id": 1,
     *              "remark": "备注",
     *              "title": "商品标题",
     *              "img": "商品图片",
     *              "url": "https://www.taobao.com/",
     *              "status": 1,
     *              "is_stop_pro": 1,
     *              "created_at": "2018-07-07 09:59:36",
     *              "updated_at": "2018-07-07 10:06:01",
     *              "deleted_at": null
     *          },
     *          "spec_code": "规格编码",
     *          "jd_specs_code": "京东规格编码",
     *          "vips_specs_code": "唯品会规格编码",
     *          "tb_price": "10.00",
     *          "cost": "10.00",
     *          "price": "10.00",
     *          "highest_price": "10.00",
     *          "lowest_price": "10.00",
     *          "warehouse_cost": "10.00",
     *          "assembly_price": "10.00",
     *          "discount": "1.00",
     *          "commission": "1.00",
     *          "is_combination": 0,
     *          "package_quantity": 10,
     *          "package_costs": "10.00",
     *          "wooden_frame_costs": "10.00",
     *          "purchase_freight": "10.00",
     *          "inventory_warning": 10,
     *          "purchase_days_warning": 1,
     *          "available_warning": 10,
     *          "distribution_method": {
     *          "id": 1,
     *          "name": "配送方式",
     *          "status": 1,
     *          "created_at": "2018-07-07 10:40:40",
     *          "updated_at": "2018-07-07 10:40:40"
     *          },
     *          "bar_code": "条形码",
     *          "img_url": "http://image.img.com",
     *          "spec": "规格1",
     *          "color": "颜色1",
     *          "materials": "材质1",
     *          "function": "功能1",
     *          "special": "特殊1",
     *          "other": "其他1",
     *          "length": 10,
     *          "width": 10,
     *          "height": 10,
     *          "volume": 10,
     *          "weight": 10,
     *          "remark": "备注",
     *          "finished_pro": 1,
     *          "is_stop_pro": 0,
     *          "status": 1,
     *          "created_at": "2018-07-07 10:41:02",
     *          "updated_at": "2018-07-07 10:51:12",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(ProductSpecRequest $request)
    {
        return $this->traitStore($request->all(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条产品规格
     *
     * @Get("/productspecs/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 3,
                "goods": {
                    "id": 1,
                    "goods_sn": "商品编码1",
                    "jd_sn": "京东编码1",
                    "vips_sn": "唯品会编码1",
                    "factory_model": "工厂型号1",
                    "short_name": "商品简称1",
                    "nick": "卖家昵称1",
                    "supplier_id": 1,
                    "category_id": 1,
                    "remark": "备注1",
                    "title": "商品标题1",
                    "img": "商品图片1",
                    "url": "https://www.taobao.com/",
                    "status": 1,
                    "is_stop_pro": 1,
                    "created_at": "2018-07-07 09:59:36",
                    "updated_at": "2018-07-07 10:06:01",
                    "deleted_at": null
                },
                "spec_code": "规格编码1",
                "jd_specs_code": "京东规格编码1",
                "vips_specs_code": "唯品会规格编码1",
                "tb_price": "10.00",
                "cost": "10.00",
                "price": "10.00",
                "highest_price": "10.00",
                "lowest_price": "10.00",
                "warehouse_cost": "10.00",
                "assembly_price": "10.00",
                "discount": "1.00",
                "commission": "1.00",
                "is_combination": 0,
                "package_quantity": 10,
                "package_costs": "10.00",
                "wooden_frame_costs": "10.00",
                "purchase_freight": "10.00",
                "inventory_warning": 10,
                "purchase_days_warning": 1,
                "available_warning": 10,
                "distribution_method": {
                    "id": 1,
                    "name": "配送方式",
                    "status": 1,
                    "created_at": "2018-07-07 10:40:40",
                    "updated_at": "2018-07-07 10:40:40"
                },
                "bar_code": "条形码1",
                "img_url": "http://image.img.com",
                "spec": "规格1",
                "color": "颜色1",
                "materials": "材质1",
                "function": "功能1",
                "special": "特殊1",
                "other": "其他1",
                "length": 10,
                "width": 10,
                "height": 10,
                "volume": 10,
                "weight": 10,
                "remark": "备注",
                "finished_pro": 1,
                "is_stop_pro": 0,
                "status": 1,
                "created_at": "2018-07-07 10:41:02",
                "updated_at": "2018-07-07 10:51:12"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改产品规格
     *
     * @Patch("/productspecs/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "goods_id": {
     *                  "产品id必须int类型"
     *              },
     *              "tb_price": {
     *                  "淘宝价格必须是数字"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 3,
     *          "goods_id": "1",
     *          "spec_code": "规格编码1",
     *          "jd_specs_code": "京东规格编码1",
     *          "vips_specs_code": "唯品会规格编码1",
     *          "tb_price": "10",
     *          "cost": "10",
     *          "price": "10",
     *          "highest_price": "10",
     *          "lowest_price": "10",
     *          "warehouse_cost": "10",
     *          "assembly_price": "10",
     *          "discount": "1",
     *          "commission": "1",
     *          "is_combination": "0",
     *          "package_quantity": "10",
     *          "package_costs": "10",
     *          "wooden_frame_costs": "10",
     *          "purchase_freight": "10",
     *          "inventory_warning": "10",
     *          "purchase_days_warning": "1",
     *          "available_warning": "10",
     *          "distribution_method": {
     *          "id": 1,
     *          "name": "配送方式",
     *          "status": 1,
     *          "created_at": "2018-07-07 10:40:40",
     *          "updated_at": "2018-07-07 10:40:40"
     *          },
     *          "bar_code": "条形码1",
     *          "img_url": "http://image.img.com",
     *          "spec": "规格1",
     *          "color": "颜色1",
     *          "materials": "材质1",
     *          "function": "功能1",
     *          "special": "特殊1",
     *          "other": "其他1",
     *          "length": "10",
     *          "width": "10",
     *          "height": "10",
     *          "volume": "10",
     *          "weight": "10",
     *          "remark": "备注",
     *          "finished_pro": "1",
     *          "is_stop_pro": "0",
     *          "status": "1",
     *          "created_at": "2018-07-07 10:41:02",
     *          "updated_at": "2018-07-07 10:51:12"
     *      })
     * })
     */
    public function update(ProductSpecRequest $request, ProductSpec $productspec)
    {
        return $this->traitUpdate($request, $productspec, self::TRANSFORMER);
    }

    /**
     * 删除产品规格
     *
     * @Delete("/productspecs/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ProductSpec $productspec)
    {

        return $this->traitDestroy($productspec);
    }

    /**
     * 删除一组产品规格
     *
     * @Delete("/productspecs")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="产品规格id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(ProductSpecRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组产品规格状态
     *
     * @PUT("/productspecs")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="产品规格id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(ProductSpecRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }
}
