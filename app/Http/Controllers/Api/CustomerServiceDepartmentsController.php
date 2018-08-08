<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\Order;

use App\Http\Requests\Api\CustomerServiceDepartmentRequset;
use App\Transformers\CustomerServiceDepartmentTransformer;

use App\Http\Controllers\Traits\CURDTrait;

use Dingo\Api\Exception\DeleteResourceFailedException;

/**
 * 商品资源
 * @Resource("goods",uri="/api")
 */
class CustomerServiceDepartmentsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = CustomerServiceDepartmentTransformer::class;
    const MODEL = Order::class;
    const PerPage = 8;

    /**
     * 获取所有商品
     *
     * @Get("/goods{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     *       "data": {
     *       }
     * })
     */
    public function index(GoodsRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增商品
     *
     * @Post("/goods")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="商品编码", required=true),
     *      @Parameter("jd_sn", description="京东编码", required=false),
     *      @Parameter("vips_sn", description="唯品会编码", required=false),
     *      @Parameter("factory_model", description="工厂型号", required=false),
     *      @Parameter("short_name", description="商品简称", required=true),
     *      @Parameter("shops_id", type="integer", description="店铺id", required=true),
     *      @Parameter("shop_nick", description="卖家昵称（店铺昵称）", required=true),
     *      @Parameter("supplier_id",type="integer", description="供应商id", required=true),
     *      @Parameter("category_id",type="integer", description="产品类别id", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("title", description="商品标题", required=true),
     *      @Parameter("img", description="商品图片", required=false),
     *      @Parameter("url",type="url", description="商品网址", required=false),
     *      @Parameter("is_stop_pro",type="boolean", description="是否停产 默认 0 = 不停产  1 = 停产", required=false,default=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("productspecs[0][spec_code]", description="规格编码", required=true),
     *      @Parameter("productspecs[0][jd_specs_code]", description="京东规格编码", required=false),
     *      @Parameter("productspecs[0][vips_specs_code]", description="唯品会规格编码", required=false),
     *      @Parameter("productspecs[0][tb_price]", type="numeric", description="淘宝价格", required=true),
     *      @Parameter("productspecs[0][cost]", type="numeric", description="成本价格", required=true),
     *      @Parameter("productspecs[0][price]", type="numeric", description="售价", required=true),
     *      @Parameter("productspecs[0][highest_price]", type="numeric", description="最高售价", required=true),
     *      @Parameter("productspecs[0][lowest_price]", type="numeric", description="最低售价", required=true),
     *      @Parameter("productspecs[0][warehouse_cost]", type="numeric", description="仓库成本", required=false),
     *      @Parameter("productspecs[0][assembly_price]", type="numeric", description="装配价格", required=false),
     *      @Parameter("productspecs[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("productspecs[0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("productspecs[0][is_combination]", type="boolean", description="是否组合", required=true),
     *      @Parameter("productspecs[0][package_quantity]", type="integer", description="包件数量", required=false),
     *      @Parameter("productspecs[0][package_costs]", type="numeric", description="打包费用", required=false),
     *      @Parameter("productspecs[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("productspecs[0][purchase_freight]", type="numeric", description="采购运费", required=false),
     *      @Parameter("productspecs[0][inventory_warning]", type="integer", description="库存预警(数量)", required=true),
     *      @Parameter("productspecs[0][purchase_days_warning]", type="integer", description="采购预警天数", required=true),
     *      @Parameter("productspecs[0][available_warning]", type="integer", description="可售数预警", required=true),
     *      @Parameter("productspecs[0][distribution_method_id]", type="integer", description="配送类别", required=true),
     *      @Parameter("productspecs[0][bar_code]", description="条形码", required=false),
     *      @Parameter("productspecs[0][img_url]", description="图片地址", type="url", required=false),
     *      @Parameter("productspecs[0][spec]", description="规格", required=true),
     *      @Parameter("productspecs[0][color]", description="颜色", required=false),
     *      @Parameter("productspecs[0][materials]", description="材质", required=false),
     *      @Parameter("productspecs[0][function]", description="功能", required=false),
     *      @Parameter("productspecs[0][special]", description="特殊", required=false),
     *      @Parameter("productspecs[0][other]", description="其他", required=false),
     *      @Parameter("productspecs[0][longness]", type="numeric", description="长度（mm）", required=false),
     *      @Parameter("productspecs[0][width]", type="numeric", description="宽度（mm）", required=false),
     *      @Parameter("productspecs[0][height]", type="numeric", description="高度（mm）", required=false),
     *      @Parameter("productspecs[0][volume]", type="numeric", description="体积(m²)", required=false),
     *      @Parameter("productspecs[0][weight]", type="numeric", description="重量", required=false),
     *      @Parameter("productspecs[0][remark]", description="备注", required=false),
     *      @Parameter("productspecs[0][finished_pro]", type="integer", description="是否成品 0 不是 1 是", required=false),
     *      @Parameter("productspecs[0][is_stop_pro]", type="boolean", description="是否停产 0 不是 1 是", required=false),
     *      @Parameter("productspecs[0][combinations][0][com_pro_specs_id]", type="integer", description="组合产品规格id", required=true),
     * })
     * @Request({
     *      "commodity_code": "商品编码",
     *      "jd_sn": "京东编码",
     *      "vips_sn": "唯品会编码",
     *      "factory_model": "工厂型号",
     *      "short_name": "商品简称",
     *      "shops_id": 1,
     *      "shop_nick": "卖家昵称",
     *      "supplier_id": 1,
     *      "category_id": 1,
     *      "remark": "备注",
     *      "title": "商品标题",
     *      "img": "商品图片",
     *      "url": "https://www.taobao.com/",
     *      "status": true,
     *      "nis_stop_proick": 1,
     *      "productspecs[0][spec_code]":"规格编码1",
     *      "productspecs[0][jd_specs_code]":"京东规格编码",
     *      "productspecs[0][vips_specs_code]":"唯品会规格编码",
     *      "productspecs[0][tb_price]":"10",
     *      "productspecs[0][highest_price]":"10",
     *      "productspecs[0][price]":"10",
     *      "productspecs[0][lowest_price]":"10",
     *      "productspecs[0][warehouse_cost]":"10",
     *      "productspecs[0][assembly_price]":"10",
     *      "productspecs[0][discount]":"1",
     *      "productspecs[0][commission]":"1",
     *      "productspecs[0][is_combination]": true,
     *      "productspecs[0][package_quantity]":"10",
     *      "productspecs[0][package_costs]":"10",
     *      "productspecs[0][wooden_frame_costs]":"10",
     *      "productspecs[0][purchase_freight]":"10",
     *      "productspecs[0][inventory_warning]":"10",
     *      "productspecs[0][purchase_days_warning]":"10",
     *      "productspecs[0][available_warning]":"10",
     *      "productspecs[0][distribution_method_id]":"1",
     *      "productspecs[0][bar_code]":"条形码",
     *      "productspecs[0][img_url]":"http://image.img.com/image",
     *      "productspecs[0][spec]":"规格",
     *      "productspecs[0][color]":"颜色",
     *      "productspecs[0][materials]":"材质",
     *      "productspecs[0][function]":"功能",
     *      "productspecs[0][special]":"特殊",
     *      "productspecs[0][other]":"其他",
     *      "productspecs[0][longness]":"10",
     *      "productspecs[0][width]":"10",
     *      "productspecs[0][height]":"10",
     *      "productspecs[0][volume]":"10",
     *      "productspecs[0][weight]":"10",
     *      "productspecs[0][remark]":"备注",
     *      "productspecs[0][finished_pro]": true,
     *      "productspecs[0][is_stop_pro]": false,
     *      "productspecs[0][combinations][0][com_pro_specs_id]":"1",
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "url": {
     *                  "商品网址必须有效的url"
     *              },
     *              "category_id": {
     *                      "产品类别id必须int类型"
     *                  },
     *              "category_id": {
     *                      "需要添加的id在数据库中未找到或未启用"
     *                  },
     *              "supplier_id": {
     *                      "供应商id必须int类型"
     *                  },
     *             "productspecs": {
     *                  "产品规格必须是json格式"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *      })
     * })
     */
    public function store(GoodsRequest $goodsRequest,
                          ProductSpecRequest $productSpecRequest,
                          CombinationRequest $combinationRequest,
                          \App\Handlers\ValidatedHandler $validatedHandler)
    {

        $goods = DB::transaction(function() use (
            $goodsRequest,
            $productSpecRequest,
            $combinationRequest,
            $validatedHandler
        ) {

            $goods = Goods::create($goodsRequest->validated());

            if ($productSpecs = $goodsRequest->input('productspecs')) {

                foreach ($productSpecs as $productSpec) {

                    $proSpec = $goods->productSpecs()->create(
                        $validatedHandler->getValidatedData($productSpecRequest->rules(), $productSpec)
                    );

                    if ($productSpec['is_combination'] == 1 && isset($productSpec['combinations'])) {

                        foreach ($productSpec['combinations'] as $combination) {

                            $proSpec->combinations()->create(
                                $validatedHandler->getValidatedData($combinationRequest->rules(), $combination)
                            );
                        }
                    }
                }
            }
            return $goods;
        });

        return $this->response
            ->item($goods, new CustomerServiceDepartmentTransformer())
            ->setStatusCode(201)
            ->addMeta('status_code', '201');
    }

    /**
     * 显示单条商品
     *
     * @Get("/goods/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改商品
     *
     * @Patch("/goods/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="商品编码", required=false),
     *      @Parameter("jd_sn", description="京东编码", required=false),
     *      @Parameter("vips_sn", description="唯品会编码", required=false),
     *      @Parameter("factory_model", description="工厂型号", required=false),
     *      @Parameter("short_name", description="商品简称", required=false),
     *      @Parameter("shops_id", description="店铺id", required=false),
     *      @Parameter("shop_nick", description="卖家昵称（店铺昵称）", required=false),
     *      @Parameter("supplier_id",type="integer", description="供应商id", required=false),
     *      @Parameter("category_id",type="integer", description="产品类别id", required=false),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("title", description="商品标题", required=false),
     *      @Parameter("img", description="商品图片", required=false),
     *      @Parameter("url",type="url", description="商品网址", required=false),
     *      @Parameter("is_stop_pro", type="boolean", description="是否停产 默认 0 = 不停产  1 = 停产", required=false,default=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("productspecs[0][id]",type="integer", description="规格id ( 存在 id 视为更新，不存在视为插入 )", required=false),
     *      @Parameter("productspecs[0][spec_code]", description="规格编码", required=false),
     *      @Parameter("productspecs[0][jd_specs_code]", description="京东规格编码", required=false),
     *      @Parameter("productspecs[0][vips_specs_code]", description="唯品会规格编码", required=false),
     *      @Parameter("productspecs[0][tb_price]", type="numeric", description="淘宝价格", required=false),
     *      @Parameter("productspecs[0][cost]", type="numeric", description="成本价格", required=false),
     *      @Parameter("productspecs[0][price]", type="numeric", description="售价", required=false),
     *      @Parameter("productspecs[0][highest_price]", type="numeric", description="最高售价", required=false),
     *      @Parameter("productspecs[0][lowest_price]", type="numeric", description="最低售价", required=false),
     *      @Parameter("productspecs[0][warehouse_cost]", type="numeric", description="仓库成本", required=false),
     *      @Parameter("productspecs[0][assembly_price]", type="numeric", description="装配价格", required=false),
     *      @Parameter("productspecs[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("productspecs[0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("productspecs[0][is_combination]", type="boolean", description="是否组合", required=false),
     *      @Parameter("productspecs[0][package_quantity]", type="integer", description="包件数量", required=false),
     *      @Parameter("productspecs[0][package_costs]", type="numeric", description="打包费用", required=false),
     *      @Parameter("productspecs[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("productspecs[0][purchase_freight]", type="numeric", description="采购运费", required=false),
     *      @Parameter("productspecs[0][inventory_warning]", type="integer", description="库存预警(数量)", required=false),
     *      @Parameter("productspecs[0][purchase_days_warning]", type="integer", description="采购预警天数", required=false),
     *      @Parameter("productspecs[0][available_warning]", type="integer", description="可售数预警", required=false),
     *      @Parameter("productspecs[0][distribution_method_id]", type="integer", description="配送类别", required=false),
     *      @Parameter("productspecs[0][bar_code]", description="条形码", required=false),
     *      @Parameter("productspecs[0][img_url]", description="图片地址", type="url", required=false),
     *      @Parameter("productspecs[0][spec]", description="规格", required=false),
     *      @Parameter("productspecs[0][color]", description="颜色", required=false),
     *      @Parameter("productspecs[0][materials]", description="材质", required=false),
     *      @Parameter("productspecs[0][function]", description="功能", required=false),
     *      @Parameter("productspecs[0][special]", description="特殊", required=false),
     *      @Parameter("productspecs[0][other]", description="其他", required=false),
     *      @Parameter("productspecs[0][longness]", type="numeric", description="长度（mm）", required=false),
     *      @Parameter("productspecs[0][width]", type="numeric", description="宽度（mm）", required=false),
     *      @Parameter("productspecs[0][height]", type="numeric", description="高度（mm）", required=false),
     *      @Parameter("productspecs[0][volume]", type="numeric", description="体积(m²)", required=false),
     *      @Parameter("productspecs[0][weight]", type="numeric", description="重量", required=false),
     *      @Parameter("productspecs[0][remark]", description="备注", required=false),
     *      @Parameter("productspecs[0][finished_pro]", type="boolean", description="是否成品 0 不是 1 是", required=false),
     *      @Parameter("productspecs[0][is_stop_pro]", type="boolean", description="是否停产 0 不是 1 是", required=false),
     *      @Parameter("productspecs[0][combinations][0][id]", type="integer", description="组合id ( 存在 id 视为更新，不存在视为插入 )", required=false),
     *      @Parameter("productspecs[0][combinations][0][com_pro_specs_id]", type="integer", description="组合产品规格id", required=false),
     * })
     * @Request({
     *      "commodity_code": "商品编码",
     *      "jd_sn": "京东编码",
     *      "vips_sn": "唯品会编码",
     *      "factory_model": "工厂型号",
     *      "short_name": "商品简称",
     *      "shops_id": "店铺id",
     *      "shop_nick": "卖家昵称",
     *      "supplier_id": 1,
     *      "category_id": 1,
     *      "remark": "备注",
     *      "title": "商品标题",
     *      "img": "商品图片",
     *      "url": "https://www.taobao.com/",
     *      "status": true,
     *      "nis_stop_proick": 1,
     *      "productspecs[0][id]":"2",
     *      "productspecs[0][spec_code]":"规格编码1",
     *      "productspecs[0][jd_specs_code]":"京东规格编码",
     *      "productspecs[0][vips_specs_code]":"唯品会规格编码",
     *      "productspecs[0][tb_price]":"10",
     *      "productspecs[0][highest_price]":"10",
     *      "productspecs[0][price]":"10",
     *      "productspecs[0][lowest_price]":"10",
     *      "productspecs[0][warehouse_cost]":"10",
     *      "productspecs[0][assembly_price]":"10",
     *      "productspecs[0][discount]":"1",
     *      "productspecs[0][commission]":"1",
     *      "productspecs[0][is_combination]": true,
     *      "productspecs[0][package_quantity]":"10",
     *      "productspecs[0][package_costs]":"10",
     *      "productspecs[0][wooden_frame_costs]":"10",
     *      "productspecs[0][purchase_freight]":"10",
     *      "productspecs[0][inventory_warning]":"10",
     *      "productspecs[0][purchase_days_warning]":"10",
     *      "productspecs[0][available_warning]":"10",
     *      "productspecs[0][distribution_method_id]":"1",
     *      "productspecs[0][bar_code]":"条形码",
     *      "productspecs[0][img_url]":"http://image.img.com/image",
     *      "productspecs[0][spec]":"规格",
     *      "productspecs[0][color]":"颜色",
     *      "productspecs[0][materials]":"材质",
     *      "productspecs[0][function]":"功能",
     *      "productspecs[0][special]":"特殊",
     *      "productspecs[0][other]":"其他",
     *      "productspecs[0][longness]":"10",
     *      "productspecs[0][width]":"10",
     *      "productspecs[0][height]":"10",
     *      "productspecs[0][volume]":"10",
     *      "productspecs[0][weight]":"10",
     *      "productspecs[0][remark]":"备注",
     *      "productspecs[0][finished_pro]":true,
     *      "productspecs[0][is_stop_pro]": false,
     *      "productspecs[0][combinations][0][id]":"2",
     *      "productspecs[0][combinations][0][com_pro_specs_id]":"1",
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "url": {
     *                  "商品网址必须有效的url"
     *              },
     *              "category_id": {
     *                  "产品类别id必须int类型"
     *              },
     *              "category_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *              "supplier_id": {
     *                  "供应商id必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *      })
     * })
     */
    public function update(GoodsRequest $goodsRequest,
                           ProductSpecRequest $productSpecRequest,
                           CombinationRequest $combinationRequest,
                           Goods $goods,
                           \App\Handlers\ValidatedHandler $validatedHandler)
    {

        $goods = DB::transaction(function() use (
            $goodsRequest,
            $productSpecRequest,
            $combinationRequest,
            $goods,
            $validatedHandler
        ) {

            $goods->update($goodsRequest->validated());

            if ($productSpecs = $goodsRequest->input('productspecs')) {

                foreach ($productSpecs as $productSpec) {
                    //计算要通过的字段
                    $data = $validatedHandler->getValidatedData($productSpecRequest->rules(), $productSpec);

                    //存在id则更新，否则插入
                    if (isset($productSpec['id'])) {

                        $goods->productSpecs()->findOrFail($productSpec['id'])->update($data);

                        if ($productSpec['is_combination'] == 1 && isset($productSpec['combinations'])) {

                            foreach ($productSpec['combinations'] as $combination) {

                                $combinationData = $validatedHandler->getValidatedData(
                                    $combinationRequest->rules(), $combination
                                );
                                //存在id则更新，否则插入
                                if (isset($combination['id'])) {
                                    $goods->productSpecs()->findOrFail($productSpec['id'])
                                        ->combinations()->findOrFail($combination['id'])
                                        ->update($combinationData);
                                } else {
                                    $goods->productSpecs()->findOrFail($productSpec['id'])
                                        ->combinations()->create($combinationData);
                                }
                            }
                        }
                    } else {
                        $proSpec = $goods->productSpecs()->create($data);

                        if ($productSpec['is_combination'] == 1 && isset($productSpec['combinations'])) {

                            foreach ($productSpec['combinations'] as $combination) {
                                $proSpec->combinations()->create($validatedHandler->getValidatedData(
                                    $combinationRequest->rules(), $combination
                                ));
                            }
                        }
                    }
                }
            }
            return $goods;
        });

        return $this->response
            ->item($goods, new CustomerServiceDepartmentTransformer())
            ->setStatusCode(201);
    }


    /**
     * 删除商品
     *
     * @Delete("/goods/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Goods $goods)
    {
        DB::transaction(function() use ($goods) {
            //删除组合
            $productSpecs = $goods->productSpecs();
            $delCom = Combination::whereIn('product_specs_id', $productSpecs->pluck('id')->toArray())->delete();

            //删除规格
            $delPro = $productSpecs->delete();

            //删除产品
            $delGoods = $goods->delete();

            if ($delCom === false || $delPro === false || $delGoods === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 删除一组商品
     *
     * @Delete("/goods")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="商品id组 格式: 1,2,3,4 ", required=true)
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

        DB::transaction(function() use ($ids) {
            //删除组合
            $productSpecs = ProductSpec::whereIn('goods_id', $ids);
            $delCom = Combination::whereIn('product_specs_id', $productSpecs->pluck('id')->toArray())->delete();

            //删除规格
            $delPro = $productSpecs->delete();

            //删除产品
            $delGoods = Goods::destroy($ids);

            if ($delCom === false || $delPro === false || $delGoods === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 更改一组商品状态
     *
     * @PUT("/goods/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="商品id组 格式: 1,2,3,4 ", required=true),
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
}
