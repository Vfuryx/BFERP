<?php

namespace App\Http\Requests\Api;

use App\Models\ProductSpec;
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
//                dd($this->stocks);
                return [
                    'stocks.*.warehouse_id' => [
                        'required', 'integer',
                        Rule::exists('warehouses', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'stocks.*.goods_id' => [
                        'required', 'integer',
                        Rule::exists('goods', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'stocks.*.pro_specs_id' => [
                        'required', 'integer',
                        function($attribute, $value, $fail) {
                            $ProductSpec = \App\Models\Stock::query()
                                ->where('warehouse_id', $this->stocks[explode('.', $attribute)[1]]['warehouse_id'])
                                ->where('pro_specs_id', $value);
                            if (!$ProductSpec->count()) {
                                return true;
                            }
                            return $fail('产品规格id在同一个仓库不能重复');
                        },
                    ],
                    'stocks.*.quantity' => 'required|integer',
                    'stocks.*.status' => 'integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [

            'stocks.*.warehouse_id.required' => '仓库id必填',
            'stocks.*.warehouse_id.integer' => '仓库id必须int类型',
            'stocks.*.warehouse_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stocks.*.goods_id.required' => '默认商品id必填',
            'stocks.*.goods_id.integer' => '默认商品id必须int类型',
            'stocks.*.goods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stocks.*.pro_specs_id.required' => '产品规格id必填',
            'stocks.*.pro_specs_id.integer' => '产品规格id必须int类型',
            'stocks.*.pro_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stocks.*.quantity.required' => '库存数必填',
            'stocks.*.quantity.integer' => '库存数必须int类型',

            'stocks.*.status.required' => '状态必填',
            'stocks.*.status.integer' => '状态必须int类型',
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
