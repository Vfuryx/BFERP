<?php

namespace App\Http\Requests\Api;


class DistributionMethodRequest extends FormRequest
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
            'name.required' => '配送方式名称必填',
            'name.string' => '配送方式名称必须string类型',
            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '配送方式名称',
            'status' => '配送方式状态'
        ];
    }


}
