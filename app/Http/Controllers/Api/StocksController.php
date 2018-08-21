<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\Api\StockRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\StockTransformer;
use App\Models\Stock;
use App\Http\Controllers\Traits\CURDTrait;

use Carbon\Carbon;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * 库存资源
 * @Resource("stocks",uri="/api")
 */
class StocksController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = StockTransformer::class;
    const MODEL = Stock::class;

    /**
     * 获取所有库存
     *
     * @Get("/stocks[?status=true&include=warehouse,product,productComponent]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("warehouse_id", type="integer", description="获取的仓库id", required=false),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     *     "data": {
     *              {
     *                  "id": 10,
     *                  "warehouse": {
     *                      "id": 1,
     *                      "name": "仓库名称",
     *                      "province": "仓库地（省）",
     *                      "city": "仓库地（市）",
     *                      "district": "仓库地（区）",
     *                      "address": "仓库地（地址）",
     *                      "is_default": true,
     *                      "status": true,
     *                      "created_at": "2018-08-06 16:25:28",
     *                      "updated_at": "2018-08-06 16:25:28"
     *                  },
     *                  "product": {
     *                      "id": 24,
     *                      "commodity_code": "产品编码",
     *                      "jd_sn": "京东编码",
     *                      "vips_sn": "唯品会编码",
     *                      "factory_model": "工厂型号",
     *                      "short_name": "商品简称",
     *                      "shops_id": "1",
     *                      "shop_nick": "卖家昵称",
     *                      "supplier_id": 1,
     *                      "category_id": 1,
     *                      "remark": "备注",
     *                      "title": "商品标题",
     *                      "img": "/uploads/images/temp/201808/13/1_1534132543_6yliM4uees.jp",
     *                      "url": "http://bferp.test/#/basicInf/goodsMag",
     *                      "status": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-13 11:55:43",
     *                      "updated_at": "2018-08-13 11:55:43"
     *                  },
     *                  "product_component": {
     *                      "id": 8,
     *                      "pid": 24,
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
     *                      "distribution_method_id": 12,
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
     *                      "created_at": "2018-08-13 11:55:43",
     *                      "updated_at": "2018-08-13 11:55:43"
     *                  },
     *                  "quantity": 2,
     *                  "status": true,
     *                  "created_at": "2018-08-13 16:39:04",
     *                  "updated_at": "2018-08-13 16:39:04"
     *              },
     *              {
     *                  "id": 11,
     *                  "warehouse": {
     *                      "id": 1,
     *                      "name": "仓库名称",
     *                      "province": "仓库地（省）",
     *                      "city": "仓库地（市）",
     *                      "district": "仓库地（区）",
     *                      "address": "仓库地（地址）",
     *                      "is_default": true,
     *                      "status": true,
     *                      "created_at": "2018-08-06 16:25:28",
     *                      "updated_at": "2018-08-06 16:25:28"
     *                  },
     *                  "product": {
     *                      "id": 25,
     *                      "commodity_code": "产品编码1",
     *                      "jd_sn": "京东编码",
     *                      "vips_sn": "唯品会编码",
     *                      "factory_model": "工厂型号",
     *                      "short_name": "商品简称",
     *                      "shops_id": "1",
     *                      "shop_nick": "卖家昵称",
     *                      "supplier_id": 1,
     *                      "category_id": 1,
     *                      "remark": "备注",
     *                      "title": "商品标题",
     *                      "img": "http://bferp.test/#/basicInf/goodsMag",
     *                      "url": "http://bferp.test/#/basicInf/goodsMag",
     *                      "status": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-13 15:36:27",
     *                      "updated_at": "2018-08-13 15:36:27"
     *                  },
     *                  "product_component": {
     *                      "id": 9,
     *                      "pid": 25,
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
     *                      "distribution_method_id": 12,
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
     *                      "created_at": "2018-08-13 15:36:27",
     *                      "updated_at": "2018-08-13 15:36:27"
     *                  },
     *                  "quantity": 2,
     *                  "status": true,
     *                  "created_at": "2018-08-13 16:39:04",
     *                  "updated_at": "2018-08-13 16:39:04"
     *              }
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
    public function index(StockRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增库存
     *
     * @Post("/stocks")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("stocks[0][warehouse_id]",type="integer", description="仓库id", required=true),
     *      @Parameter("stocks[0][products_id]",type="integer", description="产品id", required=true),
     *      @Parameter("stocks[0][product_components_id]",type="integer", description="子件id", required=true),
     *      @Parameter("stocks[0][quantity]",type="integer", description="库存数", required=true),
     *      @Parameter("stocks[0][status]",type="integer", description="状态(0:停用，1:启用)", required=true),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "product_components_id": {
     *                  "产品id必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "data": {
     *              {
     *                  "id": 10,
     *                  "warehouse": {
     *                      "id": 1,
     *                      "name": "仓库名称",
     *                      "province": "仓库地（省）",
     *                      "city": "仓库地（市）",
     *                      "district": "仓库地（区）",
     *                      "address": "仓库地（地址）",
     *                      "is_default": true,
     *                      "status": true,
     *                      "created_at": "2018-08-06 16:25:28",
     *                      "updated_at": "2018-08-06 16:25:28"
     *                  },
     *                  "product": {
     *                      "id": 24,
     *                      "commodity_code": "产品编码",
     *                      "jd_sn": "京东编码",
     *                      "vips_sn": "唯品会编码",
     *                      "factory_model": "工厂型号",
     *                      "short_name": "商品简称",
     *                      "shops_id": "1",
     *                      "shop_nick": "卖家昵称",
     *                      "supplier_id": 1,
     *                      "category_id": 1,
     *                      "remark": "备注",
     *                      "title": "商品标题",
     *                      "img": "/uploads/images/temp/201808/13/1_1534132543_6yliM4uees.jp",
     *                      "url": "http://bferp.test/#/basicInf/goodsMag",
     *                      "status": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-13 11:55:43",
     *                      "updated_at": "2018-08-13 11:55:43"
     *                  },
     *                  "product_component": {
     *                      "id": 8,
     *                      "pid": 24,
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
     *                      "distribution_method_id": 12,
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
     *                      "created_at": "2018-08-13 11:55:43",
     *                      "updated_at": "2018-08-13 11:55:43"
     *                  },
     *                  "quantity": 2,
     *                  "status": true,
     *                  "created_at": "2018-08-13 16:39:04",
     *                  "updated_at": "2018-08-13 16:39:04"
     *              },
     *              {
     *                  "id": 11,
     *                  "warehouse": {
     *                      "id": 1,
     *                      "name": "仓库名称",
     *                      "province": "仓库地（省）",
     *                      "city": "仓库地（市）",
     *                      "district": "仓库地（区）",
     *                      "address": "仓库地（地址）",
     *                      "is_default": true,
     *                      "status": true,
     *                      "created_at": "2018-08-06 16:25:28",
     *                      "updated_at": "2018-08-06 16:25:28"
     *                  },
     *                  "product": {
     *                      "id": 25,
     *                      "commodity_code": "产品编码1",
     *                      "jd_sn": "京东编码",
     *                      "vips_sn": "唯品会编码",
     *                      "factory_model": "工厂型号",
     *                      "short_name": "商品简称",
     *                      "shops_id": "1",
     *                      "shop_nick": "卖家昵称",
     *                      "supplier_id": 1,
     *                      "category_id": 1,
     *                      "remark": "备注",
     *                      "title": "商品标题",
     *                      "img": "http://bferp.test/#/basicInf/goodsMag",
     *                      "url": "http://bferp.test/#/basicInf/goodsMag",
     *                      "status": true,
     *                      "is_stop_pro": true,
     *                      "created_at": "2018-08-13 15:36:27",
     *                      "updated_at": "2018-08-13 15:36:27"
     *                  },
     *                  "product_component": {
     *                      "id": 9,
     *                      "pid": 25,
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
     *                      "distribution_method_id": 12,
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
     *                      "created_at": "2018-08-13 15:36:27",
     *                      "updated_at": "2018-08-13 15:36:27"
     *                  },
     *                  "quantity": 2,
     *                  "status": true,
     *                  "created_at": "2018-08-13 16:39:04",
     *                  "updated_at": "2018-08-13 16:39:04"
     *              }
     *          }
     *      })
     * })
     */
    public function store(StockRequest $request)
    {
        $stocks = collect($request->validated()['stocks']);
        //判断是否有重复的规格
        if($stocks->count() != $stocks->groupBy('product_components_id')->count())
            throw new StoreResourceFailedException('写入失败');

        $data = $stocks->map(function($item){
            $item['updated_at'] = Carbon::now()->toDateTimeString();
            $item['created_at'] = Carbon::now()->toDateTimeString();
            return $item;
        })->toArray();

        DB::transaction(function () use ($data) {
            if(!Stock::query()->insert($data))
                throw new StoreResourceFailedException('写入失败');
        });

        //获取插入的模型
        $warehouseId = $stocks->first()['warehouse_id'];
        $proSpecsId = $stocks->pluck('product_components_id')->all();

        $ref = Stock::where('warehouse_id',$warehouseId)->whereIn('product_components_id',$proSpecsId)->get();

        return $this->response->collection($ref, self::TRANSFORMER)->setStatusCode(201);
    }

    /**
     * 显示单条库存
     *
     * @Get("/stocks/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 10,
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称",
     *              "province": "仓库地（省）",
     *              "city": "仓库地（市）",
     *              "district": "仓库地（区）",
     *              "address": "仓库地（地址）",
     *              "is_default": true,
     *              "status": true,
     *              "created_at": "2018-08-06 16:25:28",
     *              "updated_at": "2018-08-06 16:25:28"
     *          },
     *          "product": {
     *              "id": 24,
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
     *              "img": "/uploads/images/temp/201808/13/1_1534132543_6yliM4uees.jp",
     *              "url": "http://bferp.test/#/basicInf/goodsMag",
     *              "status": true,
     *              "is_stop_pro": true,
     *              "created_at": "2018-08-13 11:55:43",
     *              "updated_at": "2018-08-13 11:55:43"
     *          },
     *          "product_component": {
     *              "id": 8,
     *              "pid": 24,
     *              "component_code": "子件编码1",
     *              "jd_component_code": "京东子件编码",
     *              "vips_component_code": "唯品会子件编码",
     *              "tb_price": "10.00",
     *              "cost": "10.00",
     *              "price": "10.00",
     *              "highest_price": "10.00",
     *              "lowest_price": "10.00",
     *              "warehouse_cost": "10.00",
     *              "assembly_price": "10.00",
     *              "discount": "1.00",
     *              "commission": "1.00",
     *              "is_common": true,
     *              "package_quantity": 10,
     *              "package_costs": "10.00",
     *              "wooden_frame_costs": "10.00",
     *              "purchase_freight": "10.00",
     *              "inventory_warning": 10,
     *              "purchase_days_warning": 10,
     *              "available_warning": 10,
     *              "distribution_method_id": 12,
     *              "bar_code": "1010",
     *              "img_url": "http://image.img.com/image",
     *              "spec": "规格",
     *              "color": "颜色",
     *              "materials": "材质",
     *              "function": "功能",
     *              "special": "特殊",
     *              "other": "其他",
     *              "longness": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro": true,
     *              "is_stop_pro": true,
     *              "created_at": "2018-08-13 11:55:43",
     *              "updated_at": "2018-08-13 11:55:43"
     *          },
     *          "quantity": 2,
     *          "status": true,
     *          "created_at": "2018-08-13 16:39:04",
     *          "updated_at": "2018-08-13 16:39:04"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }


    /**
     * 删除库存
     *
     * @Delete("/stocks/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Stock $stock)
    {
        return $this->traitDestroy($stock);
    }

    /**
     * 删除一组库存
     *
     * @Delete("/stocks")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="库存id组 格式: 1,2,3,4 ", required=true)})
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
     * 更改一组库存状态
     * 
     * @PUT("/stocks/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="库存id组 格式: 1,2,3,4 ", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=true),
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


    /**
     * 根据仓库获取可写入的产品
     *
     * @Get("stocks/saveableproduct")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("warehouses_id", type="integer", description="仓库id", required=true)
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "warehouses_id": {
     *                  "仓库id必填"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(200, body={
     *          "data": {
     *              {
     *                  "pid": 25,
     *                  "product_components_id": 9,
     *                  "commodity_code": "产品编码1",
     *                  "short_name": "商品简称",
     *                  "component_code": "子件编码2",
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质"
     *              },
     *          }
     *      })
     * })
     */
    public function saveableProduct(\App\Http\Requests\Api\SaveableProductRequest $request , Stock $stock)
    {
        $warehouseID = $request->input('warehouses_id');
        $existence = $stock->getStcokByWarehouseId($warehouseID,['product_components_id'])->pluck('product_components_id')->toArray();

        return $this->response->collection(
            \App\Models\ProductComponent::query()->whereNotIn('id',$existence)->get(),
            new \App\Transformers\SaveableProductTransformer()
        );
    }

}
