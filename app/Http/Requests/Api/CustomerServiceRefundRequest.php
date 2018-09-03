<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class CustomerServiceRefundRequest extends FormRequest
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
                    'order_sn' => 'string|max:255',
                    'payment_methods_id' => [
                        'required', 'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'time_out_at' => 'date',
                    'shops_id' => [
                        'required', 'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'account' => 'string|max:255',
                    'refund_payment_methods_id' => [
                        'required', 'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'bank' => 'string|max:255',
                    'address' => 'string|max:255',
                    'refund_amount' => 'numeric',
                    'transaction_sn' => 'string|max:255',
                    'return_reasons_id' => [
                        'required', 'integer',
                        Rule::exists('return_reasons', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'seller_nick' => 'string|max:255',
                    'seller_name' => 'string|max:255',
                    'payment' => 'numeric',
                    'person_liable' => 'string|max:255',
                    'business_remark' => 'string|max:255',
                    'refund_description' => 'string|max:255',
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'order_sn' => 'string|max:255',
                    'payment_methods_id' => [
                        'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'time_out_at' => 'date',
                    'shops_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'account' => 'string|max:255',
                    'refund_payment_methods_id' => [
                        'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'bank' => 'string|max:255',
                    'address' => 'string|max:255',
                    'refund_amount' => 'numeric',
                    'transaction_sn' => 'string|max:255',
                    'return_reasons_id' => [
                        'integer',
                        Rule::exists('return_reasons', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'seller_nick' => 'string|max:255',
                    'seller_name' => 'string|max:255',
                    'payment' => 'numeric',
                    'person_liable' => 'string|max:255',
                    'business_remark' => 'string|max:255',
                    'refund_description' => 'string|max:255',
                    'status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'order_sn.string' => '系统单号必须string类型',
            'order_sn.max' => '系统单号最大长度为255',

            'payment_methods_id.required' => '支付方式id必填',
            'payment_methods_id.integer' => '支付方式id必须int类型',
            'payment_methods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'time_out_at.date' => '超时时间必须date类型',

            'shops_id.required' => '店铺id必填',
            'shops_id.integer' => '店铺id必须int类型',
            'shops_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'account.string' => '还款账号必须string类型',
            'account.max' => '还款账号最大长度为255',

            'refund_payment_methods_id.required' => '还款支付方式id必填',
            'refund_payment_methods_id.string' => '还款支付方式id必须string类型',
            'refund_payment_methods_id.max' => '还款支付方式id最大长度为255',

            'bank.string' => '开户银行必须string类型',
            'bank.max' => '开户银行最大长度为255',

            'address.string' => '开户地址必须string类型',
            'address.max' => '开户地址最大长度为255',

            'refund_amount.numeric' => '退款金额必须是数字',

            'transaction_sn.string' => '交易单号必须string类型',
            'transaction_sn.max' => '交易单号最大长度为255',

            'return_reasons_id.required' => '退款原因id必填',
            'return_reasons_id.string' => '退款原因id必须string类型',
            'return_reasons_id.max' => '退款原因id最大长度为255',

            'seller_nick.string' => '卖家昵称必须string类型',
            'seller_nick.max' => '卖家昵称最大长度为255',

            'seller_name.string' => '卖家名称必须string类型',
            'seller_name.max' => '卖家名称最大长度为255',

            'payment.numeric' => '支付金额必须是数字',

            'person_liable.string' => '责任人必须string类型',
            'person_liable.max' => '责任人最大长度为255',

            'business_remark.string' => '责任人必须string类型',
            'business_remark.max' => '责任人最大长度为255',

            'refund_description.string' => '退款说明必须string类型',
            'refund_description.max' => '退款说明最大长度为255',

            'refund_description.required' => '状态必须string类型',
            'refund_description.boolean' => '状态必须string类型',

            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',
        ];
    }

    public function attributes()
    {
        return [
            'order_sn' => '系统单号',
            'payment_methods_id' => '支付方式id',
            'time_out_at' => '超时时间',
            'shops_id' => '店铺id',
            'account' => '还款账号',
            'refund_payment_methods_id' => '还款支付方式id(支付方式id)',
            'bank' => '开户银行',
            'address' => '开户地址',
            'refund_amount' => '退款金额',
            'transaction_sn' => '交易单号',
            'return_reasons_id' => '退款原因id',
            'seller_nick' => '卖家昵称',
            'seller_name' => '卖家名称',
            'payment' => '支付金额',
            'person_liable' => '责任人',
            'business_remark' => '业务备注',
            'refund_description' => '退款说明',
            'status' => '状态',
        ];
    }
}
