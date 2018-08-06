<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class GoodsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'status' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'commodity_code' => 'required|string|max:255|unique:goods',
                    'jd_sn' => 'required|string|max:255',
                    'vips_sn' => 'required|string|max:255',
                    'factory_model' => 'required|string|max:255',
                    'short_name' => 'required|string|max:255',
                    'nick' => 'required|string|max:255',
                    'supplier_id' => [
                        'required', 'integer',
                        Rule::exists('suppliers', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'category_id' => [
                        'required', 'integer',
                        Rule::exists('goods_categories', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'remark' => 'required|string|max:255',
                    'title' => 'required|string|max:255',
                    'img' => 'required|url|max:255',
                    'url' => 'required|url|max:255',
                    'status' => 'boolean',
                    'is_stop_pro' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'commodity_code' => [
                        'string', 'max:255',
                        Rule::unique('goods')->ignore($this->goods->id),
                    ],
                    'jd_sn' => 'string|max:255',
                    'vips_sn' => 'string|max:255',
                    'factory_model' => 'string|max:255',
                    'short_name' => 'string|max:255',
                    'nick' => 'string|max:255',
                    'supplier_id' => [
                        'integer',
                        Rule::exists('suppliers', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'category_id' => [
                        'integer',
                        Rule::exists('goods_categories', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'remark' => 'string|max:255',
                    'title' => 'string|max:255',
                    'img' => 'url|max:255',
                    'url' => 'url|max:255',
                    'status' => 'boolean',
                    'is_stop_pro' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [

            'commodity_code.unique' => '商品编码不能重复',
            'commodity_code.required' => '商品编码必填',
            'commodity_code.string' => '商品编码必须string类型',
            'commodity_code.max' => '商品编码最大长度为255',

            'jd_sn.required' => '京东编码必填',
            'jd_sn.string' => '京东编码必须string类型',
            'jd_sn.max' => '京东编码最大长度为255',

            'vips_sn.required' => '唯品会编码必填',
            'vips_sn.string' => '唯品会编码必须string类型',
            'vips_sn.max' => '唯品会编码最大长度为255',

            'factory_model.required' => '工厂型号必填',
            'factory_model.string' => '工厂型号必须string类型',
            'factory_model.max' => '工厂型号最大长度为255',

            'short_name.required' => '商品简称必填',
            'short_name.string' => '商品简称必须string类型',
            'short_name.max' => '商品简称最大长度为255',

            'nick.required' => '卖家昵称必填',
            'nick.string' => '卖家昵称必须string类型',
            'nick.max' => '卖家昵称最大长度为255',

            'supplier_id.required' => '供应商id必填',
            'supplier_id.integer' => '供应商id必须int类型',
            'supplier_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'category_id.required' => '产品类别id必填',
            'category_id.integer' => '产品类别id必须int类型',
            'category_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'title.required' => '商品标题必填',
            'title.string' => '商品标题必须string类型',
            'title.max' => '商品标题最大长度为255',

            'img.required' => '商品图片必填',
            'img.url' => '商品图片必须有效的url',
            'img.max' => '商品图片最大长度为255',

            'url.required' => '商品网址必填',
            'url.url' => '商品网址必须有效的url',
            'url.max' => '商品网址最大长度为255',

            'is_stop_pro.boolean' => '是否停产布尔必须布尔类型 默认 0 = 不停产  1 = 停产',

            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',

        ];
    }

    public function attributes()
    {
        return [
            'commodity_code' => '商品编码',
            'jd_sn' => '京东编码',
            'vips_sn' => '唯品会编码',
            'factory_model' => '工厂型号',
            'short_name' => '商品简称',
            'nick' => '卖家昵称（店铺昵称）',
            'supplier_id' => '供应商id',
            'category_id' => '产品类别id',
            'remark' => '备注',
            'title' => '商品标题',
            'img' => '商品图片',
            'url' => '商品网址',
            'status' => '状态：0=停用，1=启用',
            'is_stop_pro' => '是否停产 默认 0 = 不停产  1 = 停产',
        ];
    }
}
