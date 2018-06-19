<?php

namespace App\Http\Requests\Api;


class GoodsCategoryRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string',
                    'code' => 'required|string|max:255|unique:goods_categories',
                    'status' => 'integer',
                    'remark' => 'nullable|string|max:255',
                    'description' => 'nullable|string|max:255'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
                    'code' => 'string|max:255|unique:goods_categories',
                    'status' => 'integer',
                    'remark' => 'nullable|string|max:255',
                    'description' => 'nullable|string|max:255',
                    'id' => 'exists:goods_categories'
                ];
                break;
            case 'DELETE':
                return [
                    'ids' => 'required|string',
                ];
                break;
            case 'PUT':
                return [
                    'ids' => 'required|string',
                    'status' => 'required|integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '商品类别名称必填',
            'name.string' => '商品类别名称必须string类型',
            'code.required' => '商品类别代码必填',
            'code.string' => '商品类别代码必须string类型',
            'code.max' => '商品类别代码最大长度为255',
            'code.unique' => '商品类别代码不能重复',
            'status.integer' => '状态必须int类型',
            'status.required' => '状态必填',
            'remark.max' => '商品类别备注最大长度为255',
            'remark.nullable' => '商品类别备注可为null',
            'remark.string' => '商品类别备注必须string类型',
            'description.max' => '商品类别描述最大长度为255',
            'description.nullable' => '商品类别描述可为null',
            'description.string' => '商品类别描述必须string类型',
            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '商品类别名称',
            'code' => '商品类别代码',
            'status' => '商品类别状态',
            'remark' => '商品类别备注',
            'description' => '商品类别描述'
        ];
    }
}
