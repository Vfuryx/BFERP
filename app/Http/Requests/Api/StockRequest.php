<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class StockRequest extends FormRequest
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
                    'warehouse_id' => [
                        'required','integer',
                        Rule::exists('warehouses','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'goods_id' => [
                        'required','integer',
                        Rule::exists('goods','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'pro_specs_id' => [
                        'required','integer','unique:stocks',
                        Rule::exists('product_specs','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'quantity' => 'required|integer',
                    'status' => 'integer'
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

            'goods_id.required' => '默认商品id必填',
            'goods_id.integer' => '默认商品id必须int类型',
            'goods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'pro_specs_id.unique' => '产品规格id不能重复',
            'pro_specs_id.required' => '产品规格id必填',
            'pro_specs_id.integer' => '产品规格id必须int类型',
            'pro_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'quantity.required' => '库存数必填',
            'quantity.integer' => '库存数必须int类型',

            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
        ];
    }

    public function attributes()
    {
        return [
            'warehouse_id' => '仓库id',
            'goods_id' => '商品id',
            'pro_specs_id' => '产品规格id',
            'quantity' => '库存数',
            'status' => '记账类型状态'
        ];
    }

}
