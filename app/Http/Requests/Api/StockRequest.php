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
                    'status' => 'boolean',
                    'warehouse_id' => 'integer'
                ];
                break;
            case 'POST':
                return [
                    'stocks.*.warehouse_id' => [
                        'required', 'integer',
                        Rule::exists('warehouses', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'stocks.*.products_id' => [
                        'required', 'integer',
                        Rule::exists('products', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'stocks.*.product_components_id' => [
                        'required', 'integer',
                        Rule::exists('product_components', 'id'),
                        function($attribute, $value, $fail) {
                            $stockExist = (new \App\Models\Stock())->stockExist(
                                $this->stocks[explode('.', $attribute)[1]]['warehouse_id'], $value
                            );

                            return (!$stockExist) ?: $fail('子件id在同一个仓库不能重复');
                        },
                        function($attribute, $value, $fail) {
                            $productComponentExist = (new \App\Models\ProductComponent())->productComponentExist(
                                $this->stocks[explode('.', $attribute)[1]]['products_id'], $value
                            );

                            return $productComponentExist ?: $fail('子件不属于这个产品');
                        }
                    ],
                    'stocks.*.quantity' => 'required|integer',
                    'stocks.*.status' => 'boolean'
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

            'stocks.*.products_id.required' => '产品id必填',
            'stocks.*.products_id.integer' => '产品id必须int类型',
            'stocks.*.products_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stocks.*.product_components_id.required' => '子件id必填',
            'stocks.*.product_components_id.integer' => '子件id必须int类型',
            'stocks.*.product_components_id.exists' => '需要添加的id在数据库中未找到或未启用',

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
            'products_id' => '产品id',
            'product_components_id' => '子件id',
            'quantity' => '库存数',
            'status' => '记账类型状态'
        ];
    }

}
