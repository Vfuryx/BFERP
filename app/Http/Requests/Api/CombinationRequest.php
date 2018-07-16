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
                    'status' => 'integer'
                ];
                break;
            case 'POST':
                return [
                    'product_specs_id' => [
                        'required','integer',
                        Rule::exists('product_specs','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'com_pro_specs_id' => [
                        'required','integer',
                        Rule::exists('product_specs','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'count' => 'required|integer',
                    'status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
                    'product_specs_id' => [
                        'integer',
                        Rule::exists('product_specs','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'com_pro_specs_id' => [
                        'integer',
                        Rule::exists('product_specs','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'count' => 'integer',
                    'status' => 'integer',

                ];
                break;
            case 'DELETE':
                return [
                    'ids' => 'required|string',
                ];
                break;
            case 'PUT':
                return [
                    'ids' => 'required|string',
                    'status' => 'required|integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [

            'product_specs_id.required' => '产品规格id必填',
            'product_specs_id.integer' => '产品规格id必须int类型',
            'product_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'com_pro_specs_id.required' => '组合产品规格id必填',
            'com_pro_specs_id.integer' => '组合产品规格id必须int类型',
            'com_pro_specs_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'count.required' => '组合件数必填',
            'count.integer' => '组合件数必须int类型',

            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型',
            'status.integer' => '状态必须int类型',
            'status.required' => '状态必填'
        ];
    }

    public function attributes()
    {
        return [
            'product_specs_id' => '产品规格id',
            'com_pro_specs_id' => '组合产品规格id',
            'count' => '组合件数',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
