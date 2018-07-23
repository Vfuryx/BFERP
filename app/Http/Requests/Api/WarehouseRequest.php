<?php

namespace App\Http\Requests\Api;

class WarehouseRequest extends FormRequest
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
                    'name' => 'required|string|max:255',
                    'province' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'district' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'is_default' => 'integer',
                    'status' => 'integer',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|max:255',
                    'province' => 'string|max:255',
                    'city' => 'string|max:255',
                    'district' => 'string|max:255',
                    'address' => 'string|max:255',
                    'is_default' => 'integer',
                    'status' => 'integer',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '仓库名称必填',
            'name.max' => '仓库名称最大长度为255',
            'name.string' => '仓库名称必须string类型',

            'province.required' => '仓库地（省）必填',
            'province.max' => '仓库地（省）最大长度为255',
            'province.string' => '仓库地（省）必须string类型',

            'city.required' => '仓库地（市）必填',
            'city.max' => '仓库地（市）最大长度为255',
            'city.string' => '仓库地（市）必须string类型',

            'district.required' => '仓库地（区）必填',
            'district.max' => '仓库地（区）最大长度为255',
            'district.string' => '仓库地（区）必须string类型',

            'address.required' => '仓库地（地址）必填',
            'address.max' => '仓库地（地址）最大长度为255',
            'address.string' => '仓库地（地址）必须string类型',

            'is_default.integer' => '是否默认必须int类型',

            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '仓库名称',
            'province' => '仓库地（省）',
            'city' => '仓库地（市）',
            'district' => '仓库地（区）',
            'address' => '仓库地（地址）',
            'is_default' => '是否默认',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
