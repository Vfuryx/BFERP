<?php

namespace App\Http\Requests\Api;


class FreightTypeRequest extends FormRequest
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
                    'is_default' => 'integer',
                    'status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
                    'is_default' => 'integer',
                    'id' => 'exists:freight_types',
                    'status' => 'integer'
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
            'status.integer' => '状态必须int类型',
            'status.required' => '状态必填',
            'name.required' => '运费名称必填',
            'name.string' => '运费名称必须string类型',
            'is_default.boolean' => '是否默认必须int类型',
            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '运费名称',
            'is_default' => '是否默认',
            'status' => '记账类型状态'
        ];
    }
}
