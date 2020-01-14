<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class CustomerServiceReturnRequest extends FormRequest
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
                    'orders_id' => [
                        'required', 'integer',
                        Rule::exists('orders', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'shops_id' => [
                        'required', 'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'member_nick' => 'required|string|max:255',
                    'customer_name' => 'required|string|max:255',
                    'customer_phone' => 'required|string|max:255',
                    'deposit' => 'required|numeric',
                    'return_reasons_id' => [
                        'required', 'integer',
                        Rule::exists('return_reasons', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'customer_address' => 'required|string|max:255',
                    'is_scour' => 'boolean',
                    'payee' => 'string|max:255',
                    'refund_account' => 'string|max:255',
                    'refund_payment_methods_id' => [
                        'required', 'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'refund_amount' => 'numeric',
                    'follow_up' => 'string|max:255',
                    'distributions_id' => [
                        'required', 'integer',
                        Rule::exists('distributions', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'pulling_cost' => 'numeric',
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'orders_id' => [
                        'integer',
                        Rule::exists('orders', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'shops_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'member_nick' => 'string|max:255',
                    'customer_name' => 'string|max:255',
                    'customer_phone' => 'string|max:255',
                    'deposit' => 'numeric',
                    'return_reasons_id' => [
                        'integer',
                        Rule::exists('return_reasons', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'customer_address' => 'string|max:255',
                    'is_scour' => 'boolean',
                    'payee' => 'string|max:255',
                    'refund_account' => 'string|max:255',
                    'refund_payment_methods_id' => [
                        'integer',
                        Rule::exists('payment_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'refund_amount' => 'numeric',
                    'follow_up' => 'string|max:255',
                    'distributions_id' => [
                        'integer',
                        Rule::exists('distributions', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'pulling_cost' => 'numeric',
                    'status' => 'boolean',
                ];
                break;
            case 'PUT':
                if($this->route()->getActionMethod() == 'isTwoAudit'){
                    return [
                        'expected_arrival_time' => 'required|date',
                        'logistics_id' => [
                            'required', 'integer',
                            Rule::exists('logistics', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'freight_types_id' => [
                            'required', 'integer',
                            Rule::exists('freight_types', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'freight' => 'required|numeric',
                        'logistics_sn' => 'required|string|max:255',
                        'take_delivery_goods_address' => 'required|string|max:255',
                        'logistics_remark' => 'string|max:255',
                        'follow_up' => 'string|max:255',
                    ];
                }
                break;
        }
    }

    public function messages()
    {
        return [
            'orders_id.required' => '订单id必填',
            'orders_id.integer' => '订单id必须int类型',
            'orders_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'shops_id.required' => '店铺id必填',
            'shops_id.integer' => '店铺id必须int类型',
            'shops_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'member_nick.required' => '会员昵称必须string类型',
            'member_nick.string' => '会员昵称须string类型',
            'member_nick.max' => '会员昵称最大长度为255',

            'customer_name.required' => '客户姓名必须string类型',
            'customer_name.string' => '客户姓名须string类型',
            'customer_name.max' => '客户姓名最大长度为255',

            'customer_phone.required' => '客户电话必须string类型',
            'customer_phone.string' => '客户电话须string类型',
            'customer_phone.max' => '客户电话最大长度为255',

            'deposit.required' => '押金必须string类型',
            'deposit.numeric' => '押金必须是数字',

            'return_reasons_id.required' => '退货原因id必填',
            'return_reasons_id.integer' => '退货原因id必须int类型',
            'return_reasons_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'customer_address.required' => '客户地址必须string类型',
            'customer_address.string' => '客户地址须string类型',
            'customer_address.max' => '客户地址最大长度为255',

            'is_scour.boolean' => '是否冲款必须布尔类型',

            'payee.string' => '收款人须string类型',
            'payee.max' => '收款人最大长度为255',

            'refund_account.string' => '退款账号须string类型',
            'refund_account.max' => '退款账号最大长度为255',

            'refund_payment_methods_id.required' => '退款支付方式id必填',
            'refund_payment_methods_id.integer' => '退款支付方式id必须int类型',
            'refund_payment_methods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'refund_amount.numeric' => '退款金额必须是数字',

            'follow_up.string' => '退款金额须string类型',
            'follow_up.max' => '退款金额最大长度为255',

            'distributions_id.required' => '配送公司id必填',
            'distributions_id.integer' => '配送公司id必须int类型',
            'distributions_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'pulling_cost.numeric' => '拉货费用必须是数字',

            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',

            'expected_arrival_time.required' => '预计到货时间必填',
            'expected_arrival_time.date' => '预计到货时间必须是时间类型',

            'logistics_id.required' => '物流id必填',
            'logistics_id.integer' => '物流id必须int类型',
            'logistics_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'freight_types_id.required' => '运费类型id必填',
            'freight_types_id.integer' => '运费类型id必须int类型',
            'freight_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'freight.required' => '运费必须是数字',
            'freight.numeric' => '运费必须是数字',

            'logistics_sn.required' => '物流单号必填',
            'logistics_sn.string' => '物流单号额须string类型',
            'logistics_sn.max' => '物流单号最大长度为255',

            'take_delivery_goods_address.required' => '提货地址必填',
            'take_delivery_goods_address.string' => '提货地址须string类型',
            'take_delivery_goods_address.max' => '提货地址最大长度为255',

            'logistics_remark.string' => '物流备注须string类型',
            'logistics_remark.max' => '物流备注最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'orders_id' => '订单id',
            'shops_id' => '店铺id',
            'member_nick' => '会员昵称',
            'customer_name' => '客户姓名',
            'customer_phone' => '客户电话',
            'deposit' => '押金',
            'return_reasons_id' => '退货原因id',
            'customer_address' => '客户地址',
            'is_scour' => '是否冲款',
            'payee' => '收款人',
            'refund_account' => '退款账号',
            'refund_payment_methods_id' => '退款支付方式id',
            'refund_amount' => '退款金额',
            'follow_up' => '跟进记录',
            'distributions_id' => '配送公司id',
            'pulling_cost' => '拉货费用',
            'status' => '状态',

            'expected_arrival_time' => '预计到货时间',
            'logistics_id' => '物流id',
            'freight_types_id' => '运费类型id',
            'freight' => '运费',
            'logistics_sn' => '物流单号',
            'take_delivery_goods_address' => '提货地址',
            'logistics_remark' => '物流备注',
        ];
    }
}
