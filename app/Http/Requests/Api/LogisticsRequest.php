<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class LogisticsRequest extends FormRequest
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
                    'code' => 'required|string|max:255|unique:logistics',
                    'name' => 'required|string|max:255',
                    'report_id' =>  [
                        'required','integer',
                        Rule::exists('print_reports','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'logistics_area_id' =>  [
                        'required','integer',
                        Rule::exists('logistics_areas','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'expected_days' => 'required|integer',
                    'phone' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'freight_type_id' => [
                        'required','integer',
                        Rule::exists('freight_types','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
                    'code' => [
                        'string','max:255',
                        Rule::unique('logistics')->ignore($this->logistics->id),
                    ],
                    'name' => 'string|max:255',
                    'report_id' =>  [
                        'integer',
                        Rule::exists('print_reports','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'logistics_area_id' =>  [
                        'integer',
                        Rule::exists('logistics_areas','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'expected_days' => 'integer',
                    'phone' => 'string|max:255',
                    'address' => 'string|max:255',
                    'freight_type_id' => [
                        'integer',
                        Rule::exists('freight_types','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer'
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
            'code.required' => '物流代码必填',
            'code.string' => '物流代码必须string类型',
            'code.max' => '物流代码最大长度为255',
            'code.unique' => '物流代码不能重复',

            'name.required' => '物流名称必填',
            'name.max' => '物流名称最大长度为255',
            'name.string' => '物流名称必须string类型',

            'report_id.required' => '报表格式id必填',
            'report_id.integer' => '报表格式id必须int类型',
            'report_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'logistics_area_id.required' => '物流区域id必填',
            'logistics_area_id.integer' => '物流区域id必须int类型',
            'logistics_area_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'expected_days.required' => '预计天数必填',
            'expected_days.integer' => '预计天数必须int类型',

            'phone.required' => '物流电话必填',
            'phone.string' => '物流电话必须string类型',
            'phone.max' => '物流电话最大长度为255',

            'address.required' => '物流地址必填',
            'address.string' => '物流地址必须string类型',
            'address.max' => '物流地址最大长度为255',

            'freight_type_id.required' => '运费类型id必填',
            'freight_type_id.integer' => '运费类型id必须int类型',
            'freight_type_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'remark.string' => '费用类别备注必须string类型',
            'remark.nullable' => '费用类别备注可为null',
            'remark.max' => '费用类别备注最大长度为255',

            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型'
        ];
    }

    public function attributes()
    {
        return [
            'code' => '物流代码',
            'name' => '物流名称',
            'report_id' => '报表格式id',
            'logistics_area_id' => '物流区域id',
            'expected_days' => '预计天数',
            'phone' => '物流电话',
            'address' => '物流地址',
            'freight_type_id' => '运费类型id',
            'remark' => '备注',
            'status' => '状态'
        ];
    }

}
