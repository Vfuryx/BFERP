<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class StockInRequest extends FormRequest
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
                    'is_submit' => 'boolean',
                    'is_stock_in' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'warehouse_id' => [
                        'required', 'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
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
                    'warehouse_id' => [
                        'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        })
                    ],
                    'stock_in_types_id' => [
                        'integer',
                        Rule::exists('stock_in_types', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        })
                    ],
                    'status' => ['boolean'],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'warehouse_id.required' => '仓库id必填',
            'warehouse_id.integer' => '仓库id必须int类型',
            'warehouse_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_types_id.required' => '入库类型id必填',
            'stock_in_types_id.integer' => '入库类型id必须int类型',
            'stock_in_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'is_submit.boolean' => '是否提交必须布尔类型',

            'is_stock_in.boolean' => '是否入库必须布尔类型',


            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',
        ];
    }

    public function attributes()
    {
        return [
            'stock_in_no' => '入库单号',
            'warehouse_id' => '仓库id',
            'stock_in_types_id' => '入库类型id',
            'creator' => '创建人',
            'submitter' => '提交人',
            'submit_at' => '提交时间',
            'auditor' => '审核人',
            'audit_at' => '审核时间',
            'warehouer' => '入库人',
            'stock_in_at' => '入库时间',
            'is_submit' => '是否提交',
            'is_audit' => '是否审核',
            'is_stock_in' => '是否入库',
            'status' => '状态：0=停用，1=启用',
            'stock_in_details' => '入库单详情'
        ];
    }

}
