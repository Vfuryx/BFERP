<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class StockInRequest extends FormRequest
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
                    'warehouse_id' => [
                        'required','integer',
                        Rule::exists('warehouses','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'stock_in_types_id' => [
                        'required','integer',
                        Rule::exists('stock_in_types','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'status' => 'integer',
                    'stock_in_details' => 'json'
                ];
                break;
            case 'PATCH':

                $publicRule = $this->publicRule($this->stockin->status == 1 && $this->stockin->is_submit == 0);
                return [
                    'warehouse_id' => [
                        'integer',
                        Rule::exists('warehouses','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                        $publicRule
                    ],
                    'stock_in_types_id' => [
                        'integer',
                        Rule::exists('stock_in_types','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                        $publicRule
                    ],
                    'status' => ['integer',$publicRule],
                    'stock_in_details' => ['json',$publicRule]
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'warehouse_id.required' => '仓库id必填',
            'warehouse_id.integer' => '仓库id必须int类型',
            'warehouse_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'stock_in_types_id.required' => '入库类型id必填',
            'stock_in_types_id.integer' => '入库类型id必须int类型',
            'stock_in_types_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'status.integer' => '状态必须int类型',
            'status.required' => '状态必填',

            'stock_in_details.json' => '入库单详情必须json类型'
        ];
    }

    public function attributes()
    {
        return [
            'stock_in_no' => '入库单号',
            'warehouse_id' => '仓库id',
            'stock_in_types_id' => '入库类型id',
            'creator' => '创建人',
            'submitter' => '提交人',
            'submit_at' => '提交时间',
            'checker' => '审核人',
            'check_at' => '审核时间',
            'warehouer' => '入库人',
            'stock_in_at' => '入库时间',
            'is_submit' => '是否提交',
            'is_check' => '是否审核',
            'is_stock_in' => '是否入库',
            'status' => '状态：0=停用，1=启用',
            'stock_in_details' => '入库单详情'
        ];
    }

    /**
     * 通用规则
     * @param bool $condition   判断的条件
     * @param string $text      返回的信息
     * @return \Closure         闭包
     */
    public function publicRule($condition = true, $text = '需要更改错误确认数据的准确性，例如数据是否已启用、不可修改')
    {
        return function($attribute, $value, $fail) use ($condition, $text) {
            if ($condition) {
                return true;
            }
            return $fail($text);
        };
    }

}
