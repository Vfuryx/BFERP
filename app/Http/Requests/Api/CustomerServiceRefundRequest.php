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
            'shops_id.required' => '店铺id必填',
            'shops_id.integer' => '店铺id必须int类型',
            'shops_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'member_nick.required' => '会员昵称必填',
            'member_nick.string' => '会员昵称必须string类型',
            'member_nick.max' => '会员昵称最大长度为255',

            'logistics_id.required' => '物流id必填',
            'logistics_id.integer' => '物流id必须int类型',
            'logistics_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'billing_way.required' => '计费方式必填',
            'billing_way.in' => '计费方式必须是包含在给定的值列表中',

            'promise_ship_time.date' => '承诺发货时间必须date类型',

            'freight_types_id.required' => '运费类型id必填',
            'freight_types_id.integer' => '运费类型id必须int类型',
            'freight_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'expected_freight.numeric' => '预计运费必须是数字',
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
            'business_remark' => '业务备注',
            'refund_description' => '退款说明',
            'status' => '状态',
        ];
    }
}
