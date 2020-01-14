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
            case 'POST':
                return [
                    'stock_in_details.*.purchase_details_id' => [
                        'required', 'integer',
                        Rule::exists('purchase_details', 'id'),
                        function($attribute, $value, $fail) {
                            if (!\App\Models\PurchaseDetail::query()->findOrFail($value)->purchaseList->purchase->status)
                                return $fail('采购单没有开启');

                            if (!\App\Models\PurchaseDetail::query()->findOrFail($value)->purchaseList->purchase->is_audit)
                                return $fail('采购单未审核');

                            if (
                                \App\Models\PurchaseDetail::query()->findOrFail($value)->purchaseList->purchase->getOriginal('purchase_status')
                                ==
                                \App\Models\Purchase::PURCHASE_STATUS_FINISH
                            )
                                return $fail('采购单已完成');

                            return true;
                        }
                    ],
                    'stock_in_details.*.product_components_id' => [
                        'required', 'integer',
                        Rule::exists('product_components', 'id'),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //表单数据是否匹配 stock_in_details 是否存在重复数据
                            if (
                                collect($this->stock_in_details[$ex[1]])
                                    ->where('product_components_id', $value)
                                    ->where('purchase_details_id', $this->stock_in_details[$ex[1]]['purchase_details_id'])
                                    ->count() > 1
                            ) {
                                return $fail('存在重复数据');
                            }

                            //模型数据是否匹配product_components_id
                            //采购详情不存在子件这个 id
                            if (
                            !\App\Models\PurchaseDetail::where('id', $this->stock_in_details[$ex[1]]['purchase_details_id'])
                                ->where('product_components_id', $value)
                                ->count()
                            ) {
                                return $fail('采购详情不存在子件 id');
                            }
                            return true;
                        }
                    ],
                    'stock_in_details.*.total_fee' => [
                        'required', 'numeric',
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //计算总额是否有误
                            $purchaseCost = \App\Models\PurchaseDetail::query()
                                ->findOrFail($this->stock_in_details[$ex[1]]['purchase_details_id'])->purchase_cost;

                            $stockInQuantity = $this->stock_in_details[$ex[1]]['stock_in_quantity'];

                            bcscale(2);

                            if (bccomp(bcmul($purchaseCost, $stockInQuantity), $value) === 0)
                                return true;

                            return $fail('总额计算有误');
                        }
                    ],
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
                    'stock_in_details.*.purchase_details_id' => [
                        'integer',
                        Rule::exists('purchase_details', 'id'),
                        function($attribute, $value, $fail) {
                            if (!\App\Models\PurchaseDetail::query()->findOrFail($value)->purchaseList->purchase->status)
                                return $fail('采购单没有开启');

                            if (!\App\Models\PurchaseDetail::query()->findOrFail($value)->purchaseList->purchase->is_audit)
                                return $fail('采购单未审核');

                            if (
                                \App\Models\PurchaseDetail::query()->findOrFail($value)->purchaseList->purchase->getOriginal('purchase_status')
                                ==
                                \App\Models\Purchase::PURCHASE_STATUS_FINISH
                            )
                                return $fail('采购单已完成');

                            return true;
                        }
                    ],
                    'stock_in_details.*.product_components_id' => [
                        'integer',
                        Rule::exists('product_components', 'id'),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //表单数据是否匹配 stock_in_details 是否存在重复数据
                            if (
                                collect($this->stock_in_details[$ex[1]])
                                    ->where('product_components_id', $value)
                                    ->where('purchase_details_id', $this->stock_in_details[$ex[1]]['purchase_details_id'])
                                    ->count() > 1
                            ) {
                                return $fail('存在重复数据');
                            }

                            //模型数据是否匹配
                            //采购详情不存在子件这个 id
                            if (
                            !\App\Models\PurchaseDetail::where('id', $this->stock_in_details[$ex[1]]['purchase_details_id'])
                                ->where('product_components_id', $value)
                                ->count()
                            ) {
                                return $fail('采购详情不存在子件 id');
                            }

                            //模型数据是否匹配
                            //是否存id
                            if ($id = $this->stock_in_details[$ex[1]]['id'] ?? null)
                                //存在id则判断数据是否合法
                                if($this->stockin->stockInDetails->find($this->stock_in_details[$ex[1]]['id'])->product_components_id == $value)
                                    return true;

                            //模型里面 是否已经存在
                            if($this->stockin->stockInDetails->where('product_components_id', $value)->count()) {
                                return $fail('模型数据不匹配');
                            }

                            return true;
                        }
                    ],
                    'stock_in_details.*.total_fee' => [
                        'numeric',
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //计算总额是否有误
                            $purchaseCost = \App\Models\PurchaseDetail::query()
                                ->findOrFail($this->stock_in_details[$ex[1]]['purchase_details_id'])->purchase_cost;
                            $stockInQuantity = $this->stock_in_details[$ex[1]]['stock_in_quantity'];
                            bcscale(2);
                            if (bccomp(bcmul($purchaseCost, $stockInQuantity), $value) === 0)
                                return true;

                            return $fail('总额计算有误');
                        }
                    ],
                    'stock_in_details.*.stock_in_quantity' => 'integer|min:1',
                    'stock_in_details.*.remark' => 'string|nullable|max:255',
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
            'stock_in_details.*.id.required' => '入库单详情id必填',
            'stock_in_details.*.id.integer' => '入库单详情id必须int类型',
            'stock_in_details.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_details.*.purchase_details_id.required' => '采购详情id必填',
            'stock_in_details.*.purchase_details_id.integer' => '采购详情id必须int类型',
            'stock_in_details.*.purchase_details_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_details.*.product_components_id.required' => '子件id必填',
            'stock_in_details.*.product_components_id.integer' => '子件id必须int类型',
            'stock_in_details.*.product_components_id.exists' => '需要添加的id在数据库中未找到或未启用',

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
            'purchase_details_id' => '采购详情id',
            'product_components_id' => '子件id',
            'stock_in_quantity' => '入库数量',
            'remark' => '备注',
        ];
    }

}
