<?php

namespace App\Http\Requests\Api;


class StorageTypeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|between:5,32'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|between:5,32',
                    'id'=>'exists:storage_types'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '入库类型名称必填',
            'name.between' => '入库类型名称长度[5-32]',
            'name.string' => '入库类型名称必须string类型',
            'id.exists'=>'需要更改的数据id在数据库中未找到'  
        ];
    }

    public function attributes()
    {
        return [
            'name' => '入库类型名称'
        ];
    }

}
