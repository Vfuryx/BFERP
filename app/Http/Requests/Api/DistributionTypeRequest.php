<?php

namespace App\Http\Requests\Api;


class DistributionTypeRequest extends FormRequest
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
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
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

            'name.required' => '配送类型名称必填',
            'name.string' => '配送类型名称必须string类型',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '配送类型名称',
            'status' => '状态'
        ];
    }
}
