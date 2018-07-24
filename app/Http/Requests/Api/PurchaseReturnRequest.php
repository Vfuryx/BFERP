<?php

namespace App\Http\Requests\Api;

class PurchaseReturnRequest extends FormRequest
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
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer',
                ];
                break;
            case 'PATCH':
                return [
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'status.integer' => '状态必须int类型',
        ];
    }

    public function attributes()
    {
        return [
            'remark' => '采购退货单备注',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
