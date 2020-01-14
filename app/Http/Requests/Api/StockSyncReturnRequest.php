<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class StockSyncReturnRequest extends FormRequest
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
                    'order_status' => 'integer',
                ];
                break;
            case 'PUT':
                return [
                    'expected_arrival_time' => 'required|date',
                    'follow_up' => 'string|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'expected_arrival_time.required' => '预计到货时间必填',
            'expected_arrival_time.date' => '预计到货时间必须是时间类型',

            'follow_up.string' => '退款金额须string类型',
            'follow_up.max' => '退款金额最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'expected_arrival_time' => '预计到货时间',
            'follow_up' => '跟进记录',
        ];
    }
}
