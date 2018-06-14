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
        switch ($this->method()) {
            case 'POST':
                return [
                    'markcode' => 'required|string|max:255|unique:mark_colors',
                    'markname' => 'required|string|between:5,32',
                    'color' => 'required|string|max:255',
                    'description' => 'string|nullable|max:255',
                    'status' => 'required|boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'markcode' => 'string|max:255|unique:mark_colors',
                    'markname' => 'string|between:5,32',
                    'color' => 'string|max:255',
                    'description' => 'string|nullable|max:255',
                    'status' => 'boolean',
                    'id'=>'exists:mark_colors'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'markcode.required' => '标记代码必填',
            'markcode.string' => '标记代码必须string类型',
            'markcode.max' => '标记代码最大长度为255',
            'markcode.unique' => '标记代码不能重复',
            'markname.required' => '标记名称必填',
            'markname.string' => '标记名称必须string类型',
            'markname.between' => '标记名称长度[5-32]',
            'color.required' => '颜色必填',
            'color.string' => '颜色必须string类型',
            'color.max' => '颜色最大长度为255',
            'description.string' => '标记描述必须string类型',
            'description.nullable' => '标记描述可为null',
            'description.max' => '标记描述最大长度为255',
            'status.required' => '状态必填',
            'status.boolean' => '状态必须布尔类型',
            'id.exists'=>'需要更改的数据id在数据库中未找到'
        ];
    }

    public function attributes()
    {
        return [
            'markcode' => '标记代码',
            'markname' => '标记名称',
            'color' => '颜色',
            'description' => '标记描述',
            'status' => '标记状态'
        ];
    }
}
