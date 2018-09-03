<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class AfterSaleRefundRequest extends FormRequest
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
            case 'PATCH':
                return [
                    'person_liable' => 'string|max:255',
                    'liable_fee' => 'numeric',
                    'freight' => 'numeric',
                    'undertaker' => 'string|max:255',
                    'as_remark' => 'string|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'person_liable.string' => '责任人必须string类型',
            'person_liable.max' => '责任人最大长度为255',

            'liable_fee.numeric' => '责任金额必须是数字',

            'freight.numeric' => '运费必须是数字',

            'undertaker.string' => '承担人必须string类型',
            'undertaker.max' => '承担人最大长度为255',

            'as_remark.string' => '售后备注必须string类型',
            'as_remark.max' => '售后备注最大长度为255',

            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',
        ];
    }

    public function attributes()
    {
        return [
            'person_liable' => '责任人',
            'liable_fee' => '责任金额',
            'freight' => '运费',
            'undertaker' => '承担人',
            'as_remark' => '售后备注',
            'status' => '状态',
        ];
    }
}
