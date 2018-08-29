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
                    'status' => 'boolean',
                    'is_submit' => 'boolean',
                    'is_audit' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'is_submit.boolean' => '是否提交必须布尔类型',

            'is_audit.boolean' => '是否审核必须布尔类型',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'status.boolean' => '状态必须布尔类型',
        ];
    }

    public function attributes()
    {
        return [
            'is_submit' => '是否提交',
            'is_audit' => '是否审核',
            'remark' => '采购退货单备注',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
