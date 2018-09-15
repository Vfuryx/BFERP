<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class OtherStockInDetailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'other_stock_in_details.*.product_components_id' => [
                        'required', 'integer',
                        Rule::exists('product_components', 'id'),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //表单数据是否匹配 other_stock_in_details 是否存在重复数据
                            if (
                                collect($this->other_stock_in_details[$ex[1]])
                                    ->where('product_components_id', $value)
                                    ->count() > 1
                            ) {
                                return $fail('存在重复数据');
                            }


                            return true;
                        }
                    ],
                    'other_stock_in_details.*.total_fee' => [
                        'required', 'numeric',
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);

                            //计算总额是否有误
                            $purchaseCost = \App\Models\ProductComponent::query()
                                ->findOrFail($this->other_stock_in_details[$ex[1]]['product_components_id'])->cost;

                            $stockInQuantity = $this->other_stock_in_details[$ex[1]]['stock_in_quantity'];

                            bcscale(2);

                            if (bccomp(bcmul($purchaseCost, $stockInQuantity), $value) === 0)
                                return true;

                            return $fail('总额计算有误');
                        }
                    ],
                    'other_stock_in_details.*.stock_in_quantity' => 'required|integer|min:1',
                    'other_stock_in_details.*.remark' => 'string|nullable|max:255',
                ];
                break;
            case 'PATCH':
                return [
                    'other_stock_in_details.*.id' => [
                        'integer',
                        Rule::exists('stock_in_details', 'id'),
                    ],
                    'other_stock_in_details.*.product_components_id' => [
                        'integer',
                        Rule::exists('product_components', 'id'),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //表单数据是否匹配 other_stock_in_details 是否存在重复数据
                            if (
                                collect($this->other_stock_in_details[$ex[1]])
                                    ->where('product_components_id', $value)
                                    ->count() > 1
                            ) {
                                return $fail('存在重复数据');
                            }

                            //模型数据是否匹配
                            //是否存id
                            if ($id = $this->other_stock_in_details[$ex[1]]['id'] ?? null)
                                //存在id则判断数据是否合法
                                if($this->stockin->stockInDetails->find($this->other_stock_in_details[$ex[1]]['id'])->product_components_id == $value)
                                    return true;

                            //模型里面 是否已经存在
                            if($this->stockin->stockInDetails->where('product_components_id', $value)->count()) {
                                return $fail('模型数据不匹配');
                            }

                            return true;
                        }
                    ],
                    'other_stock_in_details.*.total_fee' => [
                        'numeric',
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);

                            //计算总额是否有误
                            $purchaseCost = \App\Models\ProductComponent::query()
                                ->findOrFail($this->other_stock_in_details[$ex[1]]['product_components_id'])->cost;

                            $stockInQuantity = $this->other_stock_in_details[$ex[1]]['stock_in_quantity'];

                            bcscale(2);

                            if (bccomp(bcmul($purchaseCost, $stockInQuantity), $value) === 0)
                                return true;
                            return $fail('总额计算有误');
                        }
                    ],
                    'other_stock_in_details.*.stock_in_quantity' => 'integer|min:1',
                    'other_stock_in_details.*.remark' => 'string|nullable|max:255',
                ];
                break;
            default:
                return [];
                break;
        }
    }

    public function messages()
    {
        return [
            'other_stock_in_details.*.id.required' => '入库单详情id必填',
            'other_stock_in_details.*.id.integer' => '入库单详情id必须int类型',
            'other_stock_in_details.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'other_stock_in_details.*.product_components_id.required' => '子件id必填',
            'other_stock_in_details.*.product_components_id.integer' => '子件id必须int类型',
            'other_stock_in_details.*.product_components_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'other_stock_in_details.*.stock_in_quantity.required' => '入库数量必填',
            'other_stock_in_details.*.stock_in_quantity.integer' => '入库数量必须int类型',
            'other_stock_in_details.*.stock_in_quantity.min' => '入库数量不少于1',

            'other_stock_in_details.*.total_fee.required' => '总额必填',
            'other_stock_in_details.*.total_fee.numeric' => '总额必须是数字',

            'other_stock_in_details.*.remark.string' => '备注必须string类型',
            'other_stock_in_details.*.remark.nullable' => '备注可为null',
            'other_stock_in_details.*.remark.max' => '备注最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'stock_ins_id' => '入库单id',
            'product_components_id' => '子件id',
            'stock_in_quantity' => '入库数量',
            'remark' => '备注',
        ];
    }
}
