<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class GoodsDownloadRequest extends FormRequest
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
                    'shop_id' => [
                        'required','integer',
                        Rule::exists('shops','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'dl_type' => "required|string|max:255|in:seller,inventory",
                    'commodity_code' => "string|max:255"
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'shop_id.required' => '店铺id必填',
            'shop_id.integer' => '店铺id必须int类型',
            'shop_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'dl_type.required' => '下载类型必填',
            'dl_type.string' => '下载类型必须string类型',
            'dl_type.max' => '下载类型最大长度为255',
            'dl_type.in' => '下载类型必须包含给定的值',

            'commodity_code.string' => '商品编码必须string类型',
            'commodity_code.max' => '商品编码最大长度为255',
        ];
    }

    public function attributes()
    {
        return [
            'shop_id' => '店铺id',
            'dl_type' => '下载类型 seller在售商品，inventory库存商品',
            'commodity_code' => '商品编码',
        ];
    }
}
