<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\Goods;
use App\Models\ProductSpec;
use App\Models\Combination;

use App\Http\Requests\Api\GoodsRequest;
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

    protected const TRANSFORMER = GoodsTransformer::class;
    protected const MODEL = Goods::class;

    /**
     * 获取所有商品
     *
     * @Get("/goods{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
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
     *          "nick": "卖家昵称",
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
     *              "is_scan": 1,
     *              "status": 1,
     *              "auto_valuation": 1,
     *              "created_at": "2018-07-07 15:05:24",
     *              "updated_at": "2018-07-07 15:05:24"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": 1,
     *              "created_at": "2018-07-07 15:05:38",
     *              "updated_at": "2018-07-07 15:05:38"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "商品图片",
     *          "url": "https://www.taobao.com/",
     *          "status": "1",
     *          "is_stop_pro": "1",
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
     *      @Parameter("jd_sn", description="京东编码", required=true),
     *      @Parameter("vips_sn", description="唯品会编码", required=true),
     *      @Parameter("factory_model", description="工厂型号", required=true),
     *      @Parameter("short_name", description="商品简称", required=true),
     *      @Parameter("nick", description="卖家昵称（店铺昵称）", required=true),
     *      @Parameter("supplier_id",type="integer", description="供应商id", required=true),
     *      @Parameter("category_id",type="integer", description="产品类别id", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("title", description="商品标题", required=true),
     *      @Parameter("img", description="商品图片", required=true),
     *      @Parameter("url",type="url", description="商品网址", required=true),
     *      @Parameter("is_stop_pro",type="integer", description="是否停产 默认 0 = 不停产  1 = 停产", required=false,default=0),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
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
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "commodity_code": "商品编码",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "nick": "卖家昵称",
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
     *              "is_scan": 1,
     *              "status": 1,
     *              "auto_valuation": 1,
     *              "created_at": "2018-07-07 15:05:24",
     *              "updated_at": "2018-07-07 15:05:24"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": 1,
     *              "created_at": "2018-07-07 15:05:38",
     *              "updated_at": "2018-07-07 15:05:38"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "商品图片",
     *          "url": "https://www.taobao.com/",
     *          "status": "1",
     *          "is_stop_pro": "1",
     *          "created_at": "2018-07-09 18:01:34",
     *          "updated_at": "2018-07-09 18:01:34",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(GoodsRequest $goodsRequest)
    {
        return $this->traitStore($goodsRequest->all(), self::MODEL, self::TRANSFORMER);
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
     *          "id": 1,
     *          "commodity_code": "商品编码",
     *          "jd_sn": "京东编码",
     *          "vips_sn": "唯品会编码",
     *          "factory_model": "工厂型号",
     *          "short_name": "商品简称",
     *          "nick": "卖家昵称",
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
     *              "is_scan": 1,
     *              "status": 1,
     *              "auto_valuation": 1,
     *              "created_at": "2018-07-07 15:05:24",
     *              "updated_at": "2018-07-07 15:05:24"
     *          },
     *          "category": {
     *              "id": 1,
     *              "code": "商品类别代码",
     *              "name": "商品类别名",
     *              "description": "详情",
     *              "remark": "备注",
     *              "status": 1,
     *              "created_at": "2018-07-07 15:05:38",
     *              "updated_at": "2018-07-07 15:05:38"
     *          },
     *          "remark": "备注",
     *          "title": "商品标题",
     *          "img": "商品图片",
     *          "url": "https://www.taobao.com/",
     *          "status": "1",
     *          "is_stop_pro": "1",
     *          "created_at": "2018-07-09 18:01:34",
     *          "updated_at": "2018-07-09 18:01:34",
     *      })
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
     * @Request({
     *      "commodity_code": "商品编码",
     *      "jd_sn": "京东编码",
     *      "vips_sn": "唯品会编码",
     *      "factory_model": "工厂型号",
     *      "short_name": "商品简称",
     *      "nick": "卖家昵称",
     *      "supplier": {
     *            "id": 1,
     *            "name": "供应商名称",
     *            "company": "供应商公司",
     *            "code": "公司代码",
     *            "province": "省",
     *            "city": "市",
     *            "district": "区",
     *            "address": "地址",
     *            "zipcode": "邮编",
     *            "contacts": "联系人",
     *            "phone": "电话",
     *            "mobile": "手机",
     *            "fax": "传真",
     *            "email": "935661686@qq.com",
     *            "remark": "备注",
     *            "is_scan": 1,
     *            "status": 1,
     *            "auto_valuation": 1,
     *            "created_at": "2018-07-07 15:05:24",
     *            "updated_at": "2018-07-07 15:05:24"
     *      },
     *      "category": {
     *            "id": 1,
     *            "code": "商品类别代码",
     *            "name": "商品类别名",
     *            "description": "详情",
     *            "remark": "备注",
     *            "status": 1,
     *            "created_at": "2018-07-07 15:05:38",
     *            "updated_at": "2018-07-07 15:05:38"
     *       },
     *      "remark": "备注",
     *      "title": "商品标题",
     *      "img": "商品图片",
     *      "url": "https://www.taobao.com/",
     *      "status": 1,
     *      "nis_stop_proick": 1,
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
     *          "nick": "卖家昵称1",
     *          "supplier": {
     *          "id": 1,
     *          "name": "供应商名称",
     *          "company": "供应商公司",
     *          "code": "公司代码",
     *          "province": "省",
     *          "city": "市",
     *          "district": "区",
     *          "address": "地址",
     *          "zipcode": "邮编",
     *          "contacts": "联系人",
     *          "phone": "电话",
     *          "mobile": "手机",
     *          "fax": "传真",
     *          "email": "935661686@qq.com",
     *          "remark": "备注",
     *          "is_scan": 1,
     *          "status": 1,
     *          "auto_valuation": 1,
     *          "created_at": "2018-07-07 09:57:48",
     *          "updated_at": "2018-07-07 09:57:48"
     *          },
     *          "category": {
     *          "id": 1,
     *          "code": "商品类别代码",
     *          "name": "商品类别名",
     *          "description": "详情",
     *          "remark": "备注",
     *          "status": 1,
     *          "created_at": "2018-07-07 09:58:22",
     *          "updated_at": "2018-07-07 09:58:22"
     *          },
     *          "remark": "备注1",
     *          "title": "商品标题1",
     *          "img": "商品图片1",
     *          "url": "https://www.taobao.com/",
     *          "status": "1",
     *          "is_stop_pro": "1",
     *          "created_at": "2018-07-07 09:59:36",
     *          "updated_at": "2018-07-07 10:06:01"
     *      })
     * })
     */
    public function update(GoodsRequest $goodsRequest, Goods $goods)
    {
        return $this->traitUpdate($goodsRequest, $goods, self::TRANSFORMER);
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
        DB::beginTransaction();
        try {
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

            DB::commit();
        } catch (DeleteResourceFailedException $e) {
            DB::rollback();
            throw $e;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

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
    public function destroybyIds(GoodsRequest $request)
    {
        $ids = explode(',', $request->input('ids'));
        DB::beginTransaction();

        try {
            //删除组合
            $productSpecs = ProductSpec::whereIn('goods_id',$ids);
            $delCom = Combination::whereIn('product_specs_id', $productSpecs->pluck('id')->toArray())->delete();

            //删除规格
            $delPro = $productSpecs->delete();

            //删除产品
            $delGoods = Goods::destroy($ids);

            if ($delCom === false || $delPro === false || $delGoods === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }

            DB::commit();
        } catch (DeleteResourceFailedException $e) {
            DB::rollback();
            throw $e;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return $this->noContent();
    }

    /**
     * 更改一组商品状态
     *
     * @PUT("/goods")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="商品id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(GoodsRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }
}
