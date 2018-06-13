<?php

namespace App\Http\Requests\Api;

class MarkColorRequest extends FormRequest
{
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
                    'id'=>'exists:mark_colors'
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
            'id.exists'=>'需要更改的数据id在数据库中未找到',
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
