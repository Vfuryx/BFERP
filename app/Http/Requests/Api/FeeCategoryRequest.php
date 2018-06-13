<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FeeCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
                    'name' => 'string|between:5,32'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '费用类别名称必填',
            'name.between' => '费用类别名称长度[5-32]位',
            'name.string' => '费用类别名称必须string类型'   
        ];
    }

    public function attributes()
    {
        return [
            'name' => '费用类别名称'
        ];
    }

}
