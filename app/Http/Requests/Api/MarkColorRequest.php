<?php

namespace App\Http\Requests\Api;

use Log;
use Illuminate\Validation\Rule;

class MarkColorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Log::info($this);
        switch ($this->method()) {
            case 'GET':
                return [
                    'status' => 'integer'
                ];
                break;
            case 'POST':
                return [
                    'markcode' => 'required|string|max:255|unique:mark_colors',
                    'markname' => 'required|string',
                    'color' => 'required|string|max:255',
                    'description' => 'string|nullable|max:255',
                    'status' => 'integer',
                ];
                break;
            case 'PATCH':
                return [
                    'markcode' => [
                        'string', 'max:255',
                        Rule::unique('mark_colors')->ignore($this->markcolor->id),
                    ],
                    'markname' => 'string',
                    'color' => 'string|max:255',
                    'description' => 'string|nullable|max:255',
                    'status' => 'integer',
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
            'color.required' => '颜色必填',
            'color.string' => '颜色必须string类型',
            'color.max' => '颜色最大长度为255',
            'description.string' => '标记描述必须string类型',
            'description.nullable' => '标记描述可为null',
            'description.max' => '标记描述最大长度为255',
            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
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
