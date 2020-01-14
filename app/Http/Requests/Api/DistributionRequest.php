<?php

namespace App\Http\Requests\Api;

class DistributionRequest extends FormRequest
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
                    'name' => 'required|string|max:255',
                    'phone' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|max:255',
                    'phone' => 'string|max:255',
                    'address' => 'string|max:255',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '配送公司名称必填',
            'name.max' => '配送公司名称最大长度为255',
            'name.string' => '物流名称必须string类型',

            'phone.required' => '配送公司电话必填',
            'phone.string' => '配送公司电话必须string类型',
            'phone.max' => '配送公司电话最大长度为255',

            'address.required' => '配送公司地址必填',
            'address.string' => '配送公司地址必须string类型',
            'address.max' => '配送公司地址最大长度为255',

            'remark.string' => '费用类别备注必须string类型',
            'remark.nullable' => '费用类别备注可为null',
            'remark.max' => '费用类别备注最大长度为255',

            'status.required' => '状态必填',
            'status.boolean' => '状态必须布尔类型',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '配送公司名称',
            'phone' => '配送公司电话',
            'address' => '配送公司地址',
            'remark' => '备注',
            'status' => '状态：0=停用，1=启用'
        ];
    }
}
