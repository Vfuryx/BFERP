<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class MerchandiserDepartmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PATCH':
                return [
                    'logistics_id' => [
                        'integer',
                        Rule::exists('logistics', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'freight_types_id' =>  [
                        'integer',
                        Rule::exists('freight_types', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'expected_freight' => 'numeric',
                    'distributions_id' => [
                        'integer',
                        Rule::exists('distributions', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'distribution_methods_id' => [
                        'integer',
                        Rule::exists('distribution_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'deliver_goods_fee' => 'numeric',
                    'move_upstairs_fee' => 'numeric',
                    'installation_fee' => 'numeric',
                    'total_distribution_fee' => [
                        'numeric',
                        function($attribute, $value, $fail) {
                            //设置位数
                            bcscale(2);
                            //判断是否相等
                            if (
                                bccomp(
                                    bcadd(bcadd($this->deliver_goods_fee, $this->move_upstairs_fee), $this->installation_fee),
                                    $value
                                ) == 0
                            ){
                                return true;
                            }
                            return $fail('配送总计不正确');
                        },
                    ],
                    'distribution_phone' => 'string|max:255',
                    'distribution_no' => 'string|max:255',
                    'distribution_types_id' => [
                        'integer',
                        Rule::exists('distribution_types', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],

                    'express_fee' => 'numeric',
                    'warehouses_id' => [
                        'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
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

            'distributions_id.required' => '配送id必填',
            'distributions_id.integer' => '配送id必须int类型',
            'distributions_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'distribution_methods_id.required' => '配送方式id必填',
            'distribution_methods_id.integer' => '配送方式id必须int类型',
            'distribution_methods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'deliver_goods_fee.numeric' => '送货费用必须是数字',

            'move_upstairs_fee.numeric' => '搬楼费用必须是数字',

            'installation_fee.numeric' => '安装费必须是数字',

            'total_distribution_fee.numeric' => '配送总计必须是数字',

            'distribution_phone.string' => '配送电话必须string类型',
            'distribution_phone.max' => '配送电话最大长度为255',

            'distribution_no.string' => '配送单号必须string类型',
            'distribution_no.max' => '配送单号最大长度为255',

            'distribution_types_id.required' => '配送类型id必填',
            'distribution_types_id.integer' => '配送类型id必须int类型',
            'distribution_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'service_car_info.string' => '服务车信息（配送信息）必须string类型',
            'service_car_info.max' => '服务车信息（配送信息）最大长度为255',

            'take_delivery_goods_fee.numeric' => '提货费用必须是数字',

            'take_delivery_goods_ways_id.required' => '提货方式id必填',
            'take_delivery_goods_ways_id.integer' => '提货方式id必须int类型',
            'take_delivery_goods_ways_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'express_fee.numeric' => '快递费用必须是数字',

            'service_car_fee.numeric' => '服务车金额（家装服务）必须是数字',

            'cancel_after_verification_code.string' => '核销码必须string类型',
            'cancel_after_verification_code.max' => '核销码最大长度为255',

            'wooden_frame_costs.numeric' => '木架费必须是数字',

            'preferential_cashback.numeric' => '优惠返现必须是数字',

            'favorable_cashback.numeric' => '好评返现必须是数字',

            'customer_types_id.required' => '客户类型idid必填',
            'customer_types_id.integer' => '客户类型idid必须int类型',
            'customer_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'is_invoice.boolean' => '是否要发票必须是布尔类型',

            'invoice_express_fee.numeric' => '发票快递费必须是数字',

            'express_invoice_title.numeric' => '发票快递费必须是数字',

            'express_invoice_title.string' => '快递发票抬头必须string类型',
            'express_invoice_title.max' => '快递发票抬头最大长度为255',

            'contract_no.string' => '合同单号必须string类型',
            'contract_no.max' => '合同单号最大长度为255',

            'payment_methods_id.required' => '付款方式id必填',
            'payment_methods_id.integer' => '付款方式id必须int类型',
            'payment_methods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'deposit.numeric' => '订金必须是数字',

            'document_title.string' => '单据头必须string类型',
            'document_title.max' => '单据头最大长度为255',

            'warehouses_id.required' => '发货仓库id必填',
            'warehouses_id.integer' => '发货仓库id必须int类型',
            'warehouses_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'payment_date.date' => '支付日期必须date类型',

            'interest_concessions.numeric' => '让利必须是数字',

            'is_notice.boolean' => '等通知发货必须是布尔类型',

            'is_cancel_after_verification.boolean' => '是否核销必须是布尔类型',

            'accept_order_user.string' => '接单用户必须string类型',
            'accept_order_user.max' => '接单用户最大长度为255',

            'tax_number.string' => '税号必须string类型',
            'tax_number.max' => '税号最大长度为255',

            'receipt.string' => '收据必须string类型',
            'receipt.max' => '收据最大长度为255',

            'logistics_remark.string' => '物流备注必须string类型',
            'logistics_remark.max' => '物流备注最大长度为255',

            'seller_remark.string' => '卖家备注必须string类型',
            'seller_remark.max' => '卖家备注最大长度为255',

            'customer_service_remark.string' => '客服备注必须string类型',
            'customer_service_remark.max' => '客服备注最大长度为255',

            'buyer_message.string' => '买家留言必须string类型',
            'buyer_message.max' => '买家留言最大长度为255',

            'receiver_name.required' => '收货人必填',
            'receiver_name.string' => '收货人必须string类型',
            'receiver_name.max' => '收货人最大长度为255',

            'receiver_phone.required' => '收货人固定电话必填',
            'receiver_phone.string' => '收货人固定电话必须string类型',
            'receiver_phone.max' => '收货人固定电话最大长度为255',

            'receiver_mobile.required' => '收货人手机必填',
            'receiver_mobile.string' => '收货人手机必须string类型',
            'receiver_mobile.max' => '收货人手机最大长度为255',

            'receiver_state.required' => '收货人的所在省份必填',
            'receiver_state.string' => '收货人的所在省份必须string类型',
            'receiver_state.max' => '收货人的所在省份最大长度为255',

            'receiver_city.required' => '收货人的所在城市必填',
            'receiver_city.string' => '收货人的所在城市必须string类型',
            'receiver_city.max' => '收货人的所在城市最大长度为255',

            'receiver_district.required' => '收货人的所在地区必填',
            'receiver_district.string' => '收货人的所在地区必须string类型',
            'receiver_district.max' => '收货人的所在地区最大长度为255',

            'receiver_address.required' => '收货人的详细地址必填',
            'receiver_address.string' => '收货人的详细地址必须string类型',
            'receiver_address.max' => '收货人的详细地址最大长度为255',

            'receiver_zip.required' => '收货邮编必填',
            'receiver_zip.string' => '收货邮编必须string类型',
            'receiver_zip.max' => '收货邮编最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'shops_id' => '店铺id',
            'member_nick' => '会员昵称',
            'logistics_id' => '物流id',
            'billing_way' => '计费方式',
            'promise_ship_time' => '承诺发货时间',
            'freight_types_id' => '运费类型id',
            'expected_freight' => '预计运费',
            'distributions_id' => '配送id',
            'distribution_methods_id' => '配送方式id',
            'deliver_goods_fee' => '送货费用',
            'move_upstairs_fee' => '搬楼费用',
            'installation_fee' => '安装费',
            'total_distribution_fee' => '配送总计(送货费用 + 搬楼费用 + 安装费)',
            'distribution_phone' => '配送电话',
            'distribution_no' => '配送单号',
            'distribution_types_id' => '配送类型id',
            'service_car_info' => '服务车信息（配送信息）',
            'take_delivery_goods_fee' => '提货费用',
            'take_delivery_goods_ways_id' => '提货方式id',
            'express_fee' => '快递费用',
            'service_car_fee' => '服务车金额（家装服务）',
            'cancel_after_verification_code' => '核销码',
            'wooden_frame_costs' => '木架费',
            'preferential_cashback' => '优惠返现',
            'favorable_cashback' => '好评返现',
            'customer_types_id' => '客户类型id',
            'is_invoice' => '是否要发票',
            'invoice_express_fee' => '发票快递费',
            'express_invoice_title' => '快递发票抬头',
            'contract_no' => '合同单号',
            'payment_methods_id' => '付款方式id',
            'deposit' => '订金',
            'document_title' => '单据头',
            'warehouses_id' => '发货仓库id',
            'payment_date' => '支付日期',
            'interest_concessions' => '让利',
            'is_notice' => '等通知发货 0 否 1 是',
            'is_cancel_after_verification' => '是否核销 0 否 1 是',
            'accept_order_user' => '接单用户',
            'tax_number' => '税号',
            'receipt' => '收据',
        ];
    }

}
