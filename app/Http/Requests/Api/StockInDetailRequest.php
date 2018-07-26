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
                    'stock_in_details.*.purchase_details_id' => [
                        'required', 'integer',
                        Rule::exists('purchase_details', 'id'),
                        function ($attribute, $value, $fail) {
                            if (\App\Models\PurchaseDetail::query()->find($value)->purchases->status) {
                                return true;
                            }
                            return $fail('订单没有开启');
                        }
                    ],
                    'stock_in_details.*.product_specs_id' => [
                        'required', 'integer',
                        Rule::exists('product_specs', 'id')
                    ],
                    'stock_in_details.*.stock_in_quantity' => 'required|integer|min:1',
                    'stock_in_details.*.remark' => 'string|nullable|max:255',
                ];
                break;
            case 'PATCH':
                return [
                    'stock_in_details.*.id' => [
                        'integer',
                        Rule::exists('stock_in_details', 'id')
                    ],
                    'stock_in_details.*.purchase_details_id' => [
                        'integer',
                        Rule::exists('purchase_details', 'id')
                    ],
                    'stock_in_details.*.product_specs_id' => [
                        'integer',
                        Rule::exists('product_specs', 'id')
                    ],
                    'stock_in_details.*.stock_in_quantity' => 'integer|min:1',
                    'stock_in_details.*.remark' => 'string|nullable|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'stock_in_details.*.id.required' => '入库单详情id必填',
            'stock_in_details.*.id.integer' => '入库单详情id必须int类型',
            'stock_in_details.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_details.*.purchase_details_id.required' => '采购单详情id必填',
            'stock_in_details.*.purchase_details_id.integer' => '采购单详情id必须int类型',
            'stock_in_details.*.purchase_details_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_details.*.product_specs_id.required' => '产品规格id必填',
            'stock_in_details.*.product_specs_id.integer' => '产品规格id必须int类型',
            'stock_in_details.*.product_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_details.*.stock_in_quantity.required' => '入库数量必填',
            'stock_in_details.*.stock_in_quantity.integer' => '入库数量必须int类型',
            'stock_in_details.*.stock_in_quantity.min' => '入库数量不少于1',

            'stock_in_details.*.remark.string' => '备注必须string类型',
            'stock_in_details.*.remark.nullable' => '备注可为null',
            'stock_in_details.*.remark.max' => '备注最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'stock_ins_id' => '入库单id',
            'purchase_details_id' => '采购单详情id',
            'product_specs_id' => '产品规格id',
            'stock_in_quantity' => '入库数量',
            'remark' => '备注',
        ];
    }

}
