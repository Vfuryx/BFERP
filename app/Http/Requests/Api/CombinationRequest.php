<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class CombinationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [

                ];
                break;
            case 'POST':
                return [
                    'pid' => [
                        'required', 'integer',
                        Rule::exists('products', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'name' => 'required|string|max:255|unique:combinations',
                    'product_components.*' => [
                        'integer',
                        Rule::exists('product_components', 'id'),
                        function ($attribute, $value, $fail) {

                            $productComponent = \App\Models\ProductComponent::query()->findOrFail($value);
                            //判断子件是否属于这个产品 或 是通用子件
                            if ($this->pid == $productComponent->pid || $productComponent->is_common) {

                                return true;
                            }
                            return $fail('子件不是通用组件 或 不属于这个产品');
                        },
                    ],
                ];
                break;
            case 'PATCH':
                return [
                    'pid' => [
                        'integer',
                        Rule::exists('products', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'name' => [
                        'string', 'max:255',
                        Rule::unique('combinations')->ignore($this->combination->id),
                    ],
                    'product_components.*' => [
                        'integer',
                        Rule::exists('product_components', 'id'),
                        function ($attribute, $value, $fail) {

                            $productComponent = \App\Models\ProductComponent::query()->findOrFail($value);
                            //判断子件是否属于这个产品 或 是通用子件
                            if ($this->pid == $productComponent->pid || $productComponent->is_common) {

                                return true;
                            }
                            return $fail('子件不是通用组件 或 不属于这个产品');
                        },
                    ],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'pid.required' => '产品id必填',
            'pid.integer' => '产品id必须int类型',
            'pid.exists' => '需要添加的id在数据库中未找到或未启用',

            'name.required' => '组合名称必填',
            'name.string' => '组合名称必须string类型',
            'name.max' => '组合名称最大长度为255',
            'name.unique' => '组合名称不能重复',

            'product_components.*.required' => '子件id必填',
            'product_components.*.integer' => '子件id必须int类型',
            'product_components.*.exists' => '需要添加的id在数据库中未找到或未启用',
        ];
    }

    public function attributes()
    {
        return [
            'pid' => '产品id',
            'name' => '组合名称',
            'product_components.*' => '子件id',
        ];
    }

}
