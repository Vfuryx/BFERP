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
                    'name' => 'required|between:5,32',
                    'status' => 'required|boolean'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'between:5,32',
                    'status' => 'boolean'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'status.required' => '状态代必填',
            'status.boolean' => '状态代必须布尔类型',
            'name.required' => '记账类型名称必填',
            'name.between' => '记账类型名称长度[5-32]位',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '记账类型名称',
            'status' => '记账类型状态代',
        ];
    }

}
