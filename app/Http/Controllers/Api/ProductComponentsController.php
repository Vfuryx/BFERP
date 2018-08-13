<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductComponent;

use App\Transformers\ProductComponentTransformer;

use App\Http\Requests\Api\ProductComponentRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Http\Controllers\Traits\CURDTrait;

/**
 * 产品子件资源
 * @Resource("productcomponents",uri="/api")
 */
class ProductComponentsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = ProductComponentTransformer::class;
    const MODEL = ProductComponent::class;

    /**
     * 获取所有产品子件
     *
     * @Get("/productcomponents{?is_common}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("is_common", type="integer", description="是否通用子件", required=false, default="all"),
     *      @Parameter("except_id", type="integer", description="排除的id", required=false, default="all"),
     *      @Parameter("component_code", description="子件编码", required=false, default="all"),
     * })
     * @Response(200, body={
     *       "data": {
     *           {
     *              "id": 7,
     *              "product": {
     *                  "id": 23,
     *                  "commodity_code": "产品编码",
     *                  "jd_sn": "京东编码",
     *                  "vips_sn": "唯品会编码",
     *                  "factory_model": "工厂型号",
     *                  "short_name": "商品简称",
     *                  "shops_id": "1",
     *                  "shop_nick": "卖家昵称",
     *                  "supplier_id": 1,
     *                  "category_id": 1,
     *                  "remark": "备注",
     *                  "title": "商品标题",
     *                  "img": "http://bferp.test/#/basicInf/goodsMag",
     *                  "url": "http://bferp.test/#/basicInf/goodsMag",
     *                  "status": true,
     *                  "is_stop_pro": true,
     *                  "created_at": "2018-08-13 11:05:18",
     *                  "updated_at": "2018-08-13 11:05:18"
     *              },
     *              "component_code": "子件编码3",
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
     *              "distribution_method": {
     *                  "id": 12,
     *                  "name": "配送方式1",
     *                  "status": true,
     *                  "created_at": "2018-08-06 18:28:10",
     *                  "updated_at": "2018-08-06 18:28:10"
     *              },
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
     *              "created_at": "2018-08-13 11:05:18",
     *              "updated_at": "2018-08-13 11:05:18"
     *           }
     *       },
     * })
     */
    public function index(ProductComponentRequest $request)
    {
        $is_common = $except_id = $component_code = '';

        extract($request->validated());

        $goods = ProductComponent::query()
            ->when(!is_null($is_common), function($query) use ($is_common) {

                return $query->where('is_common', intval($is_common));

            })->when($except_id, function($query) use ($except_id) {

                return $query->where('id', '<>', intval($except_id));

            })->when($component_code, function($query) use ($component_code) {

                return $query->where('component_code', 'like', '%' . $component_code . '%');

            })->with('product', 'distributionMethod');

        return $this->response->collection($goods->get(), new ProductComponentTransformer());
    }


    /**
     * 显示单条产品子件
     *
     * @Get("/productcomponents/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 7,
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
     *          "component_code": "子件编码3",
     *          "jd_component_code": "京东子件编码",
     *          "vips_component_code": "唯品会子件编码",
     *          "tb_price": "10.00",
     *          "cost": "10.00",
     *          "price": "10.00",
     *          "highest_price": "10.00",
     *          "lowest_price": "10.00",
     *          "warehouse_cost": "10.00",
     *          "assembly_price": "10.00",
     *          "discount": "1.00",
     *          "commission": "1.00",
     *          "is_common": true,
     *          "package_quantity": 10,
     *          "package_costs": "10.00",
     *          "wooden_frame_costs": "10.00",
     *          "purchase_freight": "10.00",
     *          "inventory_warning": 10,
     *          "purchase_days_warning": 10,
     *          "available_warning": 10,
     *          "distribution_method": {
     *              "id": 12,
     *              "name": "配送方式1",
     *              "status": true,
     *              "created_at": "2018-08-06 18:28:10",
     *              "updated_at": "2018-08-06 18:28:10"
     *          },
     *          "bar_code": "1010",
     *          "img_url": "http://image.img.com/image",
     *          "spec": "规格",
     *          "color": "颜色",
     *          "materials": "材质",
     *          "function": "功能",
     *          "special": "特殊",
     *          "other": "其他",
     *          "longness": 10,
     *          "width": 10,
     *          "height": 10,
     *          "volume": 10,
     *          "weight": 10,
     *          "remark": "备注",
     *          "finished_pro": true,
     *          "is_stop_pro": true,
     *          "created_at": "2018-08-13 11:05:18",
     *          "updated_at": "2018-08-13 11:05:18"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 删除产品子件
     *
     * @Delete("/productcomponents/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(ProductComponent $productcomponent)
    {
        $this->traitDestroy($productcomponent);
    }

    /**
     * 删除一组产品子件
     *
     * @Delete("/productcomponents")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="产品子件id组 格式: 1,2,3,4 ", required=true)
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


}
