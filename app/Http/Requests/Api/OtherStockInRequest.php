<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class OtherStockInRequest extends FormRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'status' => 'boolean',
                    'is_submit' => 'boolean',
                    'is_stock_in' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'external_sn' => 'string|max:255',
                    'warehouse_id' => [
                        'required', 'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'suppliers_id' => [
                        'required', 'integer',
                        Rule::exists('suppliers', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'stock_in_types_id' => [
                        'required', 'integer',
                        Rule::exists('stock_in_types', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'external_sn' => 'string|max:255',
                    'warehouse_id' => [
                        'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'suppliers_id' => [
                        'integer',
                        Rule::exists('suppliers', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'stock_in_types_id' => [
                        'integer',
                        Rule::exists('stock_in_types', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'external_sn.string' => '外部单号必须string类型',
            'external_sn.max' => '外部单号最大长度为255',

            'warehouse_id.required' => '仓库id必填',
            'warehouse_id.integer' => '仓库id必须int类型',
            'warehouse_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'suppliers_id.required' => '供应商id必填',
            'suppliers_id.integer' => '供应商id必须int类型',
            'suppliers_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_types_id.required' => '入库类型id必填',
            'stock_in_types_id.integer' => '入库类型id必须int类型',
            'stock_in_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',
        ];
    }

    public function attributes()
    {
        return [
            'external_sn' => '外部单号',
            'warehouse_id' => '仓库id',
            'suppliers_id' => '供应商id',
            'stock_in_types_id' => '入库类型id',
            'status' => '状态：0=停用，1=启用',
        ];
    }

}
