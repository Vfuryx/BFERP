<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class CancelPurchaseRequest extends FormRequest
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
                    'is_submit' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'purchases_id' => [
                        'required', 'integer',
                        Rule::exists('purchases', 'id')->where(function($query) {
                            $query->where('status', 1)->whereIn('purchase_status', [
                                \App\Models\Purchase::PURCHASE_STATUS_SECTION,
                                \App\Models\Purchase::PURCHASE_STATUS_NEW
                            ])->where('is_audit',1);
                        }),
                    ],
                ];
                break;
            case 'PATCH':
                return [
                    'purchases_id' => [
                        'integer',
                        Rule::exists('purchases', 'id')->where(function($query) {
                            $query->where('status', 1)->whereIn('purchase_status', [
                                \App\Models\Purchase::PURCHASE_STATUS_SECTION,
                                \App\Models\Purchase::PURCHASE_STATUS_NEW
                            ])->where('is_audit',1);
                        }),
                    ],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'purchases_id.required' => '采购单id必填',
            'purchases_id.integer' => '采购单id必须int类型',
            'purchases_id.exists' => '需要添加的id在数据库有可能未找到、未启用、已完成、未审核',

            'status.boolean' => '状态必须布尔类型',
        ];
    }

    public function attributes()
    {
        return [
            'purchases_id' => '采购单id',
        ];
    }

}
