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
                    'commodity_code' => 'nullable|string|max:255',
                ];
                break;
            case 'POST':
                return [
                    'purchase_lists.*.combinations_id' => [
                        'required', 'integer',
                        Rule::exists('combinations', 'id'),
                        function($attribute, $value, $fail) {
                            //list里面是否存在重复的sku
                            if(!(collect($this->purchase_lists)->where('combinations_id',$value)->count()>1)){
                                return true;
                            }
                            return $fail('存在重复的组合数据');
                        }
                    ],
                    'purchase_lists.*.remark' => 'string|nullable|max:255'
                ];
                break;
            case 'PATCH':
                return [
                    'purchase_lists.*.id' => [
                        'integer',
                        Rule::exists('purchase_lists', 'id')
                    ],
                    'purchase_lists.*.combinations_id' => [
                        'integer',
                        Rule::exists('combinations', 'id'),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);

                            //表单数据是否匹配 list里面是否存在重复的sku
                            if (collect($this->purchase_lists)->where('combinations_id',$value)->count() > 1) {
                                return $fail('存在重复数据');
                            }

                            //模型数据是否匹配
                            //是否存id
                            if ($id = $this->purchase_lists[$ex[1]]['id'] ?? null)
                                //存在id则判断数据是否合法
                                if($this->purchase->purchaseLists->find($this->purchase_lists[$ex[1]]['id'])->combinations_id == $value)
                                    return true;

                            if($this->purchase->purchaseLists->where('combinations_id',$value)->count()){
                                return $fail('模型数据不配');
                            }

                            return true;
                        }
                    ],
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

            'purchase_lists.*.combinations_id.required' => '组合id必填',
            'purchase_lists.*.combinations_id.integer' => '组合id必须int类型',
            'purchase_lists.*.combinations_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'purchase_lists.*.remark.string' => '备注必须string类型',
            'purchase_lists.*.remark.nullable' => '备注可为null',
            'purchase_lists.*.remark.max' => '备注最大长度为255',

            'commodity_code.string' => '产品编码必须string类型',
            'commodity_code.max' => '产品编码最大长度为255',
        ];
    }

    public
    function attributes()
    {
        return [
            'combinations_id' => '组合id',
            'remark' => '备注',
            'commodity_code' => '产品编码',
        ];
    }
}
