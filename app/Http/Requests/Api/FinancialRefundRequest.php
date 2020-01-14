<?php

namespace App\Http\Requests\Api;

class FinancialRefundRequest extends FormRequest
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
                    'payment' => 'numeric',
                    'f_remark' => 'string|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'payment.numeric' => '支付金额必须是数字',

            'f_remark.string' => '财务备注必须string类型',
            'f_remark.max' => '财务备注最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'payment' => '支付金额',
            'f_remark' => '财务备注',
        ];
    }
}
