<?php

namespace App\Http\Controllers\Api;

use App\Transformers\ProductTransformer;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Combination;

use App\Http\Controllers\Traits\CURDTrait;

use App\Http\Requests\Api\ProductRequest;
use App\Http\Requests\Api\ProductComponentRequest;
use App\Http\Requests\Api\SearchProductRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use Dingo\Api\Exception\DeleteResourceFailedException;

/**
 * 产品资源
 * @Resource("products",uri="/api")
 */
class ProductsController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = ProductTransformer::class;
    const MODEL = Product::class;
    const PerPage = 8;

   /**
    * 获取所有产品
    *
    * @Get("/products/search{?commodity_code}[?include=productComponents,shop,supplier,goodsCategory,combinations.productComponents]")
    * @Versions({"v1"})
    * @Parameters({
    *      @Parameter("commodity_code", description="产品编码", required=false, default="all"),
    *      @Parameter("shops_id", type="integer", description="店铺id", required=false, default="all"),
    *      @Parameter("component_code", description="子件编码", required=false, default="all"),
    * })
    * */
   public function searchProducts(SearchProductRequest $request)
   {
       $commodity_code = $shops_id = $component_code = '';

       extract($request->validated());

       $product = Product::query()
           ->when($commodity_code, function ($query) use ($commodity_code) {

               return $query->where('commodity_code', 'like', '%' . $commodity_code . '%');

           })->when($shops_id, function ($query) use ($shops_id) {

               return $query->where('shops_id', '=', $shops_id);

           })->whereHas('productComponents', function ($query) use ($component_code) {

               $query->when($component_code, function ($query) use ($component_code) {

                   return $query->where('component_code', 'like', '%' . $component_code . '%');

               });
           })->with('productComponents');

       return $this->response->paginator($product->paginate(self::PerPage), self::TRANSFORMER);
   }

    /**
     * 获取所有产品
     *
     * @Get("/products[?status=true&include=productComponents,shop,supplier,goodsCategory,combinations.productComponents]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     *       "data": {
     *          {
     *              "id": 24,
     *              "commodity_code": "产品编码",
     *              "jd_sn": "京东编码",
     *              "vips_sn": "唯品会编码",
     *              "factory_model": "工厂型号",
     *              "short_name": "商品简称",
     *              "shops_id": "1",
     *              "shop_nick": "卖家昵称",
     *              "supplier": {
     *                  "id": 1,
     *                  "name": "供应商名称",
     *                  "company": "供应商公司",
     *                  "code": "公司代码",
     *                  "province": "省",
     *                  "city": "市",
     *                  "district": "区",
     *                  "address": "地址",
     *                  "zipcode": "邮编",
     *                  "contacts": "联系人",
     *                  "phone": "电话",
     *                  "mobile": "手机",
     *                  "fax": "传真",
     *                  "email": "935661686@qq.com",
     *                  "remark": "备注",
     *                  "is_scan": true,
     *                  "status": true,
     *                  "auto_valuation": true,
     *                  "created_at": "2018-08-06 16:27:02",
     *                  "updated_at": "2018-08-06 16:27:02"
     *              },
     *              "category": {
     *                  "id": 1,
     *                  "code": "商品类别代码",
     *                  "name": "商品类别名",
     *                  "description": "详情",
     *                  "remark": "备注",
     *                  "status": true,
     *                  "created_at": "2018-08-06 16:30:02",
     *                  "updated_at": "2018-08-06 16:30:02"
     *              },
     *              "remark": "备注",
     *              "title": "商品标题",
     *              "img": "http://bferp.test/#/basicInf/goodsMag",
     *              "url": "http://bferp.test/#/basicInf/goodsMag",
     *              "status": true,
     *              "is_stop_pro": true,
     *              "product_components": {
     *                  "data": {
     *                      {
     *                          "id": 8,
     *                          "pid": 24,
     *                          "component_code": "子件编码1",
     *                          "jd_component_code": "京东子件编码",
     *                          "vips_component_code": "唯品会子件编码",
     *                          "tb_price": "10.00",
     *                          "cost": "10.00",
     *                          "price": "10.00",
     *                          "highest_price": "10.00",
     *                          "lowest_price": "10.00",
     *                          "warehouse_cost": "10.00",
     *                          "assembly_price": "10.00",
     *                          "discount": "1.00",
     *                          "commission": "1.00",
     *                          "is_common": true,
     *                          "package_quantity": 10,
     *                          "package_costs": "10.00",
     *                          "wooden_frame_costs": "10.00",
     *                          "purchase_freight": "10.00",
     *                          "inventory_warning": 10,
     *                          "purchase_days_warning": 10,
     *                          "available_warning": 10,
     *                          "distribution_method_id": 12,
     *                          "bar_code": "1010",
     *                          "img_url": "http://image.img.com/image",
     *                          "spec": "规格",
     *                          "color": "颜色",
     *                          "materials": "材质",
     *                          "function": "功能",
     *                          "special": "特殊",
     *                          "other": "其他",
     *                          "longness": 10,
     *                          "width": 10,
     *                          "height": 10,
     *                          "volume": 10,
     *                          "weight": 10,
     *                          "remark": "备注",
     *                          "finished_pro": true,
     *                          "is_stop_pro": true,
     *                          "created_at": "2018-08-13 11:55:43",
     *                          "updated_at": "2018-08-13 11:55:43"
     *                      }
     *                  }
     *              },
     *              "productComponents": {
     *                  "data": {}
     *              },
     *              "created_at": "2018-08-13 11:55:43",
     *              "updated_at": "2018-08-13 11:55:43",
     *          }
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
     *                   "next": "http://127.0.0.1:8000/api/products?page=1"
     *               }
     *           }
     *       }
     * })
     */
    public function index(ProductRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, self::PerPage);
    }


    /**
     * 新增产品
     *
     * @Post("/products")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="产品编码", required=true),
     *      @Parameter("jd_sn", description="京东编码", required=false),
     *      @Parameter("vips_sn", description="唯品会编码", required=false),
     *      @Parameter("factory_model", description="工厂型号", required=false),
     *      @Parameter("short_name", description="产品简称", required=true),
     *      @Parameter("shops_id", type="integer", description="店铺id", required=true),
     *      @Parameter("shop_nick", description="卖家昵称（店铺昵称）", required=true),
     *      @Parameter("supplier_id",type="integer", description="供应商id", required=true),
     *      @Parameter("category_id",type="integer", description="产品类别id", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("title", description="产品标题", required=true),
     *      @Parameter("img", description="产品图片", required=false),
     *      @Parameter("url",type="url", description="产品网址", required=false),
     *      @Parameter("is_stop_pro",type="boolean", description="是否停产 默认 0 = 不停产  1 = 停产", required=false,default=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("product_components[0][component_code]", description="子件编码", required=true),
     *      @Parameter("product_components[0][jd_component_code]", description="京东子件编码", required=false),
     *      @Parameter("product_components[0][vips_component_code]", description="唯品会子件编码", required=false),
     *      @Parameter("product_components[0][tb_price]", type="numeric", description="淘宝价格", required=true),
     *      @Parameter("product_components[0][cost]", type="numeric", description="成本价格", required=true),
     *      @Parameter("product_components[0][price]", type="numeric", description="售价", required=true),
     *      @Parameter("product_components[0][highest_price]", type="numeric", description="最高售价", required=true),
     *      @Parameter("product_components[0][lowest_price]", type="numeric", description="最低售价", required=true),
     *      @Parameter("product_components[0][warehouse_cost]", type="numeric", description="仓库成本", required=false),
     *      @Parameter("product_components[0][assembly_price]", type="numeric", description="装配价格", required=false),
     *      @Parameter("product_components[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("product_components[0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("product_components[0][is_common]", type="boolean", description="是否通用子件", required=true),
     *      @Parameter("product_components[0][package_quantity]", type="integer", description="包件数量", required=false),
     *      @Parameter("product_components[0][package_costs]", type="numeric", description="打包费用", required=false),
     *      @Parameter("product_components[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("product_components[0][purchase_freight]", type="numeric", description="采购运费", required=false),
     *      @Parameter("product_components[0][inventory_warning]", type="integer", description="库存预警(数量)", required=true),
     *      @Parameter("product_components[0][purchase_days_warning]", type="integer", description="采购预警天数", required=true),
     *      @Parameter("product_components[0][available_warning]", type="integer", description="可售数预警", required=true),
     *      @Parameter("product_components[0][distribution_method_id]", type="integer", description="配送类别", required=true),
     *      @Parameter("product_components[0][bar_code]", description="条形码", required=false),
     *      @Parameter("product_components[0][img_url]", description="图片地址", type="url", required=false),
     *      @Parameter("product_components[0][spec]", description="规格", required=true),
     *      @Parameter("product_components[0][color]", description="颜色", required=false),
     *      @Parameter("product_components[0][materials]", description="材质", required=false),
     *      @Parameter("product_components[0][function]", description="功能", required=false),
     *      @Parameter("product_components[0][special]", description="特殊", required=false),
     *      @Parameter("product_components[0][other]", description="其他", required=false),
     *      @Parameter("product_components[0][longness]", type="numeric", description="长度（mm）", required=false),
     *      @Parameter("product_components[0][width]", type="numeric", description="宽度（mm）", required=false),
     *      @Parameter("product_components[0][height]", type="numeric", description="高度（mm）", required=false),
     *      @Parameter("product_components[0][volume]", type="numeric", description="体积(m²)", required=false),
     *      @Parameter("product_components[0][weight]", type="numeric", description="重量", required=false),
     *      @Parameter("product_components[0][remark]", description="备注", required=false),
     *      @Parameter("product_components[0][finished_pro]", type="integer", description="是否成品 0 不是 1 是", required=false),
     *      @Parameter("product_components[0][is_stop_pro]", type="boolean", description="是否停产 0 不是 1 是", required=false),
     * })
     * @Request({
     *      "commodity_code": "产品编码",
     *      "jd_sn": "京东编码",
     *      "vips_sn": "唯品会编码",
     *      "factory_model": "工厂型号",
     *      "short_name": "产品简称",
     *      "shops_id": 1,
     *      "shop_nick": "卖家昵称",
     *      "supplier_id": 1,
     *      "category_id": 1,
     *      "remark": "备注",
     *      "title": "产品标题",
     *      "img": "产品图片",
     *      "url": "https://www.taobao.com/",
     *      "status": true,
     *      "nis_stop_proick": 1,
     *      "product_components[0][component_code]":"子件编码1",
     *      "product_components[0][jd_component_code]":"京东子件编码",
     *      "product_components[0][vips_component_code]":"唯品会子件编码",
     *      "product_components[0][tb_price]":"10",
     *      "product_components[0][highest_price]":"10",
     *      "product_components[0][price]":"10",
     *      "product_components[0][lowest_price]":"10",
     *      "product_components[0][warehouse_cost]":"10",
     *      "product_components[0][assembly_price]":"10",
     *      "product_components[0][discount]":"1",
     *      "product_components[0][commission]":"1",
     *      "product_components[0][is_common]": true,
     *      "product_components[0][package_quantity]":"10",
     *      "product_components[0][package_costs]":"10",
     *      "product_components[0][wooden_frame_costs]":"10",
     *      "product_components[0][purchase_freight]":"10",
     *      "product_components[0][inventory_warning]":"10",
     *      "product_components[0][purchase_days_warning]":"10",
     *      "product_components[0][available_warning]":"10",
     *      "product_components[0][distribution_method_id]":"1",
     *      "product_components[0][bar_code]":"条形码",
     *      "product_components[0][img_url]":"http://image.img.com/image",
     *      "product_components[0][spec]":"规格",
     *      "product_components[0][color]":"颜色",
     *      "product_components[0][materials]":"材质",
     *      "product_components[0][function]":"功能",
     *      "product_components[0][special]":"特殊",
     *      "product_components[0][other]":"其他",
     *      "product_components[0][longness]":"10",
     *      "product_components[0][width]":"10",
     *      "product_components[0][height]":"10",
     *      "product_components[0][volume]":"10",
     *      "product_components[0][weight]":"10",
     *      "product_components[0][remark]":"备注",
     *      "product_components[0][finished_pro]": true,
     *      "product_components[0][is_stop_pro]": false,
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "url": {
     *                  "产品网址必须有效的url"
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
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 24,
     *          "commodity_code": "产品编码",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "shops_id": "1",
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
     *              "created_at": "2018-08-06 16:27:02",
     *              "updated_at": "2018-08-06 16:27:02"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-06 16:30:02",
     *              "updated_at": "2018-08-06 16:30:02"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "http://bferp.test/#/basicInf/goodsMag",
     *          "url": "http://bferp.test/#/basicInf/goodsMag",
     *          "status": true,
     *          "is_stop_pro": true,
     *          "product_components": {
     *              "data": {
     *                  {
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
     *                  }
     *              }
     *          },
     *          "productComponents": {
     *              "data": {}
     *          },
     *          "created_at": "2018-08-13 11:55:43",
     *          "updated_at": "2018-08-13 11:55:43",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(ProductRequest $productRequest,
                          ProductComponentRequest $productComponentRequest)
    {
        $data[] = $productRequest->validated();
        $data[] = $productRequest->input('product_components');

        return $this->traitJoint2Store(
            $data,
            'productComponents',
            $productComponentRequest->rules(),
            self::MODEL,
            self::TRANSFORMER
        );
    }

    /**
     * 显示单条产品
     *
     * @Get("/products/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 24,
     *          "commodity_code": "产品编码",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "shops_id": "1",
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
     *              "created_at": "2018-08-06 16:27:02",
     *              "updated_at": "2018-08-06 16:27:02"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-06 16:30:02",
     *              "updated_at": "2018-08-06 16:30:02"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "http://bferp.test/#/basicInf/goodsMag",
     *          "url": "http://bferp.test/#/basicInf/goodsMag",
     *          "status": true,
     *          "is_stop_pro": true,
     *          "product_components": {
     *              "data": {
     *                  {
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
     *                  }
     *              }
     *          },
     *          "productComponents": {
     *              "data": {}
     *          },
     *          "created_at": "2018-08-13 11:55:43",
     *          "updated_at": "2018-08-13 11:55:43",
     *     })
     * })
     */
    public function show(Product $product)
    {
        return $this->traitShow($product, self::TRANSFORMER);
    }

    /**
     * 修改产品
     *
     * @Patch("/products/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("commodity_code", description="产品编码", required=false),
     *      @Parameter("jd_sn", description="京东编码", required=false),
     *      @Parameter("vips_sn", description="唯品会编码", required=false),
     *      @Parameter("factory_model", description="工厂型号", required=false),
     *      @Parameter("short_name", description="产品简称", required=false),
     *      @Parameter("shops_id", type="integer", description="店铺id", required=false),
     *      @Parameter("shop_nick", description="卖家昵称（店铺昵称）", required=false),
     *      @Parameter("supplier_id",type="integer", description="供应商id", required=false),
     *      @Parameter("category_id",type="integer", description="产品类别id", required=false),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("title", description="产品标题", required=false),
     *      @Parameter("img", description="产品图片", required=false),
     *      @Parameter("url",type="url", description="产品网址", required=false),
     *      @Parameter("is_stop_pro",type="boolean", description="是否停产 默认 0 = 不停产  1 = 停产", required=false,default=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=false),
     *      @Parameter("product_components[0][component_code]", description="子件编码", required=false),
     *      @Parameter("product_components[0][jd_component_code]", description="京东子件编码", required=false),
     *      @Parameter("product_components[0][vips_component_code]", description="唯品会子件编码", required=false),
     *      @Parameter("product_components[0][tb_price]", type="numeric", description="淘宝价格", required=false),
     *      @Parameter("product_components[0][cost]", type="numeric", description="成本价格", required=false),
     *      @Parameter("product_components[0][price]", type="numeric", description="售价", required=false),
     *      @Parameter("product_components[0][highest_price]", type="numeric", description="最高售价", required=false),
     *      @Parameter("product_components[0][lowest_price]", type="numeric", description="最低售价", required=false),
     *      @Parameter("product_components[0][warehouse_cost]", type="numeric", description="仓库成本", required=false),
     *      @Parameter("product_components[0][assembly_price]", type="numeric", description="装配价格", required=false),
     *      @Parameter("product_components[0][discount]", type="numeric", description="折扣", required=false),
     *      @Parameter("product_components[0][commission]", type="numeric", description="佣金点", required=false),
     *      @Parameter("product_components[0][is_common]", type="boolean", description="是否通用子件", required=false),
     *      @Parameter("product_components[0][package_quantity]", type="integer", description="包件数量", required=false),
     *      @Parameter("product_components[0][package_costs]", type="numeric", description="打包费用", required=false),
     *      @Parameter("product_components[0][wooden_frame_costs]", type="numeric", description="木架费", required=false),
     *      @Parameter("product_components[0][purchase_freight]", type="numeric", description="采购运费", required=false),
     *      @Parameter("product_components[0][inventory_warning]", type="integer", description="库存预警(数量)", required=false),
     *      @Parameter("product_components[0][purchase_days_warning]", type="integer", description="采购预警天数", required=false),
     *      @Parameter("product_components[0][available_warning]", type="integer", description="可售数预警", required=false),
     *      @Parameter("product_components[0][distribution_method_id]", type="integer", description="配送类别", required=false),
     *      @Parameter("product_components[0][bar_code]", description="条形码", required=false),
     *      @Parameter("product_components[0][img_url]", description="图片地址", type="url", required=false),
     *      @Parameter("product_components[0][spec]", description="规格", required=false),
     *      @Parameter("product_components[0][color]", description="颜色", required=false),
     *      @Parameter("product_components[0][materials]", description="材质", required=false),
     *      @Parameter("product_components[0][function]", description="功能", required=false),
     *      @Parameter("product_components[0][special]", description="特殊", required=false),
     *      @Parameter("product_components[0][other]", description="其他", required=false),
     *      @Parameter("product_components[0][longness]", type="numeric", description="长度（mm）", required=false),
     *      @Parameter("product_components[0][width]", type="numeric", description="宽度（mm）", required=false),
     *      @Parameter("product_components[0][height]", type="numeric", description="高度（mm）", required=false),
     *      @Parameter("product_components[0][volume]", type="numeric", description="体积(m²)", required=false),
     *      @Parameter("product_components[0][weight]", type="numeric", description="重量", required=false),
     *      @Parameter("product_components[0][remark]", description="备注", required=false),
     *      @Parameter("product_components[0][finished_pro]", type="integer", description="是否成品 0 不是 1 是", required=false),
     *      @Parameter("product_components[0][is_stop_pro]", type="boolean", description="是否停产 0 不是 1 是", required=false),
     * })
     * @Request({
     *      "commodity_code": "产品编码",
     *      "jd_sn": "京东编码",
     *      "vips_sn": "唯品会编码",
     *      "factory_model": "工厂型号",
     *      "short_name": "产品简称",
     *      "shops_id": "店铺id",
     *      "shop_nick": "卖家昵称",
     *      "supplier_id": 1,
     *      "category_id": 1,
     *      "remark": "备注",
     *      "title": "产品标题",
     *      "img": "产品图片",
     *      "url": "https://www.taobao.com/",
     *      "status": true,
     *      "nis_stop_proick": 1,
     *      "product_components[0][id]":"2",
     *      "product_components[0][spec_code]":"子件编码",
     *      "product_components[0][jd_specs_code]":"京东子件编码",
     *      "product_components[0][vips_specs_code]":"唯品会子件编码",
     *      "product_components[0][tb_price]":"10",
     *      "product_components[0][highest_price]":"10",
     *      "product_components[0][price]":"10",
     *      "product_components[0][lowest_price]":"10",
     *      "product_components[0][warehouse_cost]":"10",
     *      "product_components[0][assembly_price]":"10",
     *      "product_components[0][discount]":"1",
     *      "product_components[0][commission]":"1",
     *      "product_components[0][is_common]": true,
     *      "product_components[0][package_quantity]":"10",
     *      "product_components[0][package_costs]":"10",
     *      "product_components[0][wooden_frame_costs]":"10",
     *      "product_components[0][purchase_freight]":"10",
     *      "product_components[0][inventory_warning]":"10",
     *      "product_components[0][purchase_days_warning]":"10",
     *      "product_components[0][available_warning]":"10",
     *      "product_components[0][distribution_method_id]":"1",
     *      "product_components[0][bar_code]":"条形码",
     *      "product_components[0][img_url]":"http://image.img.com/image",
     *      "product_components[0][spec]":"规格",
     *      "product_components[0][color]":"颜色",
     *      "product_components[0][materials]":"材质",
     *      "product_components[0][function]":"功能",
     *      "product_components[0][special]":"特殊",
     *      "product_components[0][other]":"其他",
     *      "product_components[0][longness]":"10",
     *      "product_components[0][width]":"10",
     *      "product_components[0][height]":"10",
     *      "product_components[0][volume]":"10",
     *      "product_components[0][weight]":"10",
     *      "product_components[0][remark]":"备注",
     *      "product_components[0][finished_pro]":true,
     *      "product_components[0][is_stop_pro]": false,
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
     *                  "产品网址必须有效的url"
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
     *          "id": 24,
     *          "commodity_code": "产品编码",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "shops_id": "1",
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
     *              "created_at": "2018-08-06 16:27:02",
     *              "updated_at": "2018-08-06 16:27:02"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": true,
     *              "created_at": "2018-08-06 16:30:02",
     *              "updated_at": "2018-08-06 16:30:02"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "http://bferp.test/#/basicInf/goodsMag",
     *          "url": "http://bferp.test/#/basicInf/goodsMag",
     *          "status": true,
     *          "is_stop_pro": true,
     *          "product_components": {
     *              {
     *                  "id": 8,
     *                  "pid": 24,
     *                  "component_code": "子件编码1",
     *                  "jd_component_code": "京东子件编码",
     *                  "vips_component_code": "唯品会子件编码",
     *                  "tb_price": "10.00",
     *                  "cost": "10.00",
     *                  "price": "10.00",
     *                  "highest_price": "10.00",
     *                  "lowest_price": "10.00",
     *                  "warehouse_cost": "10.00",
     *                  "assembly_price": "10.00",
     *                  "discount": "1.00",
     *                  "commission": "1.00",
     *                  "is_common": true,
     *                  "package_quantity": 10,
     *                  "package_costs": "10.00",
     *                  "wooden_frame_costs": "10.00",
     *                  "purchase_freight": "10.00",
     *                  "inventory_warning": 10,
     *                  "purchase_days_warning": 10,
     *                  "available_warning": 10,
     *                  "distribution_method_id": 12,
     *                  "bar_code": "1010",
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
     *                  "finished_pro": true,
     *                  "is_stop_pro": true,
     *                  "created_at": "2018-08-13 11:55:43",
     *                  "updated_at": "2018-08-13 11:55:43"
     *              }
     *          },
     *          "combinations": {},
     *          "created_at": "2018-08-13 11:55:43",
     *          "updated_at": "2018-08-13 11:55:43",
     *      })
     * })
     */
    public function update(ProductRequest $productRequest,
                           ProductComponentRequest $productComponentRequest,
                           Product $product)
    {
        $data[] = $productRequest->validated();
        $data[] = $productRequest->input('product_components');

        return $this->traitJoint2Update(
            $data,
            'productComponents',
            $productComponentRequest->rules(),
            $product,
            self::TRANSFORMER
        );
    }


    /**
     * 删除产品
     *
     * @Delete("/products/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            $combinations = Combination::where('pid', $product->id);
            $combinations->get()->map(function ($item){
                //删除多对多关系
                $item->productComponents()->detach();
            });
            //删除组合sku
            $delCom = $combinations->delete();
            //删除子件 还有子件的库存 和 订单没有删除
            $delComp = $product->productComponents()->delete();

            //删除产品
            $delProduct = $product->delete();

            if ($delCom === false || $delComp === false || $delProduct === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 删除一组产品
     *
     * @Delete("/products")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="产品id组 格式: 1,2,3,4 ", required=true)
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

            $combinations = Combination::whereIn('pid', $ids);
            $combinations->get()->map(function ($item){
                //删除多对多关系
                $item->productComponents()->detach();
            });
            //删除组合sku
            $delCom = $combinations->delete();

            $product = Product::whereIn('id',$ids)->with('productComponents')->get();
            //删除子件 还有子件的库存 和 订单没有删除
            $delComp = $product->map(function($item){
                $item->productComponents()->delete();
            });

            //删除产品
            $delProduct = Product::destroy($ids);

            if ($delCom === false || $delComp === false || $delProduct === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }

        });

        return $this->noContent();
    }

    /**
     * 更改一组产品状态
     *
     * @PUT("/products/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="产品id组 格式: 1,2,3,4 ", required=true),
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
