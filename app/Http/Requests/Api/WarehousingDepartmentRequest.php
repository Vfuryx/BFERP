<?php

namespace App\Http\Requests\Api;

use App\Models\Order;
use Illuminate\Validation\Rule;

class WarehousingDepartmentRequest extends FormRequest
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
                    'order_status' => [
                        'nullable', 'in:'.Order::ORDER_STATUS_CARGO_AUDIT.','.Order::ORDER_STATUS_STOCK_OUT
                    ],
                    'status' => [
                        'nullable', 'boolean'
                    ]
                ];
                break;
            case 'PATCH':
                return [
                    'logistics_id' => [
                        'integer',
                        Rule::exists('logistics', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'logistics_sn' => 'string|max:255',
                    'actual_freight' => 'numeric',
                    'distributions_id' => [
                        'integer',
                        Rule::exists('distributions', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'distribution_phone' => ['string', 'max:255'],
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
                    'receiver_name' => ['string', 'max:255'],
                    'receiver_mobile' => ['string', 'max:255'],
                ];
                break;

        }
    }

    public function messages()
    {
        return [
            'order_status.in' => '订单状态不是给定的数值',
            'order_status.boolean' => '状态必须为布尔类型',

            'status.boolean' => '状态必须是布尔类型',

            'logistics_id.required' => '物流id必填',
            'logistics_id.integer' => '物流id必须int类型',
            'logistics_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'logistics_sn.string' => '物流单号必须string类型',
            'logistics_sn.max' => '物流单号最大长度为255',

            'actual_freight.numeric' => '实际运费必须是数字',

            'distributions_id.required' => '配送id必填',
            'distributions_id.integer' => '配送id必须int类型',
            'distributions_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'distribution_phone.string' => '配送电话必须string类型',
            'distribution_phone.max' => '配送电话最大长度为255',

            'deliver_goods_fee.numeric' => '送货费用必须是数字',

            'move_upstairs_fee.numeric' => '搬楼费用必须是数字',

            'installation_fee.numeric' => '安装费必须是数字',

            'total_distribution_fee.numeric' => '配送总计必须是数字',

            'receiver_name.string' => '收货人必须string类型',
            'receiver_name.max' => '收货人最大长度为255',

            'receiver_mobile.string' => '收货人手机必须string类型',
            'receiver_mobile.max' => '收货人手机最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'logistics_id' => '物流id',
            'logistics_sn' => '物流单号',
            'actual_freight' => '实际运费',
            'distributions_id' => '配送id',
            'distribution_phone' => '配送电话',

            'deliver_goods_fee' => '送货费用',
            'move_upstairs_fee' => '搬楼费用',
            'installation_fee' => '安装费',
            'total_distribution_fee' => '配送总计(送货费用 + 搬楼费用 + 安装费)',

            'receiver_name' => '收货人',
            'receiver_mobile' => '收货人手机',

            'order_status' => '订单状态',
            'status' => '状态',
        ];
    }

}
