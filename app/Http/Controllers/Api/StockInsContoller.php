<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\StockIn;
use App\Models\StockInDetail;

use App\Http\Requests\Api\StockInRequest;
use App\Http\Requests\Api\StockInDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\StockInTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 入库单资源
 * @Resource("stockins",uri="/api")
 */
class StockInsContoller extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = StockInTransformer::class;
    const MODEL = StockIn::class;

    /**
     * 获取所有入库单
     *
     * @Get("/stockins{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("is_submit", type="boolean", description="是否提交", required=false),
     *      @Parameter("is_stock_in", type="boolean", description="是否入库", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *         {
     *          "id": 6,
     *          "stock_in_no": "IS2018072017031542256",
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称",
     *              "province": "仓库地（省）",
     *              "city": "仓库地（市）",
     *              "district": "仓库地（区）",
     *              "address": "测试",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": true,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "auditor": null,
     *          "audit_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": false,
     *          "is_audit": false,
     *          "is_stock_in": true,
     *          "status": false,
     *          "stock_in_details": {
     *              {
     *                  "id": 9,
     *                  "stock_ins_id": 6,
     *                  "purchases_id": 1,
     *                  "product_specs_id": 1,
     *                  "stock_in_quantity": 5,
     *                  "remark": "备注",
     *                  "created_at": "2018-07-20 17:03:15",
     *                  "updated_at": "2018-07-20 17:03:15",
     *                  "purchase_details_id": {
     *                       "id": 1,
     *                       "purchases_id": 13,
     *                       "purchase_item_status": "新建",
     *                       "product_specs_id": 1,
     *                       "purchase_quantity": 10,
     *                       "stock_in_count": 0,
     *                       "shops_id": 1,
     *                       "suppliers_id": 1,
     *                       "purchase_cost": "10.00",
     *                       "purchase_freight": "10.00",
     *                       "warehouse_cost": "10.00",
     *                       "commission": "10.00",
     *                       "discount": "10.00",
     *                       "colour_num": "色号",
     *                       "paint": "油漆",
     *                       "wooden_frame_costs": "0.00",
     *                       "arrival_time": "2018-06-10 00:00:00",
     *                       "remark": "备注",
     *                       "created_at": "2018-07-21 16:22:05",
     *                       "updated_at": "2018-07-21 16:22:05"
     *                  },
     *                  "product_spec": {
     *                      "id": 1,
     *                      "goods_id": 1,
     *                      "spec_code": "规格编码3",
     *                      "jd_specs_code": "京东规格编码",
     *                      "vips_specs_code": "唯品会规格编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_combination": false,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 1,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "条形码2",
     *                      "img_url": "http://image.img.com",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "length": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro":  true,
     *                      "is_stop_pro": false,
     *                      "status": true,
     *                      "created_at": "2018-07-18 17:42:36",
     *                      "updated_at": "2018-07-18 17:42:36"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-20 17:03:15",
     *          "updated_at": "2018-07-20 17:03:15",
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 2,
     *             "count": 2,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": {
     *                 "previous": null,
     *                 "next": "{{host}}/api/stockins?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(StockInRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增入库单
     *
     * @Post("/stockins")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=true),
     *      @Parameter("stock_in_types_id",type="integer", description="入库类型id", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("stock_in_details[0][purchase_lists_id]",type="integer", description="采购单详情id", required=true),
     *      @Parameter("stock_in_details[0][product_specs_id]",type="integer", description="产品规格id", required=true),
     *      @Parameter("stock_in_details[0][stock_in_quantity]",type="integer", description="入库数量", required=true),
     *      @Parameter("stock_in_details[0][total_fee]",type="number", description="总额", required=true),
     *      @Parameter("stock_in_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "status": true,
     *          "stock_in_details[0][purchase_lists_id]":1,
     *          "stock_in_details[0][product_specs_id]":1,
     *          "stock_in_details[0][stock_in_quantity]":10,
     *          "stock_in_details[0][remark]":"备注",
     *     }
     *})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "warehouse_id": {
     *                  "仓库id必填"
     *              },
     *              "stock_in_types_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 6,
     *          "stock_in_no": "IS2018072017031542256",
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称",
     *              "province": "仓库地（省）",
     *              "city": "仓库地（市）",
     *              "district": "仓库地（区）",
     *              "address": "测试",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": true,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "auditor": null,
     *          "audit_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": false,
     *          "is_audit": false,
     *          "is_stock_in": true,
     *          "status": false,
     *          "stock_in_details": {
     *              {
     *                  "id": 9,
     *                  "stock_ins_id": 6,
     *                  "purchases_id": 1,
     *                  "product_specs_id": 1,
     *                  "stock_in_quantity": 5,
     *                  "remark": "备注",
     *                  "created_at": "2018-07-20 17:03:15",
     *                  "updated_at": "2018-07-20 17:03:15",
     *                  "purchase_details_id": {
     *                       "id": 1,
     *                       "purchases_id": 13,
     *                       "purchase_item_status": "新建",
     *                       "product_specs_id": 1,
     *                       "purchase_quantity": 10,
     *                       "stock_in_count": 0,
     *                       "shops_id": 1,
     *                       "suppliers_id": 1,
     *                       "purchase_cost": "10.00",
     *                       "purchase_freight": "10.00",
     *                       "warehouse_cost": "10.00",
     *                       "commission": "10.00",
     *                       "discount": "10.00",
     *                       "colour_num": "色号",
     *                       "paint": "油漆",
     *                       "wooden_frame_costs": "0.00",
     *                       "arrival_time": "2018-06-10 00:00:00",
     *                       "remark": "备注",
     *                       "created_at": "2018-07-21 16:22:05",
     *                       "updated_at": "2018-07-21 16:22:05"
     *                  },
     *                  "product_spec": {
     *                      "id": 1,
     *                      "goods_id": 1,
     *                      "spec_code": "规格编码3",
     *                      "jd_specs_code": "京东规格编码",
     *                      "vips_specs_code": "唯品会规格编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_combination": false,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 1,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "条形码2",
     *                      "img_url": "http://image.img.com",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "length": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro":  true,
     *                      "is_stop_pro": false,
     *                      "status": true,
     *                      "created_at": "2018-07-18 17:42:36",
     *                      "updated_at": "2018-07-18 17:42:36"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-20 17:03:15",
     *          "updated_at": "2018-07-20 17:03:15",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(StockInRequest $stockInRequest,
                          StockInDetailRequest $stockInDetailRequest,
                          \App\Handlers\ValidatedHandler $validatedHandler)
    {
        $stockIn = DB::transaction(function() use ($stockInRequest, $stockInDetailRequest, $validatedHandler) {
            $stockIn = StockIn::create($stockInRequest->validated());
            if ($stockInDetails = $stockInRequest->input('stock_in_details')) {
                foreach ($stockInDetails as $stockInDetail) {
                    $stockIn->stockInDetails()->create(
                        $validatedHandler->getValidatedData($stockInDetailRequest->rules(), $stockInDetail)
                    );
                }
            }
            return $stockIn;
        });

        return $this->response
            ->item($stockIn, new StockInTransformer())
            ->setStatusCode(201)
            ->addMeta('status_code', '201');
    }

    /**
     * 显示单条入库单
     *
     * @Get("/stockins/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 6,
     *          "stock_in_no": "IS2018072017031542256",
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称",
     *              "province": "仓库地（省）",
     *              "city": "仓库地（市）",
     *              "district": "仓库地（区）",
     *              "address": "测试",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": true,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "auditor": null,
     *          "audit_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": false,
     *          "is_audit": false,
     *          "is_stock_in": true,
     *          "status": false,
     *          "stock_in_details": {
     *              {
     *                  "id": 9,
     *                  "stock_ins_id": 6,
     *                  "purchases_id": 1,
     *                  "product_specs_id": 1,
     *                  "stock_in_quantity": 5,
     *                  "remark": "备注",
     *                  "created_at": "2018-07-20 17:03:15",
     *                  "updated_at": "2018-07-20 17:03:15",
     *                  "purchase_details_id": {
     *                       "id": 1,
     *                       "purchases_id": 13,
     *                       "purchase_item_status": "新建",
     *                       "product_specs_id": 1,
     *                       "purchase_quantity": 10,
     *                       "stock_in_count": 0,
     *                       "shops_id": 1,
     *                       "suppliers_id": 1,
     *                       "purchase_cost": "10.00",
     *                       "purchase_freight": "10.00",
     *                       "warehouse_cost": "10.00",
     *                       "commission": "10.00",
     *                       "discount": "10.00",
     *                       "colour_num": "色号",
     *                       "paint": "油漆",
     *                       "wooden_frame_costs": "0.00",
     *                       "arrival_time": "2018-06-10 00:00:00",
     *                       "remark": "备注",
     *                       "created_at": "2018-07-21 16:22:05",
     *                       "updated_at": "2018-07-21 16:22:05"
     *                  },
     *                  "product_spec": {
     *                      "id": 1,
     *                      "goods_id": 1,
     *                      "spec_code": "规格编码3",
     *                      "jd_specs_code": "京东规格编码",
     *                      "vips_specs_code": "唯品会规格编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_combination": false,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 1,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "条形码2",
     *                      "img_url": "http://image.img.com",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "length": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro":  true,
     *                      "is_stop_pro": false,
     *                      "status": true,
     *                      "created_at": "2018-07-18 17:42:36",
     *                      "updated_at": "2018-07-18 17:42:36"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-20 17:03:15",
     *          "updated_at": "2018-07-20 17:03:15",
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }


    /**
     * 修改入库单
     *
     * @Patch("/stockins/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=false),
     *      @Parameter("stock_in_types_id",type="integer", description="入库类型id", required=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("stock_in_details[0][id]",type="integer", description="入库单详情id (存在则视为更新 不存在视为插入)", required=false),
     *      @Parameter("stock_in_details[0][purchase_lists_id]",type="integer", description="采购单详情id", required=false),
     *      @Parameter("stock_in_details[0][product_specs_id]",type="integer", description="产品规格id", required=false),
     *      @Parameter("stock_in_details[0][stock_in_quantity]",type="integer", description="入库数量", required=false),
     *      @Parameter("stock_in_details[0][total_fee]",type="number", description="总额", required=false),
     *      @Parameter("stock_in_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "status": true,
     *          "stock_in_details[0][id]":1,
     *          "stock_in_details[0][purchase_lists_id]":1,
     *          "stock_in_details[0][product_specs_id]":1,
     *          "stock_in_details[0][stock_in_quantity]":10,
     *          "stock_in_details[0][remark]":"备注",
     *     }
     *})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "warehouse_id": {
     *                  "仓库id必填"
     *              },
     *              "stock_in_types_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *              },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 6,
     *          "stock_in_no": "IS2018072017031542256",
     *          "warehouse": {
     *              "id": 1,
     *              "name": "仓库名称",
     *              "province": "仓库地（省）",
     *              "city": "仓库地（市）",
     *              "district": "仓库地（区）",
     *              "address": "测试",
     *              "is_default": false,
     *              "status": true,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": true,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "auditor": null,
     *          "audit_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": false,
     *          "is_audit": false,
     *          "is_stock_in": true,
     *          "status": false,
     *          "stock_in_details": {
     *              {
     *                  "id": 9,
     *                  "stock_ins_id": 6,
     *                  "purchases_id": 1,
     *                  "product_specs_id": 1,
     *                  "stock_in_quantity": 5,
     *                  "remark": "备注",
     *                  "created_at": "2018-07-20 17:03:15",
     *                  "updated_at": "2018-07-20 17:03:15",
     *                  "purchase_details_id": {
     *                       "id": 1,
     *                       "purchases_id": 13,
     *                       "purchase_item_status": "新建",
     *                       "product_specs_id": 1,
     *                       "purchase_quantity": 10,
     *                       "stock_in_count": 0,
     *                       "shops_id": 1,
     *                       "suppliers_id": 1,
     *                       "purchase_cost": "10.00",
     *                       "purchase_freight": "10.00",
     *                       "warehouse_cost": "10.00",
     *                       "commission": "10.00",
     *                       "discount": "10.00",
     *                       "colour_num": "色号",
     *                       "paint": "油漆",
     *                       "wooden_frame_costs": "0.00",
     *                       "arrival_time": "2018-06-10 00:00:00",
     *                       "remark": "备注",
     *                       "created_at": "2018-07-21 16:22:05",
     *                       "updated_at": "2018-07-21 16:22:05"
     *                  },
     *                  "product_spec": {
     *                      "id": 1,
     *                      "goods_id": 1,
     *                      "spec_code": "规格编码3",
     *                      "jd_specs_code": "京东规格编码",
     *                      "vips_specs_code": "唯品会规格编码",
     *                      "tb_price": "10.00",
     *                      "cost": "10.00",
     *                      "price": "10.00",
     *                      "highest_price": "10.00",
     *                      "lowest_price": "10.00",
     *                      "warehouse_cost": "10.00",
     *                      "assembly_price": "10.00",
     *                      "discount": "1.00",
     *                      "commission": "1.00",
     *                      "is_combination": false,
     *                      "package_quantity": 10,
     *                      "package_costs": "10.00",
     *                      "wooden_frame_costs": "10.00",
     *                      "purchase_freight": "10.00",
     *                      "inventory_warning": 10,
     *                      "purchase_days_warning": 1,
     *                      "available_warning": 10,
     *                      "distribution_method_id": 1,
     *                      "bar_code": "条形码2",
     *                      "img_url": "http://image.img.com",
     *                      "spec": "规格",
     *                      "color": "颜色",
     *                      "materials": "材质",
     *                      "function": "功能",
     *                      "special": "特殊",
     *                      "other": "其他",
     *                      "length": 10,
     *                      "width": 10,
     *                      "height": 10,
     *                      "volume": 10,
     *                      "weight": 10,
     *                      "remark": "备注",
     *                      "finished_pro":  true,
     *                      "is_stop_pro": false,
     *                      "status": true,
     *                      "created_at": "2018-07-18 17:42:36",
     *                      "updated_at": "2018-07-18 17:42:36"
     *                  }
     *              }
     *          },
     *          "created_at": "2018-07-20 17:03:15",
     *          "updated_at": "2018-07-20 17:03:15",
     *      })
     * })
     */
    public function update(StockInRequest $stockInRequest,
                           StockInDetailRequest $stockInDetailRequest,
                           StockIn $stockin,
                           \App\Handlers\ValidatedHandler $validatedHandler)
    {
        //判断是否提交
        if ($stockin->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $stockin = DB::transaction(function() use ($stockInRequest, $stockInDetailRequest, $stockin, $validatedHandler) {

            $stockin->update($stockInRequest->validated());

            if ($stockInDetails = $stockInRequest->input('stock_in_details')) {

                foreach ($stockInDetails as $stockInDetail) {
                    //过滤出经过验证的数据
                    $data = $validatedHandler->getValidatedData($stockInDetailRequest->rules(), $stockInDetail);

                    //存在id则更新，否则插入
                    if (isset($stockInDetail['id'])) {
                        $stockin->stockInDetails()->findOrFail($stockInDetail['id'])->update($data);
                    } else {
                        $stockin->stockInDetails()->create($data);
                    }
                }
            }
            return $stockin;
        });

        return $this->response
            ->item($stockin, new StockInTransformer())
            ->setStatusCode(201);
    }

    /**
     * 删除入库单
     *
     * @Delete("/stockins/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(StockIn $stockin)
    {
        DB::transaction(function() use ($stockin) {

            $delStoDet = $stockin->stockInDetails()->delete();

            $delSto = $stockin->delete();

            if ($delStoDet === false || $delSto === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->noContent();
    }

    /**
     * 删除一组入库单
     *
     * @Delete("/stockins")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="入库单id组 格式: 1,2,3,4 ", required=true)
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
        $ids = explode(',', $request->input('ids'));

        DB::transaction(function() use ($ids) {
            $delStoDet = StockInDetail::whereIn('stock_ins_id', $ids)->delete();

            $delSto = StockIn::destroy($ids);

            if ($delStoDet === false || $delSto === false) {
                throw new DeleteResourceFailedException('The given data was invalid.');
            }
        });

        return $this->errorResponse(204);
    }

    /**
     * 更改一组入库单状态
     *
     * @PUT("/stockins/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="入库单id组 格式: 1,2,3,4 ", required=true),
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
     * 提交
     *
     * @PUT("/purchases/:id/submit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "is_submit": {
     *                  "需要更改错误确认数据的准确性，例如数据是否已启用、不可修改"
     *              }
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isSubmit(StockIn $stockin)
    {
        return $this->traitAction($stockin, !$stockin->status || $stockin->is_submit, '无需重复提交', 'input');
    }

    /**
     * 打印
     *
     * @PUT("/purchases/:id/print")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "打印出错，是否未提交未审核或重复打印",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isPrint(StockIn $stockin)
    {
        return $this->traitAction($stockin, !$stockin->status || !$stockin->is_submit || !$stockin->is_audit || $stockin->is_print, '打印出错，是否未提交未审核或重复打印', 'print');
    }

    /**
     * 审核
     *
     * @PUT("/purchases/:id/audit")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "审核出错，是否未提交或重复审核",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isAudit(StockIn $stockin)
    {
        return $this->traitAction($stockin, !$stockin->status || !$stockin->is_submit || $stockin->is_audit, '审核出错，是否未提交或重复审核', 'audit');
    }

    /**
     * 入库
     *
     * @PUT("/purchases/:id/stockin")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "入库出错",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function stockIn(StockIn $stockin)
    {
        DB::transaction(function() use ($stockin) {
            //修改入库状态
            $this->traitAction(
                $stockin,
                !$stockin->status || !$stockin->is_submit || !$stockin->is_audit || !$stockin->is_submit || $stockin->is_stock_in,
                '入库出错',
                'stockIn'
            );

            $stockin->stockInDetails->map(function($stockInDetail) use ($stockin) {
                $purchaseList = $stockInDetail->purchaseList;
                $purchaseList->addStockInCount($stockInDetail->stock_in_quantity);
                $purchaseList->purchaseDetails->map(function($purchaseDetail) use ($stockin, $stockInDetail) {
                    //修改子采购单明细的状态、入库数。
                    $purchaseDetail->addStockInCount($stockInDetail->stock_in_quantity);
                    //修改库存数量
                    $purchaseDetail->productSpec->stockInByWarehouseId($stockin->warehouse_id,$stockInDetail->stock_in_quantity);
                });
                //检查并修改主采购订单状态
                $stockInDetail->purchaseList->purchase->checkAndChangePurchaseStatus();
            });

        });

        return $this->noContent();
    }

}
