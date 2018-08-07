<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class SearchGoodsRequest extends FormRequest
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
                        'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'spec_code' => 'string|max:255',
                    'commodity_code' => 'string|max:255',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'shops_id.integer' => '店铺id必须int类型',
            'shops_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'spec_code.string' => '规格编码必须string类型',
            'spec_code.max' => '规格编码最大长度为255',

            'commodity_code.string' => '商品编码必须string类型',
            'commodity_code.max' => '商品编码最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'shops_id' => '店铺id',
            'spec_code' => '规格编码',
            'commodity_code' => '商品编码',
        ];
    }
}
