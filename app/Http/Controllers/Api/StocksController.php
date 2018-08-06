<?php

namespace App\Http\Controllers\Api;

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
     * @Get("/stocks{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("status", type="warehouse_id", description="获取的仓库id", required=false)
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称1",
     *              "province": "仓库地（省）1",
     *              "city": "仓库地（市）1",
     *              "district": "仓库地（区）1sfd",
     *              "address": "仓库地（地址）1fdf",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-07 15:44:00",
     *              "updated_at": "2018-07-07 18:29:12"
     *          },
     *          "goods": {
     *              "id": 161,
     *              "commodity_code": "商品编码",
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
     *              "status": true,
     *              "is_stop_pro":  true,
     *              "created_at": "2018-07-13 18:48:47",
     *              "updated_at": "2018-07-13 18:48:47",
     *              "deleted_at": null
     *          },
     *          "pro_specs": {
     *              "id": 66,
     *              "goods_id": 161,
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
     *              "is_combination": false,
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
     *              "spec": "规格",
     *              "color": "颜色",
     *              "materials": "材质",
     *              "function": "功能",
     *              "special": "特殊",
     *              "other": "其他",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro":  true,
     *              "is_stop_pro": false,
     *              "status": true,
     *              "created_at": "2018-07-16 11:53:01",
     *              "updated_at": "2018-07-16 11:53:01",
     *              "deleted_at": null
     *          },
     *          "quantity": 10,
     *          "status": true,
     *          "created_at": "2018-07-16 17:08:11",
     *          "updated_at": "2018-07-16 17:08:11"
     *      },
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
     *      @Parameter("stocks[0][goods_id]",type="integer", description="商品id", required=true),
     *      @Parameter("stocks[0][pro_specs_id]",type="integer", description="产品规格id", required=true),
     *      @Parameter("stocks[0][quantity]",type="integer", description="库存数", required=true),
     *      @Parameter("stocks[0][status]",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "pro_specs_id": {
     *                  "产品规格id不能重复"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 3,
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称1",
     *              "province": "仓库地（省）1",
     *              "city": "仓库地（市）1",
     *              "district": "仓库地（区）1sfd",
     *              "address": "仓库地（地址）1fdf",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-07 15:44:00",
     *              "updated_at": "2018-07-07 18:29:12"
     *          },
     *          "goods": {
     *              "id": 161,
     *              "commodity_code": "商品编码",
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
     *              "status": true,
     *              "is_stop_pro":  true,
     *              "created_at": "2018-07-13 18:48:47",
     *              "updated_at": "2018-07-13 18:48:47",
     *              "deleted_at": null
     *          },
     *          "pro_specs": {
     *              "id": 68,
     *              "goods_id": 161,
     *              "spec_code": "规格编码3",
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
     *              "is_combination": false,
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
     *              "spec": "规格",
     *              "color": "颜色",
     *              "materials": "材质",
     *              "function": "功能",
     *              "special": "特殊",
     *              "other": "其他",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro":  true,
     *              "is_stop_pro": false,
     *              "status": true,
     *              "created_at": "2018-07-16 11:53:20",
     *              "updated_at": "2018-07-16 11:53:20",
     *              "deleted_at": null
     *          },
     *          "quantity": "10",
     *          "status": true,
     *          "created_at": "2018-07-16 17:18:36",
     *          "updated_at": "2018-07-16 17:18:36",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(StockRequest $request)
    {
        $stocks = collect($request->validated()['stocks']);
        //判断是否有重复的规格
        if($stocks->count() != $stocks->groupBy('pro_specs_id')->count())
            throw new StoreResourceFailedException('写入失败');

        $data = $stocks->map(function($item){
            $item['updated_at'] = Carbon::now()->toDateTimeString();
            $item['created_at'] = Carbon::now()->toDateTimeString();
            return $item;
        })->toArray();

        if(!Stock::query()->insert($data))
            throw new StoreResourceFailedException('写入失败');

        $warehouseId = $stocks->first()['warehouse_id'];
        $proSpecsId = $stocks->pluck('pro_specs_id')->all();

        $ref = Stock::where('warehouse_id',$warehouseId)->whereIn('pro_specs_id',$proSpecsId)->get();

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
     *          "id": 1,
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称1",
     *              "province": "仓库地（省）1",
     *              "city": "仓库地（市）1",
     *              "district": "仓库地（区）1sfd",
     *              "address": "仓库地（地址）1fdf",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-07 15:44:00",
     *              "updated_at": "2018-07-07 18:29:12"
     *          },
     *          "goods": {
     *              "id": 161,
     *              "commodity_code": "商品编码",
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
     *              "status": true,
     *              "is_stop_pro":  true,
     *              "created_at": "2018-07-13 18:48:47",
     *              "updated_at": "2018-07-13 18:48:47",
     *              "deleted_at": null
     *          },
     *          "pro_specs": {
     *              "id": 66,
     *              "goods_id": 161,
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
     *              "is_combination": false,
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
     *              "spec": "规格",
     *              "color": "颜色",
     *              "materials": "材质",
     *              "function": "功能",
     *              "special": "特殊",
     *              "other": "其他",
     *              "length": 10,
     *              "width": 10,
     *              "height": 10,
     *              "volume": 10,
     *              "weight": 10,
     *              "remark": "备注",
     *              "finished_pro":  true,
     *              "is_stop_pro": false,
     *              "status": true,
     *              "created_at": "2018-07-16 11:53:01",
     *              "updated_at": "2018-07-16 11:53:01",
     *              "deleted_at": null
     *          },
     *          "quantity": 10,
     *          "status": true,
     *          "created_at": "2018-07-16 17:08:11",
     *          "updated_at": "2018-07-16 17:08:11"
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
     *                  "goods_id": 19,
     *                  "product_spec_id": 3,
     *                  "commodity_code": "1",
     *                  "short_name": "1",
     *                  "pro_specs": "spec_code",
     *                  "spec": "1",
     *                  "color": "1",
     *                  "materials": "1"
     *              },
     *              {
     *                  "goods_id": 19,
     *                  "product_spec_id": 3,
     *                  "short_name": "1",
     *                  "pro_specs": "spec_code",
     *                  "spec": "1",
     *                  "color": "1",
     *                  "materials": "1"
     *              }
     *          }
     *      })
     * })
     */
    public function saveableProduct(\App\Http\Requests\Api\SaveableProductRequest $request , Stock $stock)
    {
        $warehouseID = $request->input('warehouses_id');
        $existence = $stock->getStcokByWarehouseId($warehouseID,['pro_specs_id'])->pluck('pro_specs_id')->toArray();

        return $this->response->collection(
            \App\Models\ProductSpec::query()->whereNotIn('id',$existence)->get(),
            new \App\Transformers\SaveableProductTransformer()
        );

    }

}
