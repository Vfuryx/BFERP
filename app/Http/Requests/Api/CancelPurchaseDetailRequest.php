<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class CancelPurchaseDetailRequest extends FormRequest
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
                    'cancel_purchase_details.*.purchase_details_id' => [
                        'required', 'integer',
                        Rule::exists('purchase_details', 'id')->where(function($query) {
                            $query->whereIn('purchase_item_status', [
                                \App\Models\Purchase::PURCHASE_STATUS_SECTION,
                                \App\Models\Purchase::PURCHASE_STATUS_NEW
                            ]);
                        }),
                        function($attribute, $value, $fail) {
                            if(\App\Models\PurchaseDetail::query()->find($value)->purchaseList->purchase->id != $this->purchases_id)
                                return $fail('采购详情id不属于这个采购单');

                            if(!\App\Models\PurchaseDetail::query()->find($value)->purchaseList->purchase->is_audit)
                                return $fail('采购单未审核');

                            return true;
                        }
                    ],
                    'cancel_purchase_details.*.cancel_purchase_quantity' => [
                        'required', 'integer','min:1'
                    ],
                ];
                break;
            case 'PATCH':
                return [
                    'cancel_purchase_details.*.id' => [
                        'integer',
                        Rule::exists('cancel_purchase_details', 'id'),
                    ],
                    'cancel_purchase_details.*.purchase_details_id' => [
                        'integer',
                        Rule::exists('purchase_details', 'id')->where(function($query) {
                            $query->whereIn('purchase_item_status', [
                                \App\Models\Purchase::PURCHASE_STATUS_SECTION,
                                \App\Models\Purchase::PURCHASE_STATUS_NEW
                            ]);
                        }),
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            //表单数据是否匹配 cancel_purchase_details 是否存在重复数据
                            if (
                                collect($this->cancel_purchase_details[$ex[1]])
                                    ->where('purchase_details_id', $value)
                                    ->count() > 1
                            ) {
                                return $fail('存在重复数据');
                            }

                            //模型数据是否匹配
                            if(\App\Models\PurchaseDetail::query()->find($value)->purchaseList->purchase->id != $this->purchases_id)
                                return $fail('采购详情id不属于这个采购单');

                            if(\App\Models\PurchaseDetail::query()->find($value)->purchaseList->purchase->is_audit)
                                return $fail('采购单未审核');

                            //模型数据是否匹配
                            //是否存id
                            if ($id = $this->cancel_purchase_details[$ex[1]]['id'] ?? null)
                                if($this->cancelpurchase->cancelPurchaseDetails->find($this->cancel_purchase_details[$ex[1]]['id'])->purchase_details_id == $value)
                                    return true;

                                //前一个条件不合法 则 判断 stockInDetails 模型里面 是否已经存在
                            if(!$this->cancelpurchase->cancelPurchaseDetails->where('product_components_id', $value)->count()) {
                                return $fail('模型数据不匹配');
                            }

                            return true;
                        }
                    ],
                    'cancel_purchase_details.*.cancel_purchase_quantity' => [
                        'integer','min:1'
                    ],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'cancel_purchase_details.*.id.required' => '取消采购id必填',
            'cancel_purchase_details.*.id.integer' => '取消采购id必须int类型',
            'cancel_purchase_details.*.id.exists' => '需要添加的id在数据库中未找到或未启用或已完成',

            'cancel_purchase_details.*.purchase_details_id.required' => '采购详细id必填',
            'cancel_purchase_details.*.purchase_details_id.integer' => '采购详细id必须int类型',
            'cancel_purchase_details.*.purchase_details_id.exists' => '需要添加的id在数据库中未找到或未启用或已完成',

            'cancel_purchase_details.*.cancel_purchase_quantity.required' => '取消采购数必填',
            'cancel_purchase_details.*.cancel_purchase_quantity.integer' => '取消采购数必须int类型',
            'cancel_purchase_details.*.cancel_purchase_quantity.min' => '取消采购数不少于1',
        ];
    }

    public function attributes()
    {
        return [
            'purchases_id' => '采购单id',
            'cancel_purchase_quantity' => '取消采购数'
        ];
    }

}
