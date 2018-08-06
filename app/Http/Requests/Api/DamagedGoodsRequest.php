<?php

namespace App\Http\Requests\Api;

class DamagedGoodsRequest extends FormRequest
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
                    'order_no' => 'required|string|max:255',
                    'good_sn' => 'required|string|max:255',
                    'standard_code' => 'required|string|max:255',
                    'quantity' => 'required|integer',
                    'money' => 'required|numeric',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'order_no' => 'string|max:255',
                    'good_sn' => 'string|max:255',
                    'standard_code' => 'string|max:255',
                    'quantity' => 'integer',
                    'money' => 'numeric',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'order_no.string' => '订单号必须string类型',
            'order_no.required' => '订单号必填',
            'order_no.max' => '订单号最大长度为255',

            'good_sn.string' => '商品编码必须string类型',
            'good_sn.max' => '商品编码最大长度为255',
            'good_sn.required' => '商品编码必填',

            'standard_code.string' => '规格编码必须string类型',
            'standard_code.max' => '规格编码最大长度为255',
            'standard_code.required' => '规格编码必填',

            'quantity.integer' => '损坏数量必须int类型',
            'quantity.required' => '损坏数量必填',

            'money.numeric' => '损坏金额必须数字',
            'money.required' => '损坏金额必填',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填'
        ];
    }

    public function attributes()
    {
        return [
            'order_no' => '订单号',
            'good_sn' => '商品编码',
            'standard_code' => '规格编码',
            'quantity' => '损坏数量',
            'money' => '损坏金额',
            'remark' => '备注',
            'status' => '状态',
        ];
    }

}
