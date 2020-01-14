<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class WarehousingReturnRequest extends FormRequest
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
                    'order_status' => 'integer',
                ];
                break;
            case 'PUT':
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
                break;
        }
    }

    public function messages()
    {
        return [
            'expected_arrival_time.required' => '预计到货时间必填',
            'expected_arrival_time.date' => '预计到货时间必须是时间类型',

            'logistics_id.required' => '物流id必填',
            'logistics_id.integer' => '物流id必须int类型',
            'logistics_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'freight_types_id.required' => '运费类型id必填',
            'freight_types_id.integer' => '运费类型id必须int类型',
            'freight_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'logistics_sn.required' => '物流单号必填',
            'logistics_sn.string' => '物流单号额须string类型',
            'logistics_sn.max' => '物流单号最大长度为255',

            'take_delivery_goods_address.required' => '提货地址必填',
            'take_delivery_goods_address.string' => '提货地址须string类型',
            'take_delivery_goods_address.max' => '提货地址最大长度为255',

            'logistics_remark.string' => '物流备注须string类型',
            'logistics_remark.max' => '物流备注最大长度为255',

            'follow_up.string' => '退款金额须string类型',
            'follow_up.max' => '退款金额最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'expected_arrival_time' => '预计到货时间',
            'logistics_id' => '物流id',
            'freight_types_id' => '运费类型id',
            'freight' => '运费',
            'logistics_sn' => '物流单号',
            'take_delivery_goods_address' => '提货地址',
            'logistics_remark' => '物流备注',
            'follow_up' => '跟进记录',
        ];
    }
}
