<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class SplitOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
                return [
                    'order_items.*.id' => [
                        'integer',
                        Rule::exists('payment_details', 'id'),
                        function($attribute, $value, $fail) {
                            if ($this->order->orderItems->where('id',(int)$value)->count()){
                                return true;
                            }
                            return $fail('子单不属于这个主订单');
                        }
                    ],
                    'order_items.*.quantity' => [
                        'required', 'numeric',
                        function($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);
                            if (
                                (int)$value > 0
                                &&
                                (int)$value <= optional($this->order->orderItems->where('id',(int)$this->order_items[$ex[1]]['id'])->first())->quantity
                            ){
                                return true;
                            }
                            return $fail('数量超出范围');
                        }
                    ]
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'order_items.*.id.integer' => '子单id必须int类型',
            'order_items.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'order_items.*.quantity.numeric' => '拆分数量必须是数字',
        ];
    }

    public function attributes()
    {
        return [
            'order_items_id' => '子单id',
            'quantity' => '拆分数量'
        ];
    }
}
