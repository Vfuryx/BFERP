<?php

namespace App\Http\Controllers\Api;

use App\Models\PrintReport;
use App\Http\Requests\Api\PrintReportRequest;
use App\Transformers\PrintReportTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 打印报表资源
 * @Resource("printreports",uri="/api")
 */
class PrintReportsController extends Controller
{
    use CURDTrait;

    protected const TRANSFORMER = PrintReportTransformer::class;
    protected const MODEL = PrintReport::class;
    
    /**
     * 获取所有打印报表
     *
     * @Get("/printreports{?status}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="integer", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "file": "报表文件",
     *          "name": "报表名称",
     *          "paper_format": "报表格式",
     *          "status": 1,
     *          "created_at": "2018-07-03 17:50:46",
     *          "updated_at": "2018-07-03 17:50:49"
     *      },
     *      {
     *          "id": 2,
     *          "file": "报表文件",
     *          "name": "报表名称",
     *          "paper_format": "报表格式",
     *          "status": 1,
     *          "created_at": "2018-07-04 14:27:11",
     *          "updated_at": "2018-07-04 14:27:11"
     *      }
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
    public function index(PrintReportRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增打印报表
     *
     * @Post("/printreports")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("file", description="报表文件", required=true),
     *      @Parameter("name", description="报表名称", required=true),
     *      @Parameter("paper_format", description="报表格式", required=true),
     *      @Parameter("status",type="integer", description="状态(0:停用，1:启用)", required=false,default=1),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "file": {
     *                  "报表文件必填"
     *              },
     *              "name": {
     *                  "报表名称必填"
     *              },
     *              "paper_format": {
     *                  "报表格式必填"
     *              },
     *              "status": {
     *                  "状态必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
     *          "id": 2,
     *          "file": "报表文件",
     *          "name": "报表名称",
     *          "paper_format": "报表格式",
     *          "status": "1",
     *          "created_at": "2018-07-04 14:27:11",
     *          "updated_at": "2018-07-04 14:27:11",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(PrintReportRequest $request)
    {
        return $this->traitStore($request->validated(), self::MODEL, self::TRANSFORMER);
    }

    /**
     * 显示单条打印报表
     *
     * @Get("/printreports/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "file": "报表文件",
     *          "name": "报表名称",
     *          "paper_format": "报表格式",
     *          "status": 1,
     *          "created_at": "2018-07-03 17:50:46",
     *          "updated_at": "2018-07-03 17:50:49"
     *      })
     * })
     */
    public function show($id)
    {
        return $this->traitShow($id, self::MODEL, self::TRANSFORMER);
    }

    /**
     * 修改打印报表
     *
     * @Patch("/printreports/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "code": {
     *                  "费用代码不能重复"
     *               },
     *              "logistics_id": {
     *                  "需要添加的id在数据库中未找到或未启用"
     *               },
     *              "price": {
     *                  "物流费用必须是数字"
     *               },
     *           },
     *          "status_code": 422
     *      }),
     *      @Response(201, body={
     *          "id": 1,
     *          "file": "报表文件10",
     *          "name": "报表名称10",
     *          "paper_format": "报表格式10",
     *          "status": "1",
     *          "created_at": "2018-07-03 17:50:46",
     *          "updated_at": "2018-07-04 14:31:34"
     *      })
     * })
     */
    public function update(PrintReportRequest $request, PrintReport $printreport)
    {
        return $this->traitUpdate($request, $printreport, self::TRANSFORMER);
    }

    /**
     * 删除打印报表
     *
     * @Delete("/printreports/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(PrintReport $printreport)
    {
        return $this->traitDestroy($printreport);
    }

    /**
     * 删除一组打印报表
     *
     * @Delete("/printreports")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="打印报表id组 格式: 1,2,3,4 ", required=true)
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
    public function destroybyIds(PrintReportRequest $request)
    {
        return $this->traitDestroybyIds($request, self::MODEL);
    }

    /**
     * 更改一组打印报表状态
     * 
     * @PUT("/printreports")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="打印报表id组 格式: 1,2,3,4 ", required=true),
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
    public function editStatusByIds(PrintReportRequest $request)
    {
        return $this->traitEditStatusByIds($request, self::MODEL);
    }

}
