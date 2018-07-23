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
                    'status' => 'integer'
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
