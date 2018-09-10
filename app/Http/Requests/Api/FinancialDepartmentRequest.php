<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;
use App\Models\Order;

class FinancialDepartmentRequest extends FormRequest
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
                    'order_status' => [
                        'nullable', 'in:'.Order::ORDER_STATUS_FD_AUDIT.','.Order::ORDER_STATUS_ONE_AUDIT
                    ],
                    'status' => [
                        'nullable', 'boolean'
                    ]
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'order_status.in' => '订单状态不是给定的数值',
            'order_status.boolean' => '状态必须为布尔类型',
        ];
    }

    public function attributes()
    {
        return [
            'order_status' => '订单状态',
            'status' => '状态',
        ];
    }
}
