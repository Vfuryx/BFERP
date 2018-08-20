<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class PaymentDetailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'payment_details.*.payment' => 'numeric',
                    'payment_details.*.taobao_tid' => 'string|max:255',
                    'payment_details.*.taobao_oid' => 'string|max:255',
                    'payment_details.*.pay_time' => 'date',
                    'payment_details.*.remark' => 'string|nullable|max:255',
                ];
                break;
            case 'PATCH':
                return [
                    'payment_details.*.id' => [
                        'integer',
                        Rule::exists('payment_details', 'id')
                    ],
                    'payment_details.*.payment' => 'numeric',
                    'payment_details.*.taobao_tid' => 'string|max:255',
                    'payment_details.*.taobao_oid' => 'string|max:255',
                    'payment_details.*.pay_time' => 'date',
                    'payment_details.*.remark' => 'string|nullable|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'payment_details.*.payment.integer' => '支付明细id必须int类型',
            'payment_details.*.payment.exists' => '需要添加的id在数据库中未找到或未启用',

            'payment_details.*.payment.numeric' => '支付金额必须是数字',

            'payment_details.*.taobao_tid.string' => '交易号必须string类型',
            'payment_details.*.taobao_tid.max' => '交易号最大长度为255',

            'payment_details.*.taobao_oid.string' => '子订单编号必须string类型',
            'payment_details.*.taobao_oid.max' => '子订单编号最大长度为255',

            'payment_details.*.pay_time.date' => '支付日期必须date类型',

            'payment_details.*.remark.string' => '备注必须string类型',
            'payment_details.*.remark.nullable' => '备注可为null',
            'payment_details.*.remark.max' => '备注最大长度为255',

        ];
    }

    public function attributes()
    {
        return [
            'payment' => '支付金额',
            'taobao_tid' => '交易号（获取淘宝的交易编号）',
            'taobao_oid' => '子订单编号（获取淘宝的订单号）',
            'pay_time' => '付款时间',
            'remark' => '备注',
        ];
    }

}
