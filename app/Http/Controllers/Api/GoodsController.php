<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\Goods;
use App\Models\ProductSpec;
use App\Models\Combination;

use App\Http\Requests\Api\GoodsRequest;
use App\Http\Requests\Api\ProductSpecRequest;
use App\Http\Requests\Api\CombinationRequest;
use App\Http\Requests\Api\SearchGoodsRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\GoodsTransformer;
use App\Http\Controllers\Traits\CURDTrait;

use Dingo\Api\Exception\DeleteResourceFailedException;

/**
 * 商品资源
 * @Resource("goods",uri="/api")
 */
class GoodsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = GoodsTransformer::class;
    const MODEL = Goods::class;
    const PerPage = 8;

    /**
     * 获取所有商品
     *
     * @Get("/goods/search{?commodity_code}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="商品编码", required=false, default="all"),
     *      @Parameter("shops_id", type="integer", description="店铺id", required=false, default="all"),
     *      @Parameter("spec_code", description="规格编码", required=false, default="all"),
     * })
     *
     * */
    public function searchGoods(SearchGoodsRequest $request)
    {
        $commodity_code = $shops_id = $spec_code = '';

        extract($request->validated());

        $goods = Goods::query()
            ->when($commodity_code, function($query) use ($commodity_code) {

                return $query->where('commodity_code', 'like', '%' . $commodity_code . '%');

            })->when($shops_id, function($query) use ($shops_id) {

                return $query->where('shops_id', '=', $shops_id);

            })->whereHas('productSpecs', function($query) use ($spec_code) {

                $query->when($spec_code, function($query) use ($spec_code) {

                    return $query->where('spec_code', 'like', '%' . $spec_code . '%');

                });
            })->with('productSpecs');

        return $this->response->paginator($goods->paginate(self::PerPage), new GoodsTransformer());
    }

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
     *           {
     *          "id": 1,
     *          "commodity_code": "商品编码",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "shops_id": "店铺id",
     *          "shop_nick": "卖家昵称",
     *          "supplier": {
     *              "id": 1,
     *              "name": "供应商名称",
     *              "company": "供应商公司",
     *              "code": "公司代码",
     *              "province": "省",
     *              "city": "市",
     *              "district": "区",
     *              "address": "地址",
     *              "zipcode": "邮编",
     *              "contacts": "联系人",
     *              "phone": "电话",
     *              "mobile": "手机",
     *              "fax": "传真",
     *              "email": "935661686@qq.com",
     *              "remark": "备注",
     *              "is_scan": true,
     *              "status": true,
     *              "auto_valuation": true,
     *              "created_at": "2018-07-07 15:05:24",
     *              "updated_at": "2018-07-07 15:05:24"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-07-07 15:05:38",
     *              "updated_at": "2018-07-07 15:05:38"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "商品图片",
     *          "url": "https://www.taobao.com/",
     *          "status": true,
     *          "is_stop_pro":  true,
     *          "productspecs": {{
     *                  "id": 2,
     *                  "goods_id": 1,
     *                  "spec_code": "规格编码",
     *                  "jd_specs_code": "京东规格编码",
     *                  "vips_specs_code": "唯品会规格编码",
     *                  "tb_price": "10.00",
     *                  "cost": "10.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_combination": true,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 1,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 1,
     *                  "bar_code": "条形码",
     *                  "img_url": "http://image.img.com",
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "longness": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro":  true,
     *                  "finished_pro":  true,
     *                  "is_stop_pro": false,
     *                  "created_at": "2018-07-09 18:01:34",
     *                  "updated_at": "2018-07-09 18:01:34",
     *                  "deleted_at": null,
     *                  "combinations": {{
     *                          "id": 1,
     *                          "product_specs_id": 2,
     *                          "com_pro_specs_id": 1,
     *                          "status": true,
     *                          "created_at": "2018-07-09 18:01:34",
     *                          "updated_at": "2018-07-09 18:01:34",
     *                          "deleted_at": null,
     *                          "com_pro_spec": {
     *                              "id": 1,
     *                              "goods_id": 11,
     *                              "spec_code": "规格编码10",
     *                              "jd_specs_code": "京东规格编码",
     *                              "vips_specs_code": "唯品会规格编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_combination": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 1,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 1,
     *                              "bar_code": "条形码2",
     *                              "img_url": "http://image.img.com",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro":  true,
     *                              "is_stop_pro": false,
     *                              "created_at": "2018-07-09 11:07:53",
     *                              "updated_at": "2018-07-09 11:07:53",
     *                              "deleted_at": null
     *                          }
     *                      },
     *                      {
     *                          "id": 2,
     *                          "product_specs_id": 2,
     *                          "com_pro_specs_id": 1,
     *                          "status": true,
     *                          "created_at": "2018-07-09 18:01:34",
     *                          "updated_at": "2018-07-09 18:01:34",
     *                          "deleted_at": null,
     *                          "com_pro_spec": {
     *                              "id": 1,
     *                              "goods_id": 11,
     *                              "spec_code": "规格编码10",
     *                              "jd_specs_code": "京东规格编码",
     *                              "vips_specs_code": "唯品会规格编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_combination": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 1,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 1,
     *                              "bar_code": "条形码2",
     *                              "img_url": "http://image.img.com",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro":  true,
     *                              "is_stop_pro": false,
     *                              "created_at": "2018-07-09 11:07:53",
     *                              "updated_at": "2018-07-09 11:07:53",
     *                              "deleted_at": null
     *                          }
     *                      }
     *                  }
     *              },
     *              {
     *                  "id": 3,
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
     *                  "is_combination": false,
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
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "longness": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro":  true,
     *                  "is_stop_pro": false,
     *                  "status": true,
     *                  "created_at": "2018-07-09 18:01:35",
     *                  "updated_at": "2018-07-09 18:01:35",
     *                  "deleted_at": null,
     *                  "combinations": {}
     *              }
     *          },
     *          "created_at": "2018-07-09 18:01:34",
     *          "updated_at": "2018-07-09 18:01:34",
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
     *                   "next": "http://127.0.0.1:8000/api/goods?page=1"
     *               }
     *           }
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
     *          "id": 20,
     *          "commodity_code": "商品编码1",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "shops_id": "店铺id",
     *          "shop_nick": "卖家昵称",
     *          "supplier": {
     *              "id": 1,
     *              "name": "1",
     *              "company": "1",
     *              "code": "1",
     *              "province": "1",
     *              "city": "1",
     *              "district": "1",
     *              "address": "1",
     *              "zipcode": "1",
     *              "contacts": "1",
     *              "phone": "1",
     *              "mobile": "132131343242",
     *              "fax": "1",
     *              "email": "132@re.cn",
     *              "remark": "1",
     *              "is_scan": true,
     *              "status": true,
     *              "auto_valuation": true,
     *              "created_at": "2018-07-17 17:54:01",
     *              "updated_at": "2018-07-17 17:54:01"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "1",
     *              "name": "1",
     *              "description": "1",
     *              "remark": "1",
     *              "status": true,
     *              "created_at": "2018-07-17 17:54:34",
     *              "updated_at": "2018-07-17 17:54:34"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "https://www.taobao.com/img",
     *          "url": "https://www.taobao.com/",
     *          "status": true,
     *          "is_stop_pro": false,
     *          "productspecs": {
     *              {
     *                  "id": 7,
     *                  "goods_id": 20,
     *                  "spec_code": "规格编码1",
     *                  "jd_specs_code": "京东规格编码",
     *                  "vips_specs_code": "唯品会规格编码",
     *                  "tb_price": "10.00",
     *                  "cost": "0.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_combination": true,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 10,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 1,
     *                  "bar_code": "条形码",
     *                  "img_url": "http://image.img.com/image",
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "longness": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro":  true,
     *                  "is_stop_pro": false,
     *                  "created_at": "2018-07-25 15:06:12",
     *                  "updated_at": "2018-07-25 15:06:12",
     *                  "combinations": {
     *                      {
     *                          "id": 8,
     *                          "product_specs_id": 7,
     *                          "com_pro_specs_id": 1,
     *                          "created_at": "2018-07-25 15:06:13",
     *                          "updated_at": "2018-07-25 15:06:13",
     *                          "com_pro_spec": {
     *                              "id": 1,
     *                              "goods_id": 1,
     *                              "spec_code": "规格编码",
     *                              "jd_specs_code": "京东规格编码",
     *                              "vips_specs_code": "唯品会规格编码",
     *                              "tb_price": "1.00",
     *                              "cost": "1.00",
     *                              "price": "1.00",
     *                              "highest_price": "1.00",
     *                              "lowest_price": "1.00",
     *                              "warehouse_cost": "1.00",
     *                              "assembly_price": "1.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_combination": false,
     *                              "package_quantity": 1,
     *                              "package_costs": "1.00",
     *                              "wooden_frame_costs": "1.00",
     *                              "purchase_freight": "1.00",
     *                              "inventory_warning": 1,
     *                              "purchase_days_warning": 1,
     *                              "available_warning": 1,
     *                              "distribution_method_id": 1,
     *                              "bar_code": "条形码",
     *                              "img_url": "http://image.img.com/image",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 1,
     *                              "width": 1,
     *                              "height": 1,
     *                              "volume": 1,
     *                              "weight": 1,
     *                              "remark": "备注",
     *                              "finished_pro":  true,
     *                              "is_stop_pro": false,
     *                              "created_at": "2018-07-25 11:01:45",
     *                              "updated_at": "2018-07-25 11:01:48"
     *                          }
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-25 15:06:12",
     *          "updated_at": "2018-07-25 15:06:12",
     *          "meta": {
     *              "status_code": "201"
     *          }
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
            ->item($goods, new GoodsTransformer())
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
     *          "id": 20,
     *          "commodity_code": "商品编码1",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "shops_id": 1,
     *          "shop_nick": "卖家昵称",
     *          "supplier": {
     *              "id": 1,
     *              "name": "1",
     *              "company": "1",
     *              "code": "1",
     *              "province": "1",
     *              "city": "1",
     *              "district": "1",
     *              "address": "1",
     *              "zipcode": "1",
     *              "contacts": "1",
     *              "phone": "1",
     *              "mobile": "132131343242",
     *              "fax": "1",
     *              "email": "132@re.cn",
     *              "remark": "1",
     *              "is_scan": true,
     *              "status": true,
     *              "auto_valuation": true,
     *              "created_at": "2018-07-17 17:54:01",
     *              "updated_at": "2018-07-17 17:54:01"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "1",
     *              "name": "1",
     *              "description": "1",
     *              "remark": "1",
     *              "status": true,
     *              "created_at": "2018-07-17 17:54:34",
     *              "updated_at": "2018-07-17 17:54:34"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "https://www.taobao.com/img",
     *          "url": "https://www.taobao.com/",
     *          "status": true,
     *          "is_stop_pro": false,
     *          "productspecs": {
     *              {
     *                  "id": 7,
     *                  "goods_id": 20,
     *                  "spec_code": "规格编码1",
     *                  "jd_specs_code": "京东规格编码",
     *                  "vips_specs_code": "唯品会规格编码",
     *                  "tb_price": "10.00",
     *                  "cost": "0.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_combination": true,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 10,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 1,
     *                  "bar_code": "条形码",
     *                  "img_url": "http://image.img.com/image",
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "longness": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro":  true,
     *                  "is_stop_pro": false,
     *                  "created_at": "2018-07-25 15:06:12",
     *                  "updated_at": "2018-07-25 15:06:12",
     *                  "combinations": {
     *                      {
     *                          "id": 8,
     *                          "product_specs_id": 7,
     *                          "com_pro_specs_id": 1,
     *                          "created_at": "2018-07-25 15:06:13",
     *                          "updated_at": "2018-07-25 15:06:13",
     *                          "com_pro_spec": {
     *                              "id": 1,
     *                              "goods_id": 1,
     *                              "spec_code": "规格编码",
     *                              "jd_specs_code": "京东规格编码",
     *                              "vips_specs_code": "唯品会规格编码",
     *                              "tb_price": "1.00",
     *                              "cost": "1.00",
     *                              "price": "1.00",
     *                              "highest_price": "1.00",
     *                              "lowest_price": "1.00",
     *                              "warehouse_cost": "1.00",
     *                              "assembly_price": "1.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_combination": false,
     *                              "package_quantity": 1,
     *                              "package_costs": "1.00",
     *                              "wooden_frame_costs": "1.00",
     *                              "purchase_freight": "1.00",
     *                              "inventory_warning": 1,
     *                              "purchase_days_warning": 1,
     *                              "available_warning": 1,
     *                              "distribution_method_id": 1,
     *                              "bar_code": "条形码",
     *                              "img_url": "http://image.img.com/image",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 1,
     *                              "width": 1,
     *                              "height": 1,
     *                              "volume": 1,
     *                              "weight": 1,
     *                              "remark": "备注",
     *                              "finished_pro":  true,
     *                              "is_stop_pro": false,
     *                              "created_at": "2018-07-25 11:01:45",
     *                              "updated_at": "2018-07-25 11:01:48"
     *                          }
     *                      }
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-25 15:06:12",
     *          "updated_at": "2018-07-25 15:06:12",     *      })
     * })
     */
    public function show(Goods $goods)
    {
        return $this->traitShow($goods, self::TRANSFORMER);
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
     *          "id": 1,
     *          "commodity_code": "商品编码1",
     *          "jd_sn": "京东编码1",
     *          "vips_sn": "唯品会编码1",
     *          "factory_model": "工厂型号1",
     *          "short_name": "商品简称1",
     *          "shops_id": "商品简称",
     *          "shop_nick": "店铺id",
     *          "supplier": {
     *              "id": 1,
     *              "name": "供应商名称",
     *              "company": "供应商公司",
     *              "code": "公司代码",
     *              "province": "省",
     *              "city": "市",
     *              "district": "区",
     *              "address": "地址",
     *              "zipcode": "邮编",
     *              "contacts": "联系人",
     *              "phone": "电话",
     *              "mobile": "手机",
     *              "fax": "传真",
     *              "email": "935661686@qq.com",
     *              "remark": "备注",
     *              "is_scan": true,
     *              "status": true,
     *              "auto_valuation": true,
     *              "created_at": "2018-07-07 09:57:48",
     *              "updated_at": "2018-07-07 09:57:48"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-07-07 09:58:22",
     *              "updated_at": "2018-07-07 09:58:22"
     *          },
     *          "remark": "备注1",
     *          "title": "商品标题1",
     *          "img": "商品图片1",
     *          "url": "https://www.taobao.com/",
     *          "status": true,
     *          "is_stop_pro":  true,
     *          "productspecs": {{
     *                  "id": 2,
     *                  "goods_id": 1,
     *                  "spec_code": "规格编码",
     *                  "jd_specs_code": "京东规格编码",
     *                  "vips_specs_code": "唯品会规格编码",
     *                  "tb_price": "10.00",
     *                  "cost": "10.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_combination": true,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 1,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 1,
     *                  "bar_code": "条形码",
     *                  "img_url": "http://image.img.com",
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "longness": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro":  true,
     *                  "is_stop_pro": false,
     *                  "status": true,
     *                  "created_at": "2018-07-09 18:01:34",
     *                  "updated_at": "2018-07-09 18:01:34",
     *                  "deleted_at": null,
     *                  "combinations": {{
     *                          "id": 1,
     *                          "product_specs_id": 2,
     *                          "com_pro_specs_id": 1,
     *                          "status": true,
     *                          "created_at": "2018-07-09 18:01:34",
     *                          "updated_at": "2018-07-09 18:01:34",
     *                          "deleted_at": null,
     *                          "com_pro_spec": {
     *                              "id": 1,
     *                              "goods_id": 11,
     *                              "spec_code": "规格编码10",
     *                              "jd_specs_code": "京东规格编码",
     *                              "vips_specs_code": "唯品会规格编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_combination": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 1,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 1,
     *                              "bar_code": "条形码2",
     *                              "img_url": "http://image.img.com",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro":  true,
     *                              "is_stop_pro": false,
     *                              "status": true,
     *                              "created_at": "2018-07-09 11:07:53",
     *                              "updated_at": "2018-07-09 11:07:53",
     *                              "deleted_at": null
     *                          }
     *                      },
     *                      {
     *                          "id": 2,
     *                          "product_specs_id": 2,
     *                          "com_pro_specs_id": 1,
     *                          "status": true,
     *                          "created_at": "2018-07-09 18:01:34",
     *                          "updated_at": "2018-07-09 18:01:34",
     *                          "deleted_at": null,
     *                          "com_pro_spec": {
     *                              "id": 1,
     *                              "goods_id": 11,
     *                              "spec_code": "规格编码10",
     *                              "jd_specs_code": "京东规格编码",
     *                              "vips_specs_code": "唯品会规格编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_combination": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 1,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 1,
     *                              "bar_code": "条形码2",
     *                              "img_url": "http://image.img.com",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro":  true,
     *                              "is_stop_pro": false,
     *                              "status": true,
     *                              "created_at": "2018-07-09 11:07:53",
     *                              "updated_at": "2018-07-09 11:07:53",
     *                              "deleted_at": null
     *                          }
     *                      },
     *                      {
     *                          "id": 3,
     *                          "product_specs_id": 2,
     *                          "com_pro_specs_id": 1,
     *                          "status": true,
     *                          "created_at": "2018-07-09 18:01:34",
     *                          "updated_at": "2018-07-09 18:01:34",
     *                          "deleted_at": null,
     *                          "com_pro_spec": {
     *                              "id": 1,
     *                              "goods_id": 11,
     *                              "spec_code": "规格编码10",
     *                              "jd_specs_code": "京东规格编码",
     *                              "vips_specs_code": "唯品会规格编码",
     *                              "tb_price": "10.00",
     *                              "cost": "10.00",
     *                              "price": "10.00",
     *                              "highest_price": "10.00",
     *                              "lowest_price": "10.00",
     *                              "warehouse_cost": "10.00",
     *                              "assembly_price": "10.00",
     *                              "discount": "1.00",
     *                              "commission": "1.00",
     *                              "is_combination": true,
     *                              "package_quantity": 10,
     *                              "package_costs": "10.00",
     *                              "wooden_frame_costs": "10.00",
     *                              "purchase_freight": "10.00",
     *                              "inventory_warning": 10,
     *                              "purchase_days_warning": 1,
     *                              "available_warning": 10,
     *                              "distribution_method_id": 1,
     *                              "bar_code": "条形码2",
     *                              "img_url": "http://image.img.com",
     *                              "spec": "规格",
     *                              "color": "颜色",
     *                              "materials": "材质",
     *                              "function": "功能",
     *                              "special": "特殊",
     *                              "other": "其他",
     *                              "longness": 10,
     *                              "width": 10,
     *                              "height": 10,
     *                              "volume": 10,
     *                              "weight": 10,
     *                              "remark": "备注",
     *                              "finished_pro":  true,
     *                              "is_stop_pro": false,
     *                              "status": true,
     *                              "created_at": "2018-07-09 11:07:53",
     *                              "updated_at": "2018-07-09 11:07:53",
     *                              "deleted_at": null
     *                          }
     *                      }
     *                  }
     *              },
     *              {
     *                  "id": 3,
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
     *                  "is_combination": false,
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
     *                  "spec": "规格",
     *                  "color": "颜色",
     *                  "materials": "材质",
     *                  "function": "功能",
     *                  "special": "特殊",
     *                  "other": "其他",
     *                  "longness": 10,
     *                  "width": 10,
     *                  "height": 10,
     *                  "volume": 10,
     *                  "weight": 10,
     *                  "remark": "备注",
     *                  "finished_pro":  true,
     *                  "is_stop_pro": false,
     *                  "status": true,
     *                  "created_at": "2018-07-09 18:01:35",
     *                  "updated_at": "2018-07-09 18:01:35",
     *                  "deleted_at": null,
     *                  "combinations": {}
     *              }
     *          },
     *          "created_at": "2018-07-07 09:59:36",
     *          "updated_at": "2018-07-07 10:06:01"
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
            ->item($goods, new GoodsTransformer())
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
