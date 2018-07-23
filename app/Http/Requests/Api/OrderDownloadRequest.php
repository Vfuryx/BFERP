<?php

namespace App\Http\Requests\Api;

use Carbon\Carbon;
use Illuminate\Validation\Rule;

class OrderDownloadRequest extends FormRequest
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
                        'required', 'integer',
                        Rule::exists('shops', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'start_created' => 'required|date|after:' . Carbon::now()->modify('-30 days')->toDateString() . '|before:' . Carbon::now()->tomorrow()->toDateString(),
                    'end_created' => 'required|date|after_or_equal:start_created|before:' . Carbon::now()->tomorrow()->toDateString(),
                    'buyer_nick' => "string|max:255",
                    'tid' => "integer"
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

            'start_created.required' => '起始日期必填',
            'start_created.date' => '起始日期必须日期类型',
            'start_created.after' => '起始日期必须必须是' . Carbon::now()->modify('-30 days')->toDateString() . '号后',
            'start_created.before' => '起始日期必须是' . Carbon::now()->tomorrow()->toDateString() . '号前',

            'end_created.required' => '结束日期必填',
            'end_created.date' => '结束日期必须日期类型',
            'end_created.after_or_equal' => '结束日期必须是等于 start_created 的日期之后的值',
            'end_created.before' => '结束日期必须是' . Carbon::now()->tomorrow()->toDateString() . '号前',

            'buyer_nick.string' => '买家昵称必须string类型',
            'buyer_nick.max' => '买家昵称最大长度为255',

            'tid.integer' => '交易编号必须int类型',
        ];
    }

    public function attributes()
    {

        return [
            'shop_id' => '店铺id',
            'start_created' => '起始日期',
            'end_created' => '结束日期',
            'buyer_nick' => '买家昵称',
            'tid' => '交易编号',
        ];
    }
}
