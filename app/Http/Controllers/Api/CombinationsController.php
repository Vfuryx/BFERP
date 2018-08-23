<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\Combination;
use App\Transformers\CombinationTransformer;
use App\Http\Requests\Api\CombinationRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 组合资源
 * @Resource("combinations",uri="/api")
 */
class CombinationsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = CombinationTransformer::class;
    const MODEL = Combination::class;
    const PerPage = 8;

    /**
     * 获取所有组合
     *
     * @Get("/combinations[?include=productComponents,product,orderItems]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     *       "data": {
     *          "id": 16,
     *          "product": {
     *              "id": 1,
     *              "commodity_code": "产品编码",
     *              "jd_sn": "京东编码",
     *              "vips_sn": "唯品会编码",
     *              "factory_model": "工厂型号",
     *              "short_name": "商品简称",
     *              "shops_id": "1",
     *              "shop_nick": "卖家昵称",
     *              "supplier_id": 1,
     *              "category_id": 1,
     *              "remark": "备注",
     *              "title": "商品标题",
     *              "img": "http://bferp.test/#/basicInf/goodsMag",
     *              "url": "http://bferp.test/#/basicInf/goodsMag",
     *              "status": true,
     *              "is_stop_pro": true,
     *              "created_at": "2018-08-10 23:58:40",
     *              "updated_at": "2018-08-10 23:58:40"
     *          },
     *          "name": "skuName",
     *          "product_components": {
     *              "data": {
     *                  {
     *                      "id": 1,
     *                      "pid": 2,
     *                      "component_code": "子件编码1",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:02:47",
     *                      "updated_at": "2018-08-11 01:02:47",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 1
     *                      }
     *                  },
     *                  {
     *                      "id": 2,
     *                      "pid": 3,
     *                      "component_code": "子件编码2",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:06:24",
     *                      "updated_at": "2018-08-11 01:06:24",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 2
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-08-11 14:33:48",
     *          "updated_at": "2018-08-11 14:33:48",
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
     *                   "next": "http://127.0.0.1:8000/api/combinations?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(CombinationRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10, 0);
    }


    /**
     * 新增组合
     *
     * @Post("/combinations")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("pid", type="integer", description="产品id", required=true),
     *      @Parameter("name", description="组合名称(sku)", required=true),
     *      @Parameter("product_components[0]", type="integer", description="子件id", required=false),
     * })
     * @Request({
     *      "pid": 23,
     *      "name": "skuName",
     *      "product_components[0]":7,
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "pid": {
     *                  "产品id必须是int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 6,
     *          "product": {
     *              "id": 23,
     *              "commodity_code": "产品编码",
     *              "jd_sn": "京东编码",
     *              "vips_sn": "唯品会编码",
     *              "factory_model": "工厂型号",
     *              "short_name": "商品简称",
     *              "shops_id": "1",
     *              "shop_nick": "卖家昵称",
     *              "supplier_id": 1,
     *              "category_id": 1,
     *              "remark": "备注",
     *              "title": "商品标题",
     *              "img": "http://bferp.test/#/basicInf/goodsMag",
     *              "url": "http://bferp.test/#/basicInf/goodsMag",
     *              "status": true,
     *              "is_stop_pro": true,
     *              "created_at": "2018-08-13 11:05:18",
     *              "updated_at": "2018-08-13 11:05:18"
     *          },
     *          "name": "skuName",
     *          "product_components": {
     *              "data": {
     *                  {
     *                      "id": 1,
     *                      "pid": 2,
     *                      "component_code": "子件编码1",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:02:47",
     *                      "updated_at": "2018-08-11 01:02:47",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 1
     *                      }
     *                  },
     *                  {
     *                      "id": 2,
     *                      "pid": 3,
     *                      "component_code": "子件编码2",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:06:24",
     *                      "updated_at": "2018-08-11 01:06:24",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 2
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-08-13 11:46:04",
     *          "updated_at": "2018-08-13 11:46:04",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(CombinationRequest $combinationRequest)
    {

        $combination = DB::transaction(function () use ($combinationRequest) {

            $combination = Combination::create($combinationRequest->validated());

            $combination->productComponents()->attach(
                array_keys(array_flip($combinationRequest->input('product_components')))
            );

            return $combination;
        });


        return $this->response
            ->item(Combination::query()->find($combination->id), new CombinationTransformer())
            ->setStatusCode(201)
            ->addMeta('status_code', '201');
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
     *          "id": 6,
     *          "product": {
     *              "id": 23,
     *              "commodity_code": "产品编码",
     *              "jd_sn": "京东编码",
     *              "vips_sn": "唯品会编码",
     *              "factory_model": "工厂型号",
     *              "short_name": "商品简称",
     *              "shops_id": "1",
     *              "shop_nick": "卖家昵称",
     *              "supplier_id": 1,
     *              "category_id": 1,
     *              "remark": "备注",
     *              "title": "商品标题",
     *              "img": "http://bferp.test/#/basicInf/goodsMag",
     *              "url": "http://bferp.test/#/basicInf/goodsMag",
     *              "status": true,
     *              "is_stop_pro": true,
     *              "created_at": "2018-08-13 11:05:18",
     *              "updated_at": "2018-08-13 11:05:18"
     *          },
     *          "name": "skuName",
     *          "product_components": {
     *              "data": {
     *                  {
     *                      "id": 1,
     *                      "pid": 2,
     *                      "component_code": "子件编码1",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:02:47",
     *                      "updated_at": "2018-08-11 01:02:47",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 1
     *                      }
     *                  },
     *                  {
     *                      "id": 2,
     *                      "pid": 3,
     *                      "component_code": "子件编码2",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:06:24",
     *                      "updated_at": "2018-08-11 01:06:24",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 2
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-08-13 11:46:04",
     *          "updated_at": "2018-08-13 11:46:04",
     *     })
     * })
     */
    public function show(Combination $combination)
    {
        return $this->traitShow($combination, self::TRANSFORMER);
    }

    /**
     * 修改组合
     *
     * @Patch("/combinations/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("pid", type="integer", description="产品id", required=false),
     *      @Parameter("name", description="组合名称(sku)", required=false),
     *      @Parameter("product_components[0]", type="integer", description="子件id", required=false),
     * })
     * @Request({
     *      "pid": "1",
     *      "name": "skuName",
     *      "product_components[0]":"1",
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "product_components": {
     *                  "子件id集合必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 16,
     *          "product": {
     *              "id": 1,
     *              "commodity_code": "产品编码",
     *              "jd_sn": "京东编码",
     *              "vips_sn": "唯品会编码",
     *              "factory_model": "工厂型号",
     *              "short_name": "商品简称",
     *              "shops_id": "1",
     *              "shop_nick": "卖家昵称",
     *              "supplier_id": 1,
     *              "category_id": 1,
     *              "remark": "备注",
     *              "title": "商品标题",
     *              "img": "http://bferp.test/#/basicInf/goodsMag",
     *              "url": "http://bferp.test/#/basicInf/goodsMag",
     *              "status": true,
     *              "is_stop_pro": true,
     *              "created_at": "2018-08-10 23:58:40",
     *              "updated_at": "2018-08-10 23:58:40"
     *          },
     *          "name": "skuName",
     *          "product_components": {
     *              "data": {
     *                  {
     *                      "id": 1,
     *                      "pid": 2,
     *                      "component_code": "子件编码1",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:02:47",
     *                      "updated_at": "2018-08-11 01:02:47",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 1
     *                      }
     *                  },
     *                  {
     *                      "id": 2,
     *                      "pid": 3,
     *                      "component_code": "子件编码2",
     *                      "jd_component_code": "京东子件编码",
     *                      "vips_component_code": "唯品会子件编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_common": true,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 10,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "1010",
     *                      "img_url": "http://image.img.com/image",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "longness": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-11 01:06:24",
     *                      "updated_at": "2018-08-11 01:06:24",
     *                      "pivot": {
     *                          "combinations_id": 16,
     *                          "product_components_id": 2
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-08-11 14:33:48",
     *          "updated_at": "2018-08-11 14:33:48",
     *      })
     * })
     */
    public function update(CombinationRequest $combinationRequest, Combination $combination)
    {


        $combination = DB::transaction(function () use ($combinationRequest, $combination) {

            $combination->update($combinationRequest->validated());

            $combination->productComponents()->sync(
                array_keys(array_flip($combinationRequest->input('product_components')))
            );

            return $combination;

        });

        return $this->response
            ->item(Combination::query()->find($combination->id), new CombinationTransformer())
            ->setStatusCode(201);
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
        //删除组合
        DB::transaction(function () use ($combination) {
            $combination->productComponents()->detach();
            $combination->delete();
        });

        return $this->noContent();
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

        $ids = explode(',', $request->input('ids'));

        DB::transaction(function () use ($ids) {
            \App\Models\CombinationProductComponent::whereIn('combinations_id',$ids)->delete();
            \App\Models\Combination::destroy($ids);
        });

        return $this->noContent();
    }


}
