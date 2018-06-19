<?php

namespace App\Http\Requests\Api;


class FeeTypeRequest extends FormRequest
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
                    'fee_category_id' => 'required|integer|exists:fee_categories,id',
                    'code' => 'required|string|max:255|unique:fee_types',
                    'is_default' => 'integer',
                    'status' => 'integer',
                    'remark' => 'string|nullable|max:255'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
                    'fee_category_id' => 'integer',
                    'code' => 'string|max:255|unique:fee_types',
                    'is_default' => 'integer',
                    'status' => 'integer',
                    'remark' => 'string|nullable|max:255',
                    'id' => 'exists:fee_types'
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
            'name.required' => '费用名称必填',
            'name.string' => '费用名称必须string类型',
            'fee_category_id.required' => '费用类别id必填',
            'fee_category_id.integer' => '费用类别id必须int类型',
            'fee_category_id.exists' => '需要添加的id在数据库中未找到',
            'code.required' => '费用代码必填',
            'code.string' => '费用代码必须string类型',
            'code.max' => '费用代码最大长度为255',
            'code.unique' => '费用代码不能重复',
            'is_default.integer' => '是否默认必须int类型',
            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
            'remark.string' => '费用类别备注必须string类型',
            'remark.nullable' => '费用类别备注可为null',
            'remark.max' => '费用类别备注最大长度为255',
            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型'
        ];
    }

    public function attributes()
    {
        return [
            'fee_category_id' => '费用类别id',
            'name' => '费用名称',
            'code' => '费用代码',
            'is_default' => '是否默认',
            'status' => '费用类别状态',
            'remark' => '费用类别备注',
        ];
    }

}
