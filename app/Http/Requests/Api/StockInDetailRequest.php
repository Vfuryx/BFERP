<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class StockInDetailRequest extends FormRequest
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
//                    'stock_ins_id' => [
//                        'sometimes','required','integer',
//                        Rule::exists('stock_ins','id')->where(function ($query) {
//                            $query->where('status',1);
//                        }),
//                    ],
                    'purchases_id' => [
                        'sometimes','required','integer',
                        Rule::exists('purchases','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'product_specs_id' => [
                        'sometimes','required','integer',
                        Rule::exists('product_specs','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'stock_in_quantity' => 'sometimes|required|integer|min:1',
                    'remark' => 'string|nullable|max:255',
                ];
                break;
            case 'PATCH':
                return [
//                    'stock_ins_id' => [
//                        'integer',
//                        Rule::exists('stock_ins','id')->where(function ($query) {
//                            $query->where('status',1);
//                        }),
//                    ],
                    'purchases_id' => [
                        'integer',
                        Rule::exists('purchases','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'product_specs_id' => [
                        'integer',
                        Rule::exists('product_specs','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'stock_in_quantity' => 'integer|min:1',
                    'remark' => 'string|nullable|max:255',
                ];
                break;
            case 'DELETE':
                return [
                    'ids' => 'required|string',
                ];
                break;
            case 'PUT':
                return [
                    'ids' => 'required|string',
                    'status' => 'required|integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'stock_ins_id.required' => '入库单id必填',
            'stock_ins_id.integer' => '入库单id必须int类型',
            'stock_ins_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchases_id.required' => '采购单id必填',
            'purchases_id.integer' => '采购单id必须int类型',
            'purchases_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'product_specs_id.required' => '产品规格id必填',
            'product_specs_id.integer' => '产品规格id必须int类型',
            'product_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_quantity.required' => '入库数量必填',
            'stock_in_quantity.integer' => '入库数量必须int类型',
            'stock_in_quantity.min' => '入库数量不少于1',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型',
        ];
    }

    public function attributes()
    {
        return [
            'stock_ins_id' => '入库单id',
            'purchases_id' => '采购单id',
            'product_specs_id' => '产品规格id',
            'stock_in_quantity' => '入库数量',
            'remark' => '备注',
        ];
    }

}
