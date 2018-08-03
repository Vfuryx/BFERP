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
                    'stock_in_details.*.purchase_lists_id' => [
                        'required', 'integer',
                        Rule::exists('purchase_lists', 'id'),
                        function ($attribute, $value, $fail) {
                            if (\App\Models\PurchaseList::query()->findOrFail($value)->purchase->status) {
                                return true;
                            }
                            return $fail('订单没有开启');
                        }
                    ],
                    'stock_in_details.*.product_specs_id' => [
                        'required', 'integer',
                        Rule::exists('product_specs', 'id')
                    ],
                    'stock_in_details.*.total_fee' => 'required|numeric',
                    'stock_in_details.*.stock_in_quantity' => 'required|integer|min:1',
                    'stock_in_details.*.remark' => 'string|nullable|max:255',
                ];
                break;
            case 'PATCH':
                return [
                    'stock_in_details.*.id' => [
                        'integer',
                        Rule::exists('stock_in_details', 'id'),
                    ],
                    'stock_in_details.*.purchase_lists_id' => [
                        'integer',
                        Rule::exists('purchase_lists', 'id'),
                        function ($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //如果存在 id 跳过插入判断
                            if (!isset($this->stock_in_details[$ex[1]]['id'])) {
                                if ($this->stockin->stockInDetails->where('purchase_lists_id',$value)->count())
                                    return $fail('不能重复插入规格');
                            }

                            if (\App\Models\PurchaseList::query()->findOrFail($value)->purchase->status) {
                                return true;
                            }
                            return $fail('订单没有开启');
                        }
                    ],
                    'stock_in_details.*.product_specs_id' => [
                        'integer',
                        Rule::exists('product_specs', 'id')
                    ],
                    'stock_in_details.*.total_fee' => 'numeric',
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

            'stock_in_details.*.purchase_lists_id.required' => '采购清单id必填',
            'stock_in_details.*.purchase_lists_id.integer' => '采购清单id必须int类型',
            'stock_in_details.*.purchase_lists_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_details.*.product_specs_id.required' => '产品规格id必填',
            'stock_in_details.*.product_specs_id.integer' => '产品规格id必须int类型',
            'stock_in_details.*.product_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_details.*.stock_in_quantity.required' => '入库数量必填',
            'stock_in_details.*.stock_in_quantity.integer' => '入库数量必须int类型',
            'stock_in_details.*.stock_in_quantity.min' => '入库数量不少于1',

            'stock_in_details.*.total_fee.required' => '总额必填',
            'stock_in_details.*.total_fee.numeric' => '总额必须是数字',

            'stock_in_details.*.remark.string' => '备注必须string类型',
            'stock_in_details.*.remark.nullable' => '备注可为null',
            'stock_in_details.*.remark.max' => '备注最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'stock_ins_id' => '入库单id',
            'purchase_lists_id' => '采购清单id',
            'product_specs_id' => '产品规格id',
            'stock_in_quantity' => '入库数量',
            'remark' => '备注',
        ];
    }

}
