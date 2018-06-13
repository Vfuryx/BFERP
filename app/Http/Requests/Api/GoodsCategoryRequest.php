<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GoodsCategoryRequest extends FormRequest
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
                    'code' => 'required|string|max:255',
                    'status' => 'required|boolean',
                    'remark' => 'nullable|string|max:255',
                    'description' => 'nullable|string|max:255'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|between:5,32',
                    'code' => 'string|max:255',
                    'status' => 'boolean',
                    'remark' => 'nullable|string|max:255',
                    'description' => 'nullable|string|max:255'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '商品类别名称必填',
            'name.between' => '商品类别名称长度[5-32]',
            'name.string' => '商品类别名称必须string类型',
            'code.required' => '商品类别代码必填',
            'code.string' => '商品类别代码必须string类型',
            'code.max' => '商品类别代码最大长度为255',
            'status.required' => '状态必填',
            'status.boolean' => '状态必须尔类型',
            'remark.max' => '商品类别备注最大长度为255',
            'remark.nullable' => '商品类别备注可为null',
            'remark.string' => '商品类别备注必须string类型',
            'description.max' => '商品类别描述最大长度为255',
            'description.nullable' => '商品类别描述可为null',
            'description.string' => '商品类别描述必须string类型',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '商品类别名称',
            'code' => '商品类别代码',
            'status' => '商品类别状态',
            'remark' => '商品类别备注',
            'description' => '商品类别描述'
        ];
    }
}
