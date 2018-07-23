<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class CityInfoRequest extends FormRequest
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
                    'status' => 'integer'
                ];
                break;
            case 'POST':
                return [
                    'logistics_id' => [
                        'required', 'integer',
                        Rule::exists('logistics', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'province' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'district' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'phone' => 'required|string|max:255',
                    'price' => 'required|numeric',
                    'weight_univalent' => 'required|numeric',
                    'expected_days' => 'required|integer',
                    'route' => 'integer',
                    'is_free_shipping' => 'integer',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer',
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
                    'province' => 'string|max:255',
                    'city' => 'string|max:255',
                    'district' => 'string|max:255',
                    'address' => 'string|max:255',
                    'phone' => 'string|max:255',
                    'price' => 'numeric',
                    'weight_univalent' => 'numeric',
                    'expected_days' => 'integer',
                    'route' => 'integer',
                    'is_free_shipping' => 'integer',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'logistics_id.required' => '物流id必填',
            'logistics_id.integer' => '物流id必须int类型',
            'logistics_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'province.required' => '省必填',
            'province.string' => '省必须string类型',
            'province.max' => '省最大长度为255',

            'city.required' => '市必填',
            'city.string' => '市必须string类型',
            'city.max' => '市最大长度为255',
            'district.required' => '区必填',
            'district.string' => '区必须string类型',
            'district.max' => '区最大长度为255',
            'address.required' => '提货地址必填',
            'address.string' => '提货地址必须string类型',
            'address.max' => '提货地址最大长度为255',
            'phone.required' => '提货电话必填',
            'phone.string' => '提货电话必须string类型',
            'phone.max' => '提货电话最大长度为255',

            'price.required' => '物流费用必填',
            'price.numeric' => '物流费用必须是数字',

            'weight_univalent.required' => '重量单价必填',
            'weight_univalent.numeric' => '重量单价必须是数字',
            'expected_days.required' => '城市到达天数必填',
            'expected_days.integer' => '城市到达天数必须int类型',
            'route.integer' => '中转或直达必须int类型',
            'is_free_shipping.integer' => '是否包邮必须int类型',
            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'status.integer' => '状态必须int类型',
            'status.required' => '状态必填'
        ];
    }

    public function attributes()
    {
        return [
            'logistics_id' => '物流id',
            'province' => '省',
            'city' => '市',
            'district' => '区',
            'address' => '提货地址',
            'phone' => '提货电话',
            'price' => '物流费用',
            'weight_univalent' => '重量单价',
            'expected_days' => '城市到达天数',
            'route' => '中转或直达：0=中转，1=直达',
            'is_free_shipping' => '是否包邮',
            'remark' => '备注',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
