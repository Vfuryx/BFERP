<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
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
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
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
     *              "is_default": 0,
     *              "status": 1,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": 1,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "checker": null,
     *          "check_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": null,
     *          "is_check": null,
     *          "is_stock_in": null,
     *          "status": "0",
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
     *                  "purchase": {
     *                      "id": 1,
     *                      "purchase_order_no": "PO2018071718055128755",
     *                      "purchase_status": "新建",
     *                      "order_no": "",
     *                      "user_id": 1,
     *                      "receiver": "收货人3",
     *                      "receiver_address": "收货地址3",
     *                      "warehouse_id": 1,
     *                      "promise_delivery_time": null,
     *                      "salesman": "",
     *                      "source": "",
     *                      "client_name": "",
     *                      "buyer_nick": "",
     *                      "order_address": "",
     *                      "is_submit": 1,
     *                      "is_print": 1,
     *                      "is_check": 1,
     *                      "is_change": 0,
     *                      "remark": "备注3",
     *                      "status": 1,
     *                      "created_at": "2018-07-17 18:05:51",
     *                      "updated_at": "2018-07-18 14:16:33"
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
     *                      "is_combination": 0,
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
     *                      "finished_pro": 1,
     *                      "is_stop_pro": 0,
     *                      "status": 1,
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
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     *      @Parameter("stock_in_details",type="json", description="入库单详情", required=true),
     * })
     * @Request({
     *     {
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "status": 1,
     *          "stock_in_details": {
     *              {
     *                  "purchases_id": 1,
     *                  "product_specs_id": 1,
     *                  "stock_in_quantity": 5,
     *                  "remark": "备注"
     *              }
     *          }
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
     *              "stock_in_details": {
     *                  "入库单详情必须json类型"
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
     *              "is_default": 0,
     *              "status": 1,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": 1,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "checker": null,
     *          "check_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": null,
     *          "is_check": null,
     *          "is_stock_in": null,
     *          "status": "0",
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
     *                  "purchase": {
     *                      "id": 1,
     *                      "purchase_order_no": "PO2018071718055128755",
     *                      "purchase_status": "新建",
     *                      "order_no": "",
     *                      "user_id": 1,
     *                      "receiver": "收货人3",
     *                      "receiver_address": "收货地址3",
     *                      "warehouse_id": 1,
     *                      "promise_delivery_time": null,
     *                      "salesman": "",
     *                      "source": "",
     *                      "client_name": "",
     *                      "buyer_nick": "",
     *                      "order_address": "",
     *                      "is_submit": 1,
     *                      "is_print": 1,
     *                      "is_check": 1,
     *                      "is_change": 0,
     *                      "remark": "备注3",
     *                      "status": 1,
     *                      "created_at": "2018-07-17 18:05:51",
     *                      "updated_at": "2018-07-18 14:16:33"
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
     *                      "is_combination": 0,
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
     *                      "finished_pro": 1,
     *                      "is_stop_pro": 0,
     *                      "status": 1,
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
    public function store(StockInRequest $stockInRequest, StockInDetailRequest $stockInDetailRequest)
    {

        $stockIn = DB::transaction(function() use ($stockInRequest,$stockInDetailRequest){
            $date = $stockInRequest->validated();

            $stockIn = StockIn::create($date);

            if ($stockInDetails = $stockInRequest->input('stock_in_details')) {

                $stockInDetails = json_decode($stockInDetails, true);

                foreach ($stockInDetails as $stockInDetail) {

                    Validator::make($stockInDetail, $stockInDetailRequest->rules(), $stockInDetailRequest->messages())->validate();

                    $data = array_intersect_key($stockInDetail, $stockInDetailRequest->rules());

                    $stockIn->stockInDetails()->create($data);
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
     *              "is_default": 0,
     *              "status": 1,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": 1,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "checker": null,
     *          "check_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": null,
     *          "is_check": null,
     *          "is_stock_in": null,
     *          "status": "0",
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
     *                  "purchase": {
     *                      "id": 1,
     *                      "purchase_order_no": "PO2018071718055128755",
     *                      "purchase_status": "新建",
     *                      "order_no": "",
     *                      "user_id": 1,
     *                      "receiver": "收货人3",
     *                      "receiver_address": "收货地址3",
     *                      "warehouse_id": 1,
     *                      "promise_delivery_time": null,
     *                      "salesman": "",
     *                      "source": "",
     *                      "client_name": "",
     *                      "buyer_nick": "",
     *                      "order_address": "",
     *                      "is_submit": 1,
     *                      "is_print": 1,
     *                      "is_check": 1,
     *                      "is_change": 0,
     *                      "remark": "备注3",
     *                      "status": 1,
     *                      "created_at": "2018-07-17 18:05:51",
     *                      "updated_at": "2018-07-18 14:16:33"
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
     *                      "is_combination": 0,
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
     *                      "finished_pro": 1,
     *                      "is_stop_pro": 0,
     *                      "status": 1,
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
     *              "stock_in_details": {
     *                  "入库单详情必须json类型"
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
     *              "is_default": 0,
     *              "status": 1,
     *              "created_at": "2018-07-17 17:39:54",
     *              "updated_at": "2018-07-19 14:13:27"
     *          },
     *          "stock_in_type": {
     *              "id": 1,
     *              "name": "入库类型名称1",
     *              "status": 1,
     *              "created_at": "2018-07-19 17:51:13",
     *              "updated_at": "2018-07-19 17:58:07"
     *          },
     *          "creator": 1,
     *          "submitter": null,
     *          "submit_at": null,
     *          "checker": null,
     *          "check_at": null,
     *          "warehouer": null,
     *          "stock_in_at": null,
     *          "is_submit": null,
     *          "is_check": null,
     *          "is_stock_in": null,
     *          "status": "0",
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
     *                  "purchase": {
     *                      "id": 1,
     *                      "purchase_order_no": "PO2018071718055128755",
     *                      "purchase_status": "新建",
     *                      "order_no": "",
     *                      "user_id": 1,
     *                      "receiver": "收货人3",
     *                      "receiver_address": "收货地址3",
     *                      "warehouse_id": 1,
     *                      "promise_delivery_time": null,
     *                      "salesman": "",
     *                      "source": "",
     *                      "client_name": "",
     *                      "buyer_nick": "",
     *                      "order_address": "",
     *                      "is_submit": 1,
     *                      "is_print": 1,
     *                      "is_check": 1,
     *                      "is_change": 0,
     *                      "remark": "备注3",
     *                      "status": 1,
     *                      "created_at": "2018-07-17 18:05:51",
     *                      "updated_at": "2018-07-18 14:16:33"
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
     *                      "is_combination": 0,
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
     *                      "finished_pro": 1,
     *                      "is_stop_pro": 0,
     *                      "status": 1,
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
    public function update(StockInRequest $stockInRequest,StockInDetailRequest $stockInDetailRequest,StockIn $stockin)
    {
        $stockin = DB::transaction(function() use ($stockInRequest,$stockInDetailRequest,$stockin){

            $stockin->update($stockInRequest->validated());

            if ($stockInDetails = $stockInRequest->input('stock_in_details')) {
                $stockInDetails = json_decode($stockInDetails, true);
                foreach ($stockInDetails as $stockInDetail) {
                    //验证purchasedDetail数据
                    Validator::make($stockInDetail, $stockInDetailRequest->rules(), $stockInDetailRequest->messages())->validate();
                    //过滤出经过验证的数据
                    $data = array_intersect_key($stockInDetail, $stockInDetailRequest->rules());
                    //存在id则更新，否则插入
                    if(isset($stockInDetail['id'])){

                        StockInDetail::findOrFail($stockInDetail['id'])->update($data);
                    }else{
                        $stockin->stockInDetails()->create($data);
                    }
                }
            }
            return $stockin;
        });

        return $this->response
            ->item($stockin, new StockInTransformer())
            ->setStatusCode(201);    }

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
        DB::transaction(function() use ($stockin){

            $delStoDet = $stockin->stockInDetails()->delete();

            $delSto = $stockin->delete();

            if ($delStoDet === false || $delSto === false ) {
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

        DB::transaction(function() use ($ids){
            $delStoDet = StockInDetail::whereIn('stock_ins_id',$ids)->delete();

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
     * @PUT("/stockins")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="入库单id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(EditStatuRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

    /**
     * 提交
     *
     * @PUT("/purchases/:id/submit")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("is_submit", type="integer", description="是否提交", required=true)})
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
        return $this->traitAction($stockin,$stockin->is_submit,'无需重复提交','input');
    }

    /**
     * 打印
     *
     * @PUT("/purchases/:id/print")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("is_print", type="integer", description="是否打印", required=true)})
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
        return $this->traitAction($stockin,!$stockin->is_submit || !$stockin->is_check || $stockin->is_print,'打印出错，是否未提交未审核或重复打印','print');
    }

    /**
     * 审核
     *
     * @PUT("/purchases/:id/check")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(422, body={
     *          "message": "审核出错，是否未提交或重复审核",
     *          "status_code": 422,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function isCheck(StockIn $stockin)
    {
        return $this->traitAction($stockin,!$stockin->is_submit || $stockin->is_check,'审核出错，是否未提交或重复审核','check');
    }



}
