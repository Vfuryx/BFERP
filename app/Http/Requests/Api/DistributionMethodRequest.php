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
                    'status' => 'integer'
                ];
                break;
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
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '配送方式名称必填',
            'name.string' => '配送方式名称必须string类型',
            'status.integer' => '状态必须int类型',
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
