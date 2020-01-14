<?php

namespace App\Http\Requests\Api;

class AfterSaleReturnRequest extends FormRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
                return [
                    'person_liable_id' => 'required|string|max:255',
                    'liable_fee' => 'required|numeric',
                    'as_remark' => 'required|string|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'person_liable_id.required' => '责任人必填',
            'person_liable_id.string' => '责任人必须string类型',
            'person_liable_id.max' => '责任人最大长度为255',

            'liable_fee.required' => '责任金额必填',
            'liable_fee.numeric' => '责任金额必须是数字',

            'as_remark.required' => '售后备注必填',
            'as_remark.string' => '售后备注必须string类型',
            'as_remark.max' => '售后备注最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'person_liable_id' => '责任人',
            'liable_fee' => '责任金额',
            'as_remark' => '售后备注',
        ];
    }
}
