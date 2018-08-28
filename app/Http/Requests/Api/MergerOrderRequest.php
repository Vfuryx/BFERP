<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class MergerOrderRequest extends FormRequest
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
                    'order_id_one' => [
                        'required', 'integer',
                        Rule::exists('orders', 'id')->where(function ($query) {
                            $query->where('status', 1)->where('order_status', '<=', \App\Models\Order::ORDER_STATUS_FD_AUDIT);
                        }),
                        function($attribute, $value, $fail) {
                            //判断id是否重复
                            if ($this->order_id_one == $this->order_id_two){
                                return $fail('id不能重复');
                            }
                            return true;
                        }
                    ],
                    'order_id_two' => [
                        'required', 'integer',
                        Rule::exists('orders', 'id')->where(function ($query) {
                            $query->where('status', 1)->where('order_status', '<=', \App\Models\Order::ORDER_STATUS_FD_AUDIT);
                        }),
                    ]
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'order_id_one.required' => '订单一必填',
            'order_id_one.integer' => '订单一必须int类型',
            'order_id_one.exists' => '需要添加的id在数据库中未找到或未启用或已财审',

            'order_id_two.required' => '订单二必填',
            'order_id_two.integer' => '订单二必须int类型',
            'order_id_two.exists' => '需要添加的id在数据库中未找到或未启用或已财审',
        ];
    }

    public function attributes()
    {
        return [
            'order_id_one' => '订单一',
            'order_id_two' => '订单二'
        ];
    }
}
