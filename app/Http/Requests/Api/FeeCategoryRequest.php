<?php

namespace App\Http\Requests\Api;


class FeeCategoryRequest extends FormRequest
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
                    'name' => 'required|string'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
                    'id' => 'exists:fee_categories'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '费用类别名称必填',
            'name.string' => '费用类别名称必须string类型',
            'id.exists' => '需要更改的数据id在数据库中未找到'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '费用类别名称'
        ];
    }

}
