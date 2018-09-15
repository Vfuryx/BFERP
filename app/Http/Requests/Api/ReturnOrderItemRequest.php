<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class ReturnOrderItemRequest extends FormRequest
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
                ];
                break;
            case 'POST':
                return [
                    'return_order_items.*.order_items_id' => [
                        'sometimes','integer',
                        Rule::exists('order_items', 'id'),
                        function($attribute, $value, $fail) {
                            if(\App\Models\OrderItem::query()->findOrFail($value)->Order->id != $this->orders_id)
                                return $fail('子订单id不属于这个主订单');

                            return true;
                        }
                    ],
                    'return_order_items.*.suppliers_id' => [
                        'sometimes','integer',
                        Rule::exists('suppliers', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'return_order_items.*.is_damage' => 'sometimes|boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'return_order_items.*.id' => [
                        'sometimes','required','integer',
                        Rule::exists('return_order_items', 'id'),
                        function($attribute, $value, $fail) {
                            if(!$this->returnorder->returnOrderItem()->where('id',(int)$value)->count())
                                return $fail('子订单id不属于这个主订单');

                            return true;
                        }
                    ],
                    'return_order_items.*.order_items_id' => [
                        'sometimes','integer',
                        Rule::exists('order_items', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'return_order_items.*.suppliers_id' => [
                        'sometimes','integer',
                        Rule::exists('suppliers', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'return_order_items.*.is_damage' => 'boolean',
                ];
                break;
            case 'PUT':
                if($this->route()->getActionMethod() == 'isTwoAudit'){
                    return [
                        'return_order_items.*.id' => [
                            'required','integer',
                            Rule::exists('return_order_items', 'id'),
                            function($attribute, $value, $fail) {
                                if(!$this->returnorder->returnOrderItem()->where('id',(int)$value)->count())
                                    return $fail('子订单id不属于这个主订单');

                                return true;
                            }
                        ],
                        'return_order_items.*.suppliers_id' => [
                            'required', 'integer',
                            Rule::exists('suppliers', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                    ];
                }
                if($this->route()->getActionMethod() == 'isWhAudit'){
                    return [
                        'return_order_items.*.id' => [
                            'required','integer',
                            Rule::exists('return_order_items', 'id'),
                            function($attribute, $value, $fail) {
                                if(!$this->returnorder->returnOrderItem()->where('id',(int)$value)->count())
                                    return $fail('子订单id不属于这个主订单');

                                return true;
                            }
                        ],
                        'return_order_items.*.suppliers_id' => [
                            'required', 'integer',
                            Rule::exists('suppliers', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'return_order_items.*.receipt_types_id' => [
                            'required', 'integer',
                            Rule::exists('receipt_types', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'return_order_items.*.is_damage' => [
                            'boolean',
                        ],
                    ];
                }
                if($this->route()->getActionMethod() == 'isStockSubmit'){
                    return [
                        'return_order_items.*.id' => [
                            'required','integer',
                            Rule::exists('return_order_items', 'id'),
                            function($attribute, $value, $fail) {
                                if(!$this->returnorder->returnOrderItem()->where('id',(int)$value)->count())
                                    return $fail('子订单id不属于这个主订单');

                                return true;
                            }
                        ],
                        'return_order_items.*.suppliers_id' => [
                            'integer',
                            Rule::exists('suppliers', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'return_order_items.*.receipt_types_id' => [
                            'integer',
                            Rule::exists('receipt_types', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'return_order_items.*.is_damage' => [
                            'boolean',
                        ],
                        'return_order_items.*.repair_price' => [
                            'numeric',
                        ],
                        'return_order_items.*.factory_return_time' => [
                            'date',
                        ],
                        'return_order_items.*.expected_return_time' => [
                            'date',
                        ],
                        'return_order_items.*.warehouse_id' => [
                            'required', 'integer',
                            Rule::exists('warehouses', 'id')->where(function ($query) {
                                $query->where('status', 1);
                            }),
                        ],
                        'return_order_items.*.remark' => [
                            'string', 'max:255'
                        ],

                    ];
                }
                break;
        }
    }

    public function messages()
    {
        return [
            'return_order_items.*.id.integer' => '退货子单id必须int类型',
            'return_order_items.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'return_order_items.*.order_items_id.integer' => '子订单id必须int类型',
            'return_order_items.*.order_items_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'return_order_items.*.suppliers_id.integer' => '供应商id必须int类型',
            'return_order_items.*.suppliers_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'return_order_items.*.is_damage' => '是否损坏必须布尔类型',

            'return_order_items.*.receipt_types_id.integer' => '收货类型id必须int类型',
            'return_order_items.*.receipt_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'return_order_items.*.repair_price.numeric' => '返修价格必须是数字',

            'return_order_items.*.factory_return_time.date' => '退厂时间必须是日期类型',

            'return_order_items.*.expected_return_time.date' => '预计返还时间必须是日期类型',

            'return_order_items.*.warehouse_id.required' => '收货仓库id必填',
            'return_order_items.*.warehouse_id.integer' => '收货仓库id必须int类型',
            'return_order_items.*.warehouse_id.exists' => '需要添加的id在数据库中未找到或未启用',


        ];
    }

    public function attributes()
    {
        return [
            'order_items_id' => '子订单id',
            'suppliers_id' => '供应商id',
            'is_damage' => '是否损坏',
            'receipt_types_id' => '收货类型id',

            'repair_price' => '返修价格',
            'factory_return_time' => '退厂时间',
            'expected_return_time' => '预计返还时间',
            'warehouse_id' => '收货仓库',
            'remark' => '备注',

        ];
    }
}
