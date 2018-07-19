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
                    'status' => 'integer'
                ];
                break;
            case 'POST':
                return [
                    'purchases_id' => [
                        'sometimes','required', 'integer',
                        Rule::exists('purchases', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'product_specs_id' => [
                        'sometimes','required', 'integer',
                        Rule::exists('product_specs', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_quantity' => 'sometimes|required|integer',
                    'shops_id' =>  [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'suppliers_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_cost' => 'numeric',
                    'purchase_freight' => 'numeric',
                    'warehouse_cost' => 'numeric',
                    'commission' => 'numeric',
                    'discount' => 'numeric',
                    'colour_num' => 'string|max:255',
                    'paint' => 'string|max:255',
                    'wooden_frame_costs' => 'numeric',
                    'arrival_time' => 'date',
                    'remark' => 'string|nullable|max:255'
                ];
                break;
            case 'PATCH':
                $publicRule = $this->publicRule($this->purchasedetail->purchases->status == 1 && $this->purchasedetail->purchases->is_submit == 0);
                return [
                    'purchases_id' => [
                        'integer',
                        Rule::exists('purchases', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                        $publicRule
                    ],
                    'product_specs_id' => [
                        'integer',
                        Rule::exists('product_specs', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                        $publicRule
                    ],
                    'purchase_quantity' => ['integer',$publicRule],
                    'shops_id' =>  [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                        $publicRule
                    ],
                    'suppliers_id' => [
                        'integer',
                        Rule::exists('shops', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                        $publicRule
                    ],
                    'purchase_cost' => ['numeric',$publicRule],
                    'purchase_freight' => ['numeric',$publicRule],
                    'warehouse_cost' => ['numeric',$publicRule],
                    'commission' => ['numeric',$publicRule],
                    'discount' => ['numeric',$publicRule],
                    'colour_num' => ['string','max:255',$publicRule],
                    'paint' => ['string','max:255',$publicRule],
                    'wooden_frame_costs' => ['numeric',$publicRule],
                    'arrival_time' => ['date',$publicRule],
                    'remark' => ['string','nullable','max:255',$publicRule],
                ];
                break;
            case 'DELETE':
                return [
                    'ids' => 'required|string',
                ];
                break;
        }
    }

    public
    function messages()
    {
        return [
            'purchases_id.required' => '采购id必填',
            'purchases_id.integer' => '采购id必须int类型',
            'purchases_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'product_specs_id.required' => '产品规格id必填',
            'product_specs_id.integer' => '产品规格id必须int类型',
            'product_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_quantity.required' => '采购数必填',
            'purchase_quantity.integer' => '采购数必须int类型',
            
            'shops_id.integer' => '采购店铺id必须int类型',
            'shops_id.exists' => '需要添加的id在数据库中未找到或未启用',
            
            'suppliers_id.integer' => '供应商id必须int类型',
            'suppliers_id.exists' => '需要添加的id在数据库中未找到或未启用',
            
            'purchase_cost.numeric' => '采购成本必须是数字',

            'purchase_freight.numeric' => '采购运费必须是数字',

            'warehouse_cost.numeric' => '仓库成本必须是数字',

            'commission.numeric' => '金佣点',

            'discount.numeric' => '折扣',

            'colour_num.max' => '色号最大长度为255',
            'colour_num.string' => '色号必须string类型',

            'paint.max' => '油漆最大长度为255',
            'paint.string' => '油漆必须string类型',

            'wooden_frame_costs.numeric' => '木架费',

            'arrival_time.date' => '到货时间必须data类型',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型',
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
            'commission' => '金佣点',
            'discount' => '折扣',
            'colour_num' => '色号',
            'paint' => '油漆',
            'wooden_frame_costs' => '木架费',
            'arrival_time' => '到货时间',
            'remark' => '备注',
        ];
    }

    /**
     * 通用规则
     * @param bool $condition   判断的条件
     * @param string $text      返回的信息
     * @return \Closure         闭包
     */
    public function publicRule($condition = true, $text = '需要更改错误确认数据的准确性，例如数据是否已启用、不可修改')
    {
        return function($attribute, $value, $fail) use ($condition, $text) {
            if ($condition) {
                return true;
            }
            return $fail($text);
        };
    }

}
