<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class SearchProductRequest extends FormRequest
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
                    'shops_id' => [
                        'nullable',
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'component_code' => 'nullable|string|max:255',
                    'commodity_code' => 'nullable|string|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'shops_id.integer' => '店铺id必须int类型',
            'shops_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'component_code.string' => '子件编码必须string类型',
            'component_code.max' => '子件编码最大长度为255',

            'commodity_code.string' => '商品编码必须string类型',
            'commodity_code.max' => '商品编码最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'shops_id' => '店铺id',
            'component_code' => '子件编码',
            'commodity_code' => '商品编码',
        ];
    }
}
