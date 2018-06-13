<?php

namespace App\Http\Requests\Api;


class AccountingTypeRequest extends FormRequest
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
                    'name' => 'required|string|between:5,32',
                    'status' => 'required|boolean'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|between:5,32',
                    'status' => 'boolean',
                    'id'=>'exists:accounting_types'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'status.required' => '状态必填',
            'status.boolean' => '状态必须布尔类型',
            'name.required' => '记账类型名称必填',
            'name.between' => '记账类型名称长度[5-32]',
            'name.string' => '记账类型名称必须string类型',
            'id.exists'=>'需要更改的数据id在数据库中未找到',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '记账类型名称',
            'status' => '记账类型状态',
        ];
    }

}
