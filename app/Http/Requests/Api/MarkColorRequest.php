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
        switch ($this->method()) {
            case 'POST':
                return [
                    'markcode' => 'required|string|between:5,32',
                    'markname' => 'required|string|max:255',
                    'color' => 'required|string|max:255',
                    'description' => 'string|nullable|max:255',
                    'status' => 'string|nullable|max:255'
                ];
                break;
            case 'PATCH':
                return [
                    'markcode' => 'string|between:5,32',
                    'markname' => 'string|max:255',
                    'color' => 'string|max:255',
                    'description' => 'string|nullable|max:255',
                    'status' => 'string|nullable|max:255'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'markcode.required' => '标记代码必填',
            'markcode.string' => '标记代码必须string类型',
            'markcode.between' => '标记代码长度[5-32]',
            'markname.required' => '标记名称必填',
            'markname.string' => '标记名称必须string类型',
            'markname.max' => '标记名称最大长度为255',
            'color.required' => '颜色必填',
            'color.string' => '颜色必须string类型',
            'color.max' => '颜色最大长度为255',
            'description.string' => '标记描述必须string类型',
            'description.nullable' => '标记描述可为null',
            'description.max' => '标记描述最大长度为255',
            'status.string' => '标记状态必须string类型',
            'status.nullable' => '标记状态可为null',
            'status.max' => '标记状态最大长度为255'
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
