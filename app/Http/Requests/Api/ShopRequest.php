<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class ShopRequest extends FormRequest
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
                    'nick' => 'required|string|max:255',
                    'title' => 'required|string|max:255',
                    'session_key' => 'required|string|max:255',
                    'warehouse_id' => [
                        'required', 'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'shop_account' => 'required|string|max:255',
                    'shop_passwd' => 'required|string|max:255',
                    'rebate' => 'required|numeric',
                    'principal' => 'required|string|max:255',
                    'principal_mobile' => 'required|string|max:255',
                    'province' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'district' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'gross_profit_rate' => 'required|numeric',
                    'platform_id' => [
                        'required', 'integer',
                        Rule::exists('platforms', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'is_waybill' => 'integer',
                    'status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
                    'nick' => 'string|max:255',
                    'title' => 'string|max:255',
                    'session_key' => 'string|max:255',
                    'warehouse_id' => [
                        'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'shop_account' => 'string|max:255',
                    'shop_passwd' => 'string|max:255',
                    'rebate' => 'numeric',
                    'principal' => 'string|max:255',
                    'principal_mobile' => 'string|max:255',
                    'province' => 'string|max:255',
                    'city' => 'string|max:255',
                    'district' => 'string|max:255',
                    'address' => 'string|max:255',
                    'gross_profit_rate' => 'numeric',
                    'platform_id' => [
                        'integer',
                        Rule::exists('platforms', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'is_waybill' => 'integer',
                    'status' => 'integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'nick.required' => '卖家昵称必填',
            'nick.max' => '卖家昵称最大长度为255',
            'nick.string' => '卖家昵称必须string类型',

            'title.required' => '店铺标题必填',
            'title.max' => '店铺标题最大长度为255',
            'title.string' => '店铺标题必须string类型',

            'session_key.required' => 'SessionKey必填',
            'session_key.max' => 'SessionKey最大长度为255',
            'session_key.string' => 'SessionKey必须string类型',

            'warehouse_id.required' => '默认仓库id必填',
            'warehouse_id.integer' => '默认仓库id必须int类型',
            'warehouse_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'shop_account.required' => '店铺账号必填',
            'shop_account.max' => '店铺账号最大长度为255',
            'shop_account.string' => '店铺账号必须string类型',

            'shop_passwd.required' => '店铺密码必填',
            'shop_passwd.max' => '店铺密码最大长度为255',
            'shop_passwd.string' => '店铺密码必须string类型',

            'rebate.required' => '返点（%）必填',
            'rebate.numeric' => '返点（%）必须是数字',

            'principal.required' => '店铺负责人必填',
            'principal.max' => '店铺负责人最大长度为255',
            'principal.string' => '店铺负责人必须string类型',

            'principal_mobile.required' => '店铺负责人必填',
            'principal_mobile.max' => '店铺负责人最大长度为255',
            'principal_mobile.string' => '店铺负责人必须string类型',

            'province.required' => '发货地（省）必填',
            'province.max' => '发货地（省）最大长度为255',
            'province.string' => '发货地（省）必须string类型',

            'city.required' => '发货地（市）必填',
            'city.max' => '发货地（市）最大长度为255',
            'city.string' => '发货地（市）必须string类型',

            'district.required' => '发货地（区）必填',
            'district.max' => '发货地（区）最大长度为255',
            'district.string' => '发货地（区）必须string类型',

            'address.required' => '发货地（地址）必填',
            'address.max' => '发货地（地址）最大长度为255',
            'address.string' => '发货地（地址）必须string类型',

            'gross_profit_rate.required' => '毛利率（%）必填',
            'gross_profit_rate.numeric' => '毛利率（%）必须是数字',

            'platform_id.required' => '平台类型id必填',
            'platform_id.integer' => '平台类型id必须int类型',
            'platform_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'status.required' => '电子面单必填',
            'status.integer' => '电子面单必须int类型',

            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
        ];
    }

    public function attributes()
    {
        return [
            'nick' => '卖家昵称',
            'title' => '店铺标题',
            'session_key' => 'SessionKey',
            'warehouse_id' => '默认仓库',
            'shop_account' => '店铺账号',
            'shop_passwd' => '店铺密码',
            'rebate' => '返点（%）',
            'principal' => '店铺负责人',
            'principal_mobile' => '负责人电话',
            'province' => '发货地（省）',
            'city' => '发货地（市）',
            'district' => '发货地（区）',
            'address' => '发货地（地址）',
            'gross_profit_rate' => '毛利率（%）',
            'platform_id' => '平台类型',
            'is_waybill' => '电子面单',
            'status' => '记账类型状态'
        ];
    }

}
