<?php

namespace App\Http\Controllers\Api;

use App\Models\Series;
use App\Http\Requests\Api\SeriesRequest;
use App\Http\Requests\Api\EditStatuRequest;
use App\Http\Requests\Api\DestroyRequest;
use App\Transformers\SeriesTransformer;
use App\Http\Controllers\Traits\CURDTrait;

/**
 * 系列资源
 * @Resource("series",uri="/api")
 */
class SeriesController extends Controller
{
    use CURDTrait;

    const TRANSFORMER = SeriesTransformer::class;
    const MODEL = Series::class;

    /**
     * 获取所有系列
     *
     * @Get("/series[?status=true&include=suppliers]")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("status", type="boolean", description="获取的状态", required=false, default="all"),
     *      @Parameter("include",  description="加载关联的数据", required=false),
     * })
     * @Response(200, body={
     * "data": {
     *      {
     *          "id": 1,
     *          "suppliers": {
     *              "id": 1,
     *              "name": "供应商名称4",
     *              "company": "供应商公司4",
     *              "code": "公司代码4",
     *              "province": "省4",
     *              "city": "市4",
     *              "district": "区4",
     *              "address": "地址4",
     *              "zipcode": "邮编4",
     *              "contacts": "联系人4",
     *              "phone": "电话4",
     *              "mobile": "手机4",
     *              "fax": "传真4",
     *              "remark": "备注4",
     *              "is_scan": true,
     *              "status": true,
     *              "auto_valuation": true,
     *              "created_at": "2018-07-04 11:11:39",
     *              "updated_at": "2018-07-04 11:22:29"
     *          },
     *          "code": "系列代码",
     *          "name": "系列名称",
     *          "description": "系列描述",
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-07-04 14:03:49",
     *          "updated_at": "2018-07-04 14:03:49"
     *      },
     *      {
     *          "id": 2,
     *          "suppliers": {
     *              "id": 1,
     *              "name": "供应商名称4",
     *              "company": "供应商公司4",
     *              "code": "公司代码4",
     *              "province": "省4",
     *              "city": "市4",
     *              "district": "区4",
     *              "address": "地址4",
     *              "zipcode": "邮编4",
     *              "contacts": "联系人4",
     *              "phone": "电话4",
     *              "mobile": "手机4",
     *              "fax": "传真4",
     *              "remark": "备注4",
     *              "is_scan": true,
     *              "status": true,
     *              "auto_valuation": true,
     *              "created_at": "2018-07-04 11:11:39",
     *              "updated_at": "2018-07-04 11:22:29"
     *          },
     *          "code": "系列代码2",
     *          "name": "系列名称",
     *          "description": "系列描述",
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-07-04 14:09:51",
     *          "updated_at": "2018-07-04 14:09:51"
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
    public function index(SeriesRequest $request)
    {
        return $this->allOrPage($request, self::MODEL, self::TRANSFORMER, 10);
    }

    /**
     * 显示单条系列
     *
     * @Get("/series/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(200, body={
     *          "id": 1,
     *          "suppliers": {
     *              "id": 1,
     *              "name": "供应商名称4",
     *              "company": "供应商公司4",
     *              "code": "公司代码4",
     *              "province": "省4",
     *              "city": "市4",
     *              "district": "区4",
     *              "address": "地址4",
     *              "zipcode": "邮编4",
     *              "contacts": "联系人4",
     *              "phone": "电话4",
     *              "mobile": "手机4",
     *              "fax": "传真4",
     *              "remark": "备注4",
     *              "is_scan": true,
     *              "status": true,
     *              "auto_valuation": true,
     *              "created_at": "2018-07-04 11:11:39",
     *              "updated_at": "2018-07-04 11:22:29"
     *          },
     *          "code": "系列代码",
     *          "name": "系列名称",
     *          "description": "系列描述",
     *          "remark": "备注",
     *          "status": true,
     *          "created_at": "2018-07-04 14:03:49",
     *          "updated_at": "2018-07-04 14:03:49"
     *      })
     * })
     */
    public function show(Series $series)
    {
        return $this->traitShow($series, self::TRANSFORMER);
    }


    /**
     * 删除系列
     *
     * @Delete("/series/:id")
     * @Versions({"v1"})
     * @Transaction({
     *      @Response(404, body={
     *          "message": "No query results for model ",
     *          "status_code": 404,
     *      }),
     *      @Response(204, body={})
     * })
     */
    public function destroy(Series $series)
    {
        return $this->traitDestroy($series);
    }

    /**
     * 删除一组系列
     *
     * @Delete("/series")
     * @Versions({"v1"})
     * @Parameters({
     * @Parameter("ids", description="系列id组 格式: 1,2,3,4 ", required=true)
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
        return $this->traitDestroybyIds($request, self::MODEL);
    }

}
