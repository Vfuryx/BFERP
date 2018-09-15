<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Models\StockIn;

use App\Http\Requests\Api\StockInRequest;
use App\Http\Requests\Api\StockInDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\StockInTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

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
     * @Get("/stockins[?status=true&include=warehouse,stockInType,stockInDetails]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("is_submit", type="boolean", description="是否提交", required=false),
     *      @Parameter("is_stock_in", type="boolean", description="是否入库", required=false),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     *     "data": {
     *         {
     *              "id": 1,
     *              "stock_in_no": "IS2018081513063587085",
     *              "warehouse_id": 1,
     *              "stock_in_types_id": 3,
     *              "creator": 1,
     *              "is_submit": true,
     *              "submitter": 1,
     *              "submit_at": "2018-08-15 14:14:09",
     *              "is_print": true,
     *              "print_at": "2018-08-15 14:17:29",
     *              "is_audit": true,
     *              "auditor": 1,
     *              "audit_at": "2018-08-15 14:17:03",
     *              "is_stock_in": true,
     *              "warehouer": 1,
     *              "stock_in_at": "2018-08-15 16:25:24",
     *              "status": true,
     *              "created_at": "2018-08-15 13:06:35",
     *              "updated_at": "2018-08-15 16:25:24",
     *              "warehouse": {
     *                  "id": 1,
     *                  "name": "仓库名称",
     *                  "province": "仓库地（省）",
     *                  "city": "仓库地（市）",
     *                  "district": "仓库地（区）",
     *                  "address": "仓库地（地址）",
     *                  "is_default": true,
     *                  "status": true,
     *                  "created_at": "2018-08-06 16:25:28",
     *                  "updated_at": "2018-08-06 16:25:28"
     *              },
     *              "stockInType": {
     *                  "id": 3,
     *                  "name": "入库方式1",
     *                  "status": true,
     *                  "created_at": "2018-08-06 18:27:19",
     *                  "updated_at": "2018-08-06 18:27:19"
     *              },
     *              "stockInDetails": {
     *                  "data": {}
     *              }
     *         }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 1,
     *             "count": 1,
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
     *      @Parameter("stock_in_details[0][purchase_details_id]",type="integer", description="采购单详情id", required=true),
     *      @Parameter("stock_in_details[0][product_components_id]",type="integer", description="子件id", required=true),
     *      @Parameter("stock_in_details[0][stock_in_quantity]",type="integer", description="入库数量", required=true),
     *      @Parameter("stock_in_details[0][total_fee]",type="number", description="总额", required=true),
     *      @Parameter("stock_in_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "status": true,
     *          "stock_in_details[0][purchase_details_id]": 1,
     *          "stock_in_details[0][product_components_id]": 1,
     *          "stock_in_details[0][stock_in_quantity]": 10,
     *          "stock_in_details[0][remark]": "备注",
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
     *          "id": 1,
     *          "stock_in_no": "IS2018081513063587085",
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 3,
     *          "creator": 1,
     *          "is_submit": true,
     *          "submitter": "admin",
     *          "submit_at": "2018-08-15 14:14:09",
     *          "is_print": true,
     *          "print_at": "2018-08-15 14:17:29",
     *          "is_audit": true,
     *          "auditor": "admin",
     *          "audit_at": "2018-08-15 14:17:03",
     *          "is_stock_in": true,
     *          "warehouer": "admin",
     *          "stock_in_at": "2018-08-15 16:25:24",
     *          "status": true,
     *          "created_at": "2018-08-15 13:06:35",
     *          "updated_at": "2018-08-15 16:25:24",
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
     *          "stockInType": {
     *              "id": 3,
     *              "name": "入库方式1",
     *              "status": true,
     *              "created_at": "2018-08-06 18:27:19",
     *              "updated_at": "2018-08-06 18:27:19"
     *          },
     *          "stockInDetails": {
     *              "data": {}
     *          },
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(StockInRequest $stockInRequest, StockInDetailRequest $stockInDetailRequest)
    {
        $data[] = $stockInRequest->validated();
        $data[] = $stockInDetailRequest->input('stock_in_details');

        return $this->traitJoint2Store(
            $data,
            'stockInDetails',
            $stockInDetailRequest->rules(),
            self::MODEL,
            self::TRANSFORMER
        );
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
     *          "id": 1,
     *          "stock_in_no": "IS2018081513063587085",
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 3,
     *          "creator": 1,
     *          "is_submit": true,
     *          "submitter": "admin",
     *          "submit_at": "2018-08-15 14:14:09",
     *          "is_print": true,
     *          "print_at": "2018-08-15 14:17:29",
     *          "is_audit": true,
     *          "auditor": "admin",
     *          "audit_at": "2018-08-15 14:17:03",
     *          "is_stock_in": true,
     *          "warehouer": "admin",
     *          "stock_in_at": "2018-08-15 16:25:24",
     *          "status": true,
     *          "created_at": "2018-08-15 13:06:35",
     *          "updated_at": "2018-08-15 16:25:24",
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
     *          "stockInType": {
     *              "id": 3,
     *              "name": "入库方式1",
     *              "status": true,
     *              "created_at": "2018-08-06 18:27:19",
     *              "updated_at": "2018-08-06 18:27:19"
     *          },
     *          "stockInDetails": {
     *              "data": {}
     *          }
     *      })
     * })
     */
    public function show(StockIn $stockin)
    {
        return $this->traitShow($stockin, self::TRANSFORMER);
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
     *      @Parameter("stock_in_details[0][purchase_details_id]",type="integer", description="采购单详情id", required=false),
     *      @Parameter("stock_in_details[0][product_components_id]",type="integer", description="子件id", required=false),
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
     *          "stock_in_details[0][purchase_details_id]":1,
     *          "stock_in_details[0][product_components_id]":1,
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
     *           "id": 1,
     *           "stock_in_no": "IS2018081513063587085",
     *           "warehouse_id": 1,
     *           "stock_in_types_id": 3,
     *           "creator": 1,
     *           "is_submit": true,
     *           "submitter": "admin",
     *           "submit_at": "2018-08-15 14:14:09",
     *           "is_print": true,
     *           "print_at": "2018-08-15 14:17:29",
     *           "is_audit": true,
     *           "auditor": "admin",
     *           "audit_at": "2018-08-15 14:17:03",
     *           "is_stock_in": true,
     *           "warehouer": "admin",
     *           "stock_in_at": "2018-08-15 16:25:24",
     *           "status": true,
     *           "created_at": "2018-08-15 13:06:35",
     *           "updated_at": "2018-08-15 16:25:24",
     *           "warehouse": {
     *               "id": 1,
     *               "name": "仓库名称",
     *               "province": "仓库地（省）",
     *               "city": "仓库地（市）",
     *               "district": "仓库地（区）",
     *               "address": "仓库地（地址）",
     *               "is_default": true,
     *               "status": true,
     *               "created_at": "2018-08-06 16:25:28",
     *               "updated_at": "2018-08-06 16:25:28"
     *           },
     *           "stockInType": {
     *               "id": 3,
     *               "name": "入库方式1",
     *               "status": true,
     *               "created_at": "2018-08-06 18:27:19",
     *               "updated_at": "2018-08-06 18:27:19"
     *           },
     *           "stockInDetails": {
     *               "data": {}
     *           }
     *      })
     * })
     */
    public function update(StockInRequest $stockInRequest, StockInDetailRequest $stockInDetailRequest, StockIn $stockin)
    {
        //判断是否提交
        if ($stockin->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $data[] = $stockInRequest->validated();
        $data[] = $stockInDetailRequest->input('stock_in_details');

        return $this->traitJoint2Update(
            $data,
            'stockInDetails',
            $stockInDetailRequest->rules(),
            $stockin,
            self::TRANSFORMER
        );
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
        $this->traitJoint2Destroy($stockin,'stockInDetails');
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
        $this->traitJoint2DestroybyIds($request->input('ids'),'stockInDetails',self::MODEL);
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
     *          "message": "无需重复提交",
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
            //遍历入库单详情
            $stockin->stockInDetails->map(function($stockInDetail) use ($stockin) {
                //获取采购详情
                $purchaseDetail = $stockInDetail->purchaseDetail;
                //修改子采购单明细的状态、入库数。
                $purchaseDetail->addStockInCount($stockInDetail->stock_in_quantity);
                //修改库存数量
                $purchaseDetail->productComponent->stockInByWarehouseId($stockin->warehouse_id,$stockInDetail->stock_in_quantity);
                //检查并修改主采购订单状态
                $stockInDetail->purchaseDetail->purchaseList->purchase->checkAndChangePurchaseStatus();
            });

        });

        return $this->noContent();
    }

}
