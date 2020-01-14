<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class PurchaseDetailRequest extends FormRequest
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
                ];
                break;
            case 'POST':
                return [
                    'purchase_lists.*.purchase_details.*.product_components_id' => [
                        'required', 'integer',
                        Rule::exists('product_components', 'id'),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            $purchaseLists = $this->purchase_lists[$ex[1]];
                            //list里面是否存在重复的sku 或 子件是否属于sku
                            if (
                                !(collect($this->purchase_lists[$ex[1]]['purchase_details'])
                                    ->where('product_components_id', $value)->count()>1)
                                &&
                                \App\Models\CombinationProductComponent::query()
                                    ->where('combinations_id', $purchaseLists['combinations_id'])
                                    ->where('product_components_id', $value)->count()
                            ) {
                                return true;
                            }
                            return $fail('存在重复的子件数据');
                        }
                    ],
                    'purchase_lists.*.purchase_details.*.purchase_quantity' => 'required|integer|min:1',
                    'purchase_lists.*.purchase_details.*.shops_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.purchase_details.*.suppliers_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.purchase_details.*.purchase_cost' => 'numeric',
                    'purchase_lists.*.purchase_details.*.purchase_freight' => 'numeric',
                    'purchase_lists.*.purchase_details.*.warehouse_cost' => 'numeric',
                    'purchase_lists.*.purchase_details.*.commission' => 'numeric',
                    'purchase_lists.*.purchase_details.*.discount' => 'numeric',
                    'purchase_lists.*.purchase_details.*.wooden_frame_costs' => 'numeric',
                    'purchase_lists.*.purchase_details.*.arrival_time' => 'date',
                    'purchase_lists.*.purchase_details.*.remark' => 'string|nullable|max:255'
                ];
                break;
            case 'PATCH':
                return [
                    'purchase_lists.*.purchase_details.*.id' => [
                        'integer',
                        Rule::exists('purchase_details', 'id')
                    ],
                    'purchase_lists.*.purchase_details.*.product_components_id' => [
                        'integer',
                        Rule::exists('product_components', 'id'),
                        function($attribute, $value, $fail) {

                            $ex = explode('.', $attribute);

                            $purchaseLists = $this->purchase_lists[$ex[1]];
                            //details 是否存在重复数据 或 子件属于这个sku
                            if (
                                collect($this->purchase_lists[$ex[1]]['purchase_details'])
                                ->where('product_components_id', $value)
                                ->count()>1
                                ||
                                !\App\Models\CombinationProductComponent::query()
                                    ->where('combinations_id', $purchaseLists['combinations_id'])
                                    ->where('product_components_id', $value)->count()
                            ) {
                                return $fail('子件数据不能重复且子件属于上传sku');
                            }

                            //判断是否存在purchase_details.*.id
                            if ($id = $purchaseLists['purchase_details'][$ex[3]]['id'] ?? null)
                                //purchase_details表里是否同一条数据
                                if (\App\Models\PurchaseDetail::findOrfail($id)->product_components_id == $value)
                                    return true;

                            //判断上一层是否存在id
                            if ($id = $purchaseLists['id'] ?? null) {
                                //模型没有重复数据
                                if (\App\Models\PurchaseDetail::where('purchase_lists_id', $id)->where('product_components_id', $value)->count()) {
                                    return $fail('存在重复的子件数据');
                                }
                            }
                            return true;
                        }
                    ],
                    'purchase_lists.*.purchase_details.*.purchase_quantity' => ['integer', 'min:1'],
                    'purchase_lists.*.purchase_details.*.shops_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.purchase_details.*.suppliers_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.purchase_details.*.purchase_cost' => ['numeric'],
                    'purchase_lists.*.purchase_details.*.purchase_freight' => ['numeric'],
                    'purchase_lists.*.purchase_details.*.warehouse_cost' => ['numeric'],
                    'purchase_lists.*.purchase_details.*.commission' => ['numeric'],
                    'purchase_lists.*.purchase_details.*.discount' => ['numeric'],
                    'purchase_lists.*.purchase_details.*.wooden_frame_costs' => ['numeric'],
                    'purchase_lists.*.purchase_details.*.arrival_time' => ['date'],
                    'purchase_lists.*.purchase_details.*.remark' => ['string', 'nullable', 'max:255'],
                ];
                break;
        }
    }

    public
    function messages()
    {
        return [
            'purchase_lists.*.purchase_details.*.id.required' => '采购详情id必填',
            'purchase_lists.*.purchase_details.*.id.integer' => '采购详情id必须int类型',
            'purchase_lists.*.purchase_details.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.purchase_details.*.product_components_id.required' => '产品规格id必填',
            'purchase_lists.*.purchase_details.*.product_components_id.integer' => '产品规格id必须int类型',
            'purchase_lists.*.purchase_details.*.product_components_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.purchase_details.*.purchase_quantity.required' => '采购数必填',
            'purchase_lists.*.purchase_details.*.purchase_quantity.integer' => '采购数必须int类型',
            'purchase_lists.*.purchase_details.*.purchase_quantity.min' => '采购数不少于1',

            'purchase_lists.*.purchase_details.*.shops_id.integer' => '采购店铺id必须int类型',
            'purchase_lists.*.purchase_details.*.shops_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.purchase_details.*.suppliers_id.integer' => '供应商id必须int类型',
            'purchase_lists.*.purchase_details.*.suppliers_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.purchase_details.*.purchase_cost.numeric' => '采购成本必须是数字',

            'purchase_lists.*.purchase_details.*.purchase_freight.numeric' => '采购运费必须是数字',

            'purchase_lists.*.purchase_details.*.warehouse_cost.numeric' => '仓库成本必须是数字',

            'purchase_lists.*.purchase_details.*.commission.numeric' => '佣金点必须是数字',

            'purchase_lists.*.purchase_details.*.discount.numeric' => '折扣必须是数字',

            'purchase_lists.*.purchase_details.*.wooden_frame_costs.numeric' => '木架费',

            'purchase_lists.*.purchase_details.*.arrival_time.date' => '到货时间必须data类型',

            'purchase_lists.*.purchase_details.*.remark.string' => '备注必须string类型',
            'purchase_lists.*.purchase_details.*.remark.nullable' => '备注可为null',
            'purchase_lists.*.purchase_details.*.remark.max' => '备注最大长度为255',

        ];
    }

    public
    function attributes()
    {
        return [
            'purchases_id' => '采购id',
            'product_components_id' => '子件id',
            'purchase_quantity' => '采购数',
            'shops_id' => '采购店铺id',
            'suppliers_id' => '供应商id',
            'purchase_cost' => '采购成本',
            'purchase_freight' => '采购运费',
            'warehouse_cost' => '仓库成本',
            'commission' => '佣金点',
            'discount' => '折扣',
            'paint' => '油漆',
            'wooden_frame_costs' => '木架费',
            'arrival_time' => '到货时间',
            'remark' => '备注',
        ];
    }
}
