<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class FDPaymentDetailRequest extends FormRequest
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
                    'orders_id' =>  [
                        'required', 'integer',
                        Rule::exists('orders', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'payment_methods_id' => [
                        'required', 'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'payment' => 'numeric',
                    'taobao_tid' => 'string|max:255',
                    'taobao_oid' => 'string|max:255',
                    'pay_time' => 'required|date',
                    'remark' => 'string|nullable|max:255',
                ];
                break;
            case 'PATCH':
                return [
                    'payment_methods_id' => [
                        'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'payment' => 'numeric',
                    'taobao_tid' => 'string|max:255',
                    'taobao_oid' => 'string|max:255',
                    'pay_time' => 'date',
                    'remark' => 'string|nullable|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'orders_id.required' => '订单id必填',
            'orders_id.integer' => '订单id必须为int类型',
            'orders_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'payment_methods_id.integer' => '支付方式id必须为int类型',
            'payment_methods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'payment.integer' => '支付明细id必须int类型',
            'payment.exists' => '需要添加的id在数据库中未找到或未启用',

            'payment.numeric' => '支付金额必须是数字',

            'taobao_tid.string' => '交易号必须string类型',
            'taobao_tid.max' => '交易号最大长度为255',

            'taobao_oid.string' => '子订单编号必须string类型',
            'taobao_oid.max' => '子订单编号最大长度为255',

            'pay_time.required' => '支付日期必填',
            'pay_time.date' => '支付日期必须date类型',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

        ];
    }

    public function attributes()
    {
        return [
            'payment_methods_id' => '支付方式id',
            'payment' => '支付金额',
            'taobao_tid' => '交易号（获取淘宝的交易编号）',
            'taobao_oid' => '子订单编号（获取淘宝的订单号）',
            'pay_time' => '付款时间',
            'remark' => '备注',
        ];
    }
}
