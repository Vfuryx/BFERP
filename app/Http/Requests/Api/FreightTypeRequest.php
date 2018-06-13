<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FreightTypeRequest extends FormRequest
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
                    'name' => 'required|string|between:5,32',
                    'is_default' => 'required|boolean'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|between:5,32',
                    'is_default' => 'boolean'
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
            'is_default.boolean' => '是否默认必须尔类型',
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
