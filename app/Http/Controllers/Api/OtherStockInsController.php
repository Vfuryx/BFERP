<?php

namespace App\Http\Controllers\Api;

use App\Models\StockIn;

use App\Http\Requests\Api\OtherStockInRequest;
use App\Http\Requests\Api\OtherStockInDetailRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\OtherStockInTransformer;

use App\Http\Controllers\Traits\CURDTrait;
use App\Http\Controllers\Traits\ProcedureTrait;

use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * 其他入库单资源
 * @Resource("otherotherstockins",uri="/api")
 */
class OtherStockInsController extends Controller
{
    use CURDTrait;
    use ProcedureTrait;

    const TRANSFORMER = OtherStockInTransformer::class;
    const MODEL = StockIn::class;

    /**
     * 获取所有其他入库单
     *
     * @Get("/otherstockins[?status=true&include=warehouse,stockInType,stockInDetails,supplier,submitter,auditor,warehouer]")
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
     *              "stock_in_no": "IS2018091417222582919",
     *              "external_sn": "外部单号",
     *              "warehouse_id": 1,
     *              "stock_in_types_id": 1,
     *              "suppliers_id": 0,
     *              "creator": 1,
     *              "is_submit": false,
     *              "submitter": 0,
     *              "submit_at": null,
     *              "is_print": false,
     *              "print_at": null,
     *              "is_audit": false,
     *              "auditor": 0,
     *              "audit_at": null,
     *              "is_stock_in": false,
     *              "warehouer": 0,
     *              "stock_in_at": null,
     *              "status": true,
     *              "created_at": "2018-09-14 17:22:25",
     *              "updated_at": "2018-09-14 17:22:25"
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
     *                 "next": "{{host}}/api/otherstockins?page=1"
     *             }
     *         }
     *     }
     * })
     */
    public function index(OtherStockInRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }


    /**
     * 新增其他入库单
     *
     * @Post("/otherstockins")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("external_sn", description="外部单号", required=false),
     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=true),
     *      @Parameter("suppliers_id",type="integer", description="供应商id", required=true),
     *      @Parameter("stock_in_types_id",type="integer", description="入库类型id", required=true),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("other_stock_in_details[0][product_components_id]",type="integer", description="子件id", required=true),
     *      @Parameter("other_stock_in_details[0][stock_in_quantity]",type="integer", description="入库数量", required=true),
     *      @Parameter("other_stock_in_details[0][total_fee]",type="number", description="总额", required=true),
     *      @Parameter("other_stock_in_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "external_sn": "RT2121212121212",
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "suppliers_id": 1,
     *          "status": true,
     *          "stock_in_details[0][product_components_id]":1,
     *          "stock_in_details[0][stock_in_quantity]":1,
     *          "stock_in_details[0][total_fee]":1,
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
     *          "id": 1,
     *          "stock_in_no": "IS2018091417222582919",
     *          "external_sn": "外部单号",
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "creator": 1,
     *          "is_submit": false,
     *          "submitter": 0,
     *          "submit_at": null,
     *          "is_print": false,
     *          "print_at": null,
     *          "is_audit": false,
     *          "auditor": 0,
     *          "audit_at": null,
     *          "is_stock_in": false,
     *          "warehouer": 0,
     *          "stock_in_at": null,
     *          "status": true,
     *          "created_at": "2018-09-14 17:22:25",
     *          "updated_at": "2018-09-14 17:22:25",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(
        OtherStockInRequest $otherStockInRequest,
        OtherStockInDetailRequest $otherOtherStockInDetailRequest
    ){
        $data[] = $otherStockInRequest->validated();
        $data[] = $otherOtherStockInDetailRequest->input('other_stock_in_details');

        return $this->traitJoint2Store(
            $data,
            'stockInDetails',
            $otherOtherStockInDetailRequest->rules(),
            self::MODEL,
            self::TRANSFORMER
        );
    }

    /**
     * 显示单条其他入库单
     *
     * @Get("/otherstockins/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "stock_in_no": "IS2018091417222582919",
     *          "external_sn": "外部单号",
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "creator": 1,
     *          "is_submit": false,
     *          "submitter": 0,
     *          "submit_at": null,
     *          "is_print": false,
     *          "print_at": null,
     *          "is_audit": false,
     *          "auditor": 0,
     *          "audit_at": null,
     *          "is_stock_in": false,
     *          "warehouer": 0,
     *          "stock_in_at": null,
     *          "status": true,
     *          "created_at": "2018-09-14 17:22:25",
     *          "updated_at": "2018-09-14 17:22:25",
     *      })
     * })
     */
    public function show(StockIn $stockin)
    {
        return $this->traitShow($stockin, self::TRANSFORMER);
    }


    /**
     * 修改其他入库单
     *
     * @Patch("/otherstockins/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("external_sn", description="外部单号", required=false),
     *      @Parameter("warehouse_id",type="integer", description="仓库id", required=false),
     *      @Parameter("suppliers_id",type="integer", description="供应商id", required=false),
     *      @Parameter("stock_in_types_id",type="integer", description="入库类型id", required=false),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=false),
     *      @Parameter("other_stock_in_details[0][product_components_id]",type="integer", description="子件id", required=false),
     *      @Parameter("other_stock_in_details[0][stock_in_quantity]",type="integer", description="入库数量", required=false),
     *      @Parameter("other_stock_in_details[0][total_fee]",type="number", description="总额", required=false),
     *      @Parameter("other_stock_in_details[0][remark]", description="备注", required=false),
     * })
     * @Request({
     *     {
     *          "external_sn": "RT2121212121212",
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "suppliers_id": 1,
     *          "status": true,
     *          "stock_in_details[0][product_components_id]":1,
     *          "stock_in_details[0][stock_in_quantity]":1,
     *          "stock_in_details[0][total_fee]":1,
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
     *          "id": 1,
     *          "stock_in_no": "IS2018091417222582919",
     *          "external_sn": "外部单号",
     *          "warehouse_id": 1,
     *          "stock_in_types_id": 1,
     *          "creator": 1,
     *          "is_submit": false,
     *          "submitter": 0,
     *          "submit_at": null,
     *          "is_print": false,
     *          "print_at": null,
     *          "is_audit": false,
     *          "auditor": 0,
     *          "audit_at": null,
     *          "is_stock_in": false,
     *          "warehouer": 0,
     *          "stock_in_at": null,
     *          "status": true,
     *          "created_at": "2018-09-14 17:22:25",
     *          "updated_at": "2018-09-14 17:22:25",
     *      })
     * })
     */
    public function update(
        OtherStockInRequest $otherStockInRequest,
        OtherStockInDetailRequest $otherOtherStockInDetailRequest,
        StockIn $stockin
    ){
        //判断是否提交
        if ($stockin->is_submit)
            throw new UpdateResourceFailedException('已提交无法修改');

        $data[] = $otherStockInRequest->validated();
        $data[] = $otherOtherStockInDetailRequest->input('other_stock_in_details');

        return $this->traitJoint2Update(
            $data,
            'stockInDetails',
            $otherOtherStockInDetailRequest->rules(),
            $stockin,
            self::TRANSFORMER
        );
    }

    /**
     * 删除其他入库单
     *
     * @Delete("/otherstockins/:id")
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
     * 删除一组其他入库单
     *
     * @Delete("/otherstockins")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="其他入库单id组 格式: 1,2,3,4 ", required=true)
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
     * 更改一组其他入库单状态
     *
     * @PUT("/otherstockins/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="其他入库单id组 格式: 1,2,3,4 ", required=true),
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
     * @PUT("/otherstockins/:id/submit")
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
     * @PUT("/otherstockins/:id/print")
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
     * @PUT("/otherstockins/:id/audit")
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
     * @PUT("/otherstockins/:id/stockin")
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
        \DB::transaction(function() use ($stockin) {
            //遍历其他入库单详情
            $stockin->stockInDetails->map(function($stockInDetail) use ($stockin) {
                //修改库存数量
                $stockInDetail->productComponent->stockInByWarehouseId($stockin->warehouse_id,$stockInDetail->stock_in_quantity);
            });

            //修改入库状态
            $this->traitAction(
                $stockin,
                !$stockin->status || !$stockin->is_submit || !$stockin->is_audit || !$stockin->is_submit || $stockin->is_stock_in,
                '入库出错',
                'stockIn'
            );
        });

        return $this->noContent();
    }

}
