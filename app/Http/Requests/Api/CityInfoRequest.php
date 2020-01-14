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
                    'status' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'city_infos.*.province' => 'required|string|max:255',
                    'city_infos.*.city' => 'required|string|max:255',
                    'city_infos.*.district' => 'required|string|max:255',
                    'city_infos.*.address' => 'required|string|max:255',
                    'city_infos.*.phone' => 'required|string|max:255',
                    'city_infos.*.price' => 'required|numeric',
                    'city_infos.*.weight_univalent' => 'required|numeric',
                    'city_infos.*.expected_days' => 'required|integer',
                    'city_infos.*.route' => 'integer',
                    'city_infos.*.is_free_shipping' => 'boolean',
                    'city_infos.*.remark' => 'string|nullable|max:255',
                    'city_infos.*.status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'city_infos.*.id' => [
                        'integer',
                        Rule::exists('city_infos', 'id'),
                    ],
                    'city_infos.*.province' => 'string|max:255',
                    'city_infos.*.city' => 'string|max:255',
                    'city_infos.*.district' => 'string|max:255',
                    'city_infos.*.address' => 'string|max:255',
                    'city_infos.*.phone' => 'string|max:255',
                    'city_infos.*.price' => 'numeric',
                    'city_infos.*.weight_univalent' => 'numeric',
                    'city_infos.*.expected_days' => 'integer',
                    'city_infos.*.route' => 'integer',
                    'city_infos.*.is_free_shipping' => 'boolean',
                    'city_infos.*.remark' => 'string|nullable|max:255',
                    'city_infos.*.status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'city_infos.*.province.required' => '省必填',
            'city_infos.*.province.string' => '省必须string类型',
            'city_infos.*.province.max' => '省最大长度为255',

            'city_infos.*.city.required' => '市必填',
            'city_infos.*.city.string' => '市必须string类型',
            'city_infos.*.city.max' => '市最大长度为255',
            'city_infos.*.district.required' => '区必填',
            'city_infos.*.district.string' => '区必须string类型',
            'city_infos.*.district.max' => '区最大长度为255',
            'city_infos.*.address.required' => '提货地址必填',
            'city_infos.*.address.string' => '提货地址必须string类型',
            'city_infos.*.address.max' => '提货地址最大长度为255',
            'city_infos.*.phone.required' => '提货电话必填',
            'city_infos.*.phone.string' => '提货电话必须string类型',
            'city_infos.*.phone.max' => '提货电话最大长度为255',

            'city_infos.*.price.required' => '物流费用必填',
            'city_infos.*.price.numeric' => '物流费用必须是数字',

            'city_infos.*.weight_univalent.required' => '重量单价必填',
            'city_infos.*.weight_univalent.numeric' => '重量单价必须是数字',
            'city_infos.*.expected_days.required' => '城市到达天数必填',
            'city_infos.*.expected_days.integer' => '城市到达天数必须int类型',
            'city_infos.*.route.integer' => '中转或直达必须int类型',
            'city_infos.*.is_free_shipping.boolean' => '是否包邮必须布尔类型',
            'city_infos.*.remark.string' => '备注必须string类型',
            'city_infos.*.remark.nullable' => '备注可为null',
            'city_infos.*.remark.max' => '备注最大长度为255',

            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填'
        ];
    }

    public function attributes()
    {
        return [
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
        ];
    }

}
