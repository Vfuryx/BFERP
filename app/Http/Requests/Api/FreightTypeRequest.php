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
            case 'GET':
                return [
                    'status' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'name' => 'required|string',
                    'is_default' => 'boolean',
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
                    'is_default' => 'boolean',
                    'status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',
            'name.required' => '运费名称必填',
            'name.string' => '运费名称必须string类型',
            'is_default.boolean' => '是否默认必须布尔类型',
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
