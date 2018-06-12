<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MarkColorRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST':
                return [
                    'markcode' => 'required|string|unique:mark_colors',
                    'markname' => 'required|string',
                    'color'=>'required|string',
                ];
                break;
            case 'PATCH':
                return [
                    'markcode' => 'string',
                    'markname' => 'string',
                    'color'=>'string',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'markcode.required' => '标记代码必填',
            'markcode.unique' => '标记代码不能重复',
            'markname.required' => '标记名称必填',
            'color.required'=>'颜色必填',
        ];
    }

    public function attributes()
    {
        return [
            'markcode' => '标记代码',
            'markname' => '标记名称',
            'color' => '颜色',
        ];
    }
}
