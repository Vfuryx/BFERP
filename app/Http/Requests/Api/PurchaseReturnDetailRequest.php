<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class PurchaseReturnDetailRequest extends FormRequest
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
                    'purchase_return_details.*.stocks_id' => [
                    'required', 'integer',
                        Rule::exists('stocks', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_return_details.*.purchase_return_quantity' => 'required|integer|min:1',
                    'purchase_return_details.*.suppliers_id' => [
                        'required', 'integer',
                        Rule::exists('suppliers', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_return_details.*.price_differences' => 'required|numeric',
                    'purchase_return_details.*.purchase_return_types_id' =>  [
                        'required', 'integer',
                        Rule::exists('purchase_return_types', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                ];
                break;
            case 'PATCH':
                return [
                    'purchase_return_details.*.id.'=>[
                        'integer',
                        Rule::exists('purchase_return_details', 'id')
                    ],
                    'purchase_return_details.*.stocks_id' => [
                        'integer',
                        Rule::exists('stocks', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_return_details.*.purchase_return_quantity' => 'integer|min:1',
                    'purchase_return_details.*.suppliers_id' => [
                        'integer',
                        Rule::exists('suppliers', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'purchase_return_details.*.price_differences' => 'numeric',
                    'purchase_return_details.*.purchase_return_types_id' =>  [
                        'integer',
                        Rule::exists('purchase_return_types', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'purchase_return_details.*.id.required' => '采购退货详情必填',
            'purchase_return_details.*.id.integer' => '采购退货详情必须int类型',
            'purchase_return_details.*.id.exists' => '需要添加的id在数据库中未找到或未启用或已完成',

            'purchase_return_details.*.stocks_id.required' => '库存id必填',
            'purchase_return_details.*.stocks_id.integer' => '库存id必须int类型',
            'purchase_return_details.*.stocks_id.exists' => '需要添加的id在数据库中未找到或未启用或已完成',

            'purchase_return_details.*.purchase_return_quantity.required' => '采购退货数必填',
            'purchase_return_details.*.purchase_return_quantity.integer' => '采购退货数必须int类型',
            'purchase_return_details.*.purchase_return_quantity.min' => '采购退货数不少于1',

            'purchase_return_details.*.suppliers_id.required' => '供应商id必填',
            'purchase_return_details.*.suppliers_id.integer' => '供应商id必须int类型',
            'purchase_return_details.*.suppliers_id.exists' => '需要添加的id在数据库中未找到或未启用或已完成',

            'purchase_return_details.*.price_differences.required' => '差价必填',
            'purchase_return_details.*.price_differences.numeric' => '差价必须是数字',

            'purchase_return_details.*.purchase_return_types_id.required' => '采购退货类型id必填',
            'purchase_return_details.*.purchase_return_types_id.integer' => '采购退货类型id必须int类型',
            'purchase_return_details.*.purchase_return_types_id.exists' => '需要添加的id在数据库中未找到或未启用或已完成',

        ];
    }

    public function attributes()
    {
        return [
            'stocks_id' => '库存id',
            'purchase_return_quantity' => '采购退货数',
            'suppliers_id' => '供应商id',
            'price_differences' => '差价',
            'purchase_return_types_id' => '采购退货类型id',
        ];
    }

}
