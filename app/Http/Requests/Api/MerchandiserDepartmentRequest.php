<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;
use App\Models\Order;

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
            case 'GET':
                if($this->route()->getActionMethod() == 'index'){
                    return [
                        'warehouses_id' => [
                            'nullable','integer',
                            Rule::exists('warehouses', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'order_status' => [
                            'nullable', 'in:'.Order::ORDER_STATUS_CS_AUDIT.','.Order::ORDER_STATUS_CARGO_AUDIT
                        ],
                        'status' => [
                            'nullable', 'boolean'
                        ]
                    ];
                }
                if($this->route()->getActionMethod() == 'getStockByWarehouses'){
                    return [
                        'warehouses_id' => [
                            'required','integer',
                            Rule::exists('warehouses', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                    ];
                }
                break;
            case 'PUT':
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
                    'distribution_types_id' => [
                        'integer',
                        Rule::exists('distribution_types', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],

                    'express_fee' => 'numeric',
                    'warehouses_id' => [
                        'required','integer',
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
            'order_status.in' => '订单状态不是给定的数值',

            'status.boolean' => '状态必须是布尔类型',

            'logistics_id.required' => '物流id必填',
            'logistics_id.integer' => '物流id必须int类型',
            'logistics_id.exists' => '需要添加的id在数据库中未找到或未启用',

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

            'distribution_types_id.required' => '配送类型id必填',
            'distribution_types_id.integer' => '配送类型id必须int类型',
            'distribution_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'express_fee.numeric' => '快递费用必须是数字',

            'warehouses_id.required' => '发货仓库id必填',
            'warehouses_id.integer' => '发货仓库id必须int类型',
            'warehouses_id.exists' => '需要添加的id在数据库中未找到或未启用',
        ];
    }

    public function attributes()
    {
        return [
            'logistics_id' => '物流id',
            'freight_types_id' => '运费类型id',
            'expected_freight' => '预计运费',
            'distributions_id' => '配送id',
            'distribution_methods_id' => '配送方式id',
            'deliver_goods_fee' => '送货费用',
            'move_upstairs_fee' => '搬楼费用',
            'installation_fee' => '安装费',
            'total_distribution_fee' => '配送总计(送货费用 + 搬楼费用 + 安装费)',
            'distribution_phone' => '配送电话',
            'distribution_types_id' => '配送类型id',
            'express_fee' => '快递费用',
            'warehouses_id' => '发货仓库id',
        ];
    }

}
