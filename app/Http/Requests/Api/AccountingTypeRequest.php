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
                    'name' => 'required|string',
                    'status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
                    'status' => 'integer',
                    'id'=>'exists:accounting_types'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'status.boolean' => '状态必须int类型',
            'name.required' => '记账类型名称必填',
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
