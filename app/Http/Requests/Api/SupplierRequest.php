<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
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
                    'company' => 'required|string|max:255',
                    'code' => 'required|string|max:255|unique:suppliers',
                    'province' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'district' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'zipcode' => 'required|string|max:255',
                    'contacts' => 'required|string|max:255',
                    'phone' => 'required|string|max:255',
                    'mobile' => 'required|string|max:255',
                    'fax' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'remark' => 'string|nullable|max:255',
                    'is_scan' => 'integer',
                    'auto_valuation' => 'integer',
                    'status' => 'integer',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|max:255',
                    'company' => 'string|max:255',
                    'code' => [
                        'string','max:255',
                        Rule::unique('suppliers')->ignore($this->supplier->id),
                    ],
                    'province' => 'string|max:255',
                    'city' => 'string|max:255',
                    'district' => 'string|max:255',
                    'address' => 'string|max:255',
                    'zipcode' => 'string|max:255',
                    'contacts' => 'string|max:255',
                    'phone' => 'string|max:255',
                    'mobile' => 'string|max:255',
                    'fax' => 'string|max:255',
                    'email' => 'email|max:255',
                    'remark' => 'string|nullable|max:255',
                    'is_scan' => 'integer',
                    'auto_valuation' => 'integer',
                    'status' => 'integer',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '供应商名称必填',
            'name.max' => '供应商名称最大长度为255',
            'name.string' => '供应商名称必须string类型',
            
            'company.required' => '供应商公司称必填',
            'company.max' => '供应商公司最大长度为255',
            'company.string' => '供应商公司必须string类型',

            'code.required' => '公司代码必填',
            'code.string' => '公司代码必须string类型',
            'code.max' => '公司代码最大长度为255',
            'code.unique' => '公司代码不能重复',

            'province.required' => '省必填',
            'province.max' => '省最大长度为255',
            'province.string' => '省必须string类型',

            'city.required' => '市必填',
            'city.max' => '市最大长度为255',
            'city.string' => '市必须string类型',

            'district.required' => '区必填',
            'district.max' => '区最大长度为255',
            'district.string' => '区必须string类型',

            'address.required' => '地址必填',
            'address.max' => '地址最大长度为255',
            'address.string' => '地址必须string类型',

            'zipcode.required' => '邮编必填',
            'zipcode.max' => '邮编最大长度为255',
            'zipcode.string' => '邮编必须string类型',

            'contacts.required' => '联系人必填',
            'contacts.max' => '联系人最大长度为255',
            'contacts.string' => '联系人必须string类型',

            'phone.required' => '电话必填',
            'phone.max' => '电话最大长度为255',
            'phone.string' => '电话必须string类型',

            'mobile.required' => '手机必填',
            'mobile.max' => '手机最大长度为255',
            'mobile.string' => '手机必须string类型',

            'fax.required' => '传真必填',
            'fax.max' => '传真最大长度为255',
            'fax.string' => '传真必须string类型',

            'email.required' => '邮箱必填',
            'email.max' => '邮箱最大长度为255',
            'email.email' => '不是符合邮箱格式',

            'remark.string' => '供应商备注必须string类型',
            'remark.nullable' => '供应商备注可为null',
            'remark.max' => '供应商备注最大长度为255',

            'is_scan.integer' => '是否启用扫描必须int类型',

            'auto_valuation.integer' => '是否采购自动计价必须int类型',

            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '供应商名称',
            'company' => '供应商公司',
            'code' => '公司代码',
            'province' => '省',
            'city' => '市',
            'district' => '区',
            'address' => '地址',
            'zipcode' => '邮编',
            'contacts' => '联系人',
            'phone' => '电话',
            'mobile' => '手机',
            'fax' => '传真',
            'email' => '邮箱',
            'remark' => '备注',
            'is_scan' => '是否启用扫描',
            'auto_valuation' => '是否采购自动计价',
            'status' => '状态：0=停用，1=启用',
        ];
    }

}
