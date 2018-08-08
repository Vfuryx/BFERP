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
                    'status' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'productspecs.*.combinations.*.com_pro_specs_id' => [
                        'required', 'integer',
                        Rule::exists('product_specs', 'id')->where(function ($query) {
                            $query->where('is_combination', '<>', 1);
                        }),
                    ]
                ];
                break;
            case 'PATCH':
                return [
                    'productspecs.*.combinations.*.id' => [
                        'integer',
                        Rule::exists('combinations', 'id')
                    ],
                    'productspecs.*.combinations.*.com_pro_specs_id' => [
                        'integer',
                        Rule::exists('product_specs', 'id')->where(function ($query) {
                            $query->where('is_combination', '<>', 1);
                        }),
                    ]
                ];
                break;
        }
    }

    public function messages()
    {
        return [

            'productspecs.*.combinations.*.id.required' => '组合id必填',
            'productspecs.*.combinations.*.id.integer' => '组合id必须int类型',
            'productspecs.*.combinations.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

//            'productspecs.*.combinations.*.product_specs_id.required' => '产品规格id必填',
//            'productspecs.*.combinations.*.product_specs_id.integer' => '产品规格id必须int类型',
//            'productspecs.*.combinations.*.product_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'productspecs.*.combinations.*.com_pro_specs_id.required' => '组合产品规格id必填',
            'productspecs.*.combinations.*.com_pro_specs_id.integer' => '组合产品规格id必须int类型',
            'productspecs.*.combinations.*.com_pro_specs_id.exists' => '需要添加的id在数据库中未找到或是组合',

        ];
    }

    public function attributes()
    {
        return [
            'product_specs_id' => '产品规格id',
            'com_pro_specs_id' => '组合产品规格id',
        ];
    }

}
