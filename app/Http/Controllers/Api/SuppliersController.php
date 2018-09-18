<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;

use App\Http\Requests\Api\SeriesRequest;
use App\Http\Requests\Api\SupplierRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;

use App\Transformers\SupplierTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 供应商资源
 * @Resource("suppliers",uri="/api")
 */
class SuppliersController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = SupplierTransformer::class;
    const MODEL = Supplier::class;

    /**
     * 获取所有供应商
     *
     * @Get("/suppliers[?status=true&include=series]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all")
     * })
     * @Response(200, body={
     * "data": {
     *      {
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
     *          "is_scan": true,
     *          "status": true,
     *          "auto_valuation": true,
     *          "created_at": "2018-09-18 14:02:46",
     *          "updated_at": "2018-09-18 14:02:46"
     *      }
     *     },
     *     "meta": {
     *         "pagination": {
     *             "total": 1,
     *             "count": 1,
     *             "per_page": 10,
     *             "current_page": 1,
     *             "total_pages": 1,
     *             "links": null
     *         }
     *     }
     * })
     */
    public function index(SupplierRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 新增供应商
     *
     * @Post("/suppliers")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="供应商名称", required=true),
     *      @Parameter("company", description="供应商公司", required=true),
     *      @Parameter("code", description="公司代码", required=true),
     *      @Parameter("province", description="省", required=true),
     *      @Parameter("city", description="市", required=true),
     *      @Parameter("district", description="区", required=true),
     *      @Parameter("address", description="地址", required=true),
     *      @Parameter("zipcode", description="邮编", required=true),
     *      @Parameter("phone", description="电话", required=true),
     *      @Parameter("mobile", description="手机", required=true),
     *      @Parameter("fax", description="传真", required=true),
     *      @Parameter("email", description="邮箱", required=true),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("is_scan",type="boolean", description="是否启用扫描", required=false, default=true),
     *      @Parameter("auto_valuation",type="boolean", description="是否采购自动计价", required=false, default=1),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=true),
     *      @Parameter("series[0][code]", description="系列代码", required=false),
     *      @Parameter("series[0][name]", description="系列名称", required=false),
     *      @Parameter("series[0][description]", description="系列描述", required=false),
     *      @Parameter("series[0][remark]", description="备注", required=false),
     *      @Parameter("series[0][status]", type="boolean", description="状态", required=false, default=true),
     * })
     * @Transaction({
     *      @Response(422, body={
     *          "message": "422 Unprocessable Entity",
     *           "errors": {
     *              "code": {
     *                  "公司代码不能重复"
     *              },
     *              "is_scan": {
     *                  "是否启用扫描必须int类型"
     *              },
     *              "auto_valuation": {
     *                  "是否采购自动计价必须int类型"
     *              },
     *              "status": {
     *                  "状态必须int类型"
     *              },
     *           },
     *          "status_code": 422,
     *      }),
     *      @Response(201, body={
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
     *          "is_scan": true,
     *          "status": true,
     *          "auto_valuation": true,
     *          "created_at": "2018-09-18 14:02:46",
     *          "updated_at": "2018-09-18 14:02:46",
     *          "meta": {
     *              "status_code": "201"
     *          }
     *      })
     * })
     */
    public function store(SupplierRequest $supplierRequest,SeriesRequest $seriesRequest)
    {
        $data[] = $supplierRequest->validated();
        $data[] = $seriesRequest->input('series');

        return $this->traitJoint2Store(
            $data,
            'series',
            $seriesRequest->rules(),
            self::MODEL,
            self::TRANSFORMER
        );
    }

    /**
     * 显示单条供应商
     *
     * @Get("/suppliers/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
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
     *          "is_scan": true,
     *          "status": true,
     *          "auto_valuation": true,
     *          "created_at": "2018-09-18 14:02:46",
     *          "updated_at": "2018-09-18 14:02:46",
     *      })
     * })
     */
    public function show(Supplier $supplier)
    {
        return $this->traitShow($supplier, self::TRANSFORMER);
    }

    /**
     * 修改供应商
     *
     * @Patch("/suppliers/:id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="供应商名称", required=false),
     *      @Parameter("company", description="供应商公司", required=false),
     *      @Parameter("code", description="公司代码", required=false),
     *      @Parameter("province", description="省", required=false),
     *      @Parameter("city", description="市", required=false),
     *      @Parameter("district", description="区", required=false),
     *      @Parameter("address", description="地址", required=false),
     *      @Parameter("zipcode", description="邮编", required=false),
     *      @Parameter("phone", description="电话", required=false),
     *      @Parameter("mobile", description="手机", required=false),
     *      @Parameter("fax", description="传真", required=false),
     *      @Parameter("email", description="邮箱", required=false),
     *      @Parameter("remark", description="备注", required=false),
     *      @Parameter("is_scan",type="boolean", description="是否启用扫描", required=false, default=false),
     *      @Parameter("auto_valuation",type="boolean", description="是否采购自动计价", required=false, default=1),
     *      @Parameter("status",type="boolean", description="状态(0:停用，1:启用)", required=false, default=false),
     *      @Parameter("series[0][id]", description="系列id", required=false),
     *      @Parameter("series[0][code]", description="系列代码", required=false),
     *      @Parameter("series[0][name]", description="系列名称", required=false),
     *      @Parameter("series[0][description]", description="系列描述", required=false),
     *      @Parameter("series[0][remark]", description="备注", required=false),
     *      @Parameter("series[0][status]", type="boolean", description="状态", required=false, default=false),
     * })
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
     *          "is_scan": true,
     *          "status": true,
     *          "auto_valuation": true,
     *          "created_at": "2018-09-18 14:02:46",
     *          "updated_at": "2018-09-18 14:02:46",
     *      })
     * })
     */
    public function update(SupplierRequest $supplierRequest,SeriesRequest $seriesRequest, Supplier $supplier)
    {
        $data[] = $supplierRequest->validated();
        $data[] = $seriesRequest->input('series');

        return $this->traitJoint2Update(
            $data,
            'series',
            $seriesRequest->rules(),
            $supplier,
            self::TRANSFORMER
        );
    }

    /**
     * 删除供应商
     *
     * @Delete("/suppliers/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Supplier $supplier)
    {
        return $this->traitJoint2Destroy($supplier, 'series');
    }

    /**
     * 删除一组供应商
     *
     * @Delete("/suppliers")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="供应商id组 格式: 1,2,3,4 ", required=true)
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
        return $this->traitJoint2DestroybyIds($request->input('ids'),'series', self::MODEL);
    }

    /**
     * 更改一组供应商状态
     * 
     * @PUT("/suppliers/editstatus")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("ids", description="供应商id组 格式: 1,2,3,4 ", required=true),
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
