<?php

namespace App\Http\Requests\Api;


class FreightTypeRequest extends FormRequest
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
                    'name' => 'required|string|between:5,32',
                    'is_default' => 'required|boolean'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|between:5,32',
                    'is_default' => 'boolean',
                    'id'=>'exists:freight_types'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '运费名称必填',
            'name.string' => '运费名称必须string类型',
            'name.between' => '运费名称长度[5-32]',
            'is_default.required' => '是否默认必填',
            'is_default.boolean' => '是否默认必须布尔类型',
            'id.exists'=>'需要更改的数据id在数据库中未找到'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '运费名称',
            'is_default' => '是否默认'
        ];
    }
}
