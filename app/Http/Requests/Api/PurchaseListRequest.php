<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class PurchaseListRequest extends FormRequest
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
                    'purchase_lists.*.product_specs_id' => [
                        'required', 'integer',
                        Rule::exists('product_specs', 'id')
                    ],
                    'purchase_lists.*.purchase_quantity' => 'required|integer|min:1',
                    'purchase_lists.*.shops_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.suppliers_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.purchase_cost' => 'numeric',
                    'purchase_lists.*.purchase_freight' => 'numeric',
                    'purchase_lists.*.warehouse_cost' => 'numeric',
                    'purchase_lists.*.commission' => 'numeric',
                    'purchase_lists.*.discount' => 'numeric',
                    'purchase_lists.*.wooden_frame_costs' => 'numeric',
                    'purchase_lists.*.arrival_time' => 'date',
                    'purchase_lists.*.remark' => 'string|nullable|max:255'
                ];
                break;
            case 'PATCH':
                return [
                    'purchase_lists.*.id' => [
                        'integer',
                        Rule::exists('purchase_lists', 'id')
                    ],
                    'purchase_lists.*.product_specs_id' => [
                        'integer',
                        Rule::exists('product_specs', 'id'),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //如果存在 id 跳过插入判断
                            if (!isset($this->purchase_lists[$ex[1]]['id'])) {
                                foreach ($this->purchase->purchaseLists as $purchaseList) {
                                    if ($purchaseList->where('product_specs_id', $value)->count())
                                        return $fail('不能重复插入规格');
                                }
                            }
                            return true;
                        }
                    ],
                    'purchase_lists.*.purchase_quantity' => ['integer', 'min:1'],
                    'purchase_lists.*.shops_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.suppliers_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_lists.*.purchase_cost' => ['numeric'],
                    'purchase_lists.*.purchase_freight' => ['numeric'],
                    'purchase_lists.*.warehouse_cost' => ['numeric'],
                    'purchase_lists.*.commission' => ['numeric'],
                    'purchase_lists.*.discount' => ['numeric'],
                    'purchase_lists.*.wooden_frame_costs' => ['numeric'],
                    'purchase_lists.*.arrival_time' => ['date'],
                    'purchase_lists.*.remark' => ['string', 'nullable', 'max:255'],
                ];
                break;
        }
    }

    public
    function messages()
    {
        return [
            'purchase_lists.*.id.required' => '采购详情id必填',
            'purchase_lists.*.id.integer' => '采购详情id必须int类型',
            'purchase_lists.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.product_specs_id.required' => '产品规格id必填',
            'purchase_lists.*.product_specs_id.integer' => '产品规格id必须int类型',
            'purchase_lists.*.product_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.purchase_quantity.required' => '采购数必填',
            'purchase_lists.*.purchase_quantity.integer' => '采购数必须int类型',
            'purchase_lists.*.purchase_quantity.min' => '采购数不少于1',

            'purchase_lists.*.shops_id.integer' => '采购店铺id必须int类型',
            'purchase_lists.*.shops_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.suppliers_id.integer' => '供应商id必须int类型',
            'purchase_lists.*.suppliers_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.purchase_cost.numeric' => '采购成本必须是数字',

            'purchase_lists.*.purchase_freight.numeric' => '采购运费必须是数字',

            'purchase_lists.*.warehouse_cost.numeric' => '仓库成本必须是数字',

            'purchase_lists.*.commission.numeric' => '佣金点必须是数字',

            'purchase_lists.*.discount.numeric' => '折扣必须是数字',

            'purchase_lists.*.wooden_frame_costs.numeric' => '木架费',

            'purchase_lists.*.arrival_time.date' => '到货时间必须data类型',

            'purchase_lists.*.remark.string' => '备注必须string类型',
            'purchase_lists.*.remark.nullable' => '备注可为null',
            'purchase_lists.*.remark.max' => '备注最大长度为255',

        ];
    }

    public
    function attributes()
    {
        return [
            'purchases_id' => '采购id',
            'product_specs_id' => '产品规格id',
            'purchase_quantity' => '采购数',
            'shops_id' => '采购店铺id',
            'suppliers_id' => '供应商id',
            'purchase_cost' => '采购成本',
            'purchase_freight' => '采购运费',
            'warehouse_cost' => '仓库成本',
            'commission' => '佣金点',
            'discount' => '折扣',
            'wooden_frame_costs' => '木架费',
            'arrival_time' => '到货时间',
            'remark' => '备注',
        ];
    }
}
