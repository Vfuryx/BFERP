<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class SeriesRequest extends FormRequest
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
                    'suppliers_id' => [
                        'required','integer',
                        Rule::exists('suppliers','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'code' => 'required|string|max:255|unique:series',
                    'name' => 'required|string|max:255',
                    'description' => 'string|nullable|max:255',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'suppliers_id' => [
                        'required','integer',
                        Rule::exists('suppliers','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'code' => [
                        'string','max:255',
                        Rule::unique('series')->ignore($this->series->id),
                    ],
                    'name' => 'required|string|max:255',
                    'description' => 'string|nullable|max:255',
                    'remark' => 'string|nullable|max:255',
                    'status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'suppliers_id.required' => '供应商id必填',
            'suppliers_id.integer' => '供应商id必须int类型',
            'suppliers_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'code.required' => '系列代码必填',
            'code.string' => '系列代码必须string类型',
            'code.max' => '系列代码最大长度为255',
            'code.unique' => '系列代码不能重复',
            
            'name.required' => '系列名称必填',
            'name.max' => '系列名称最大长度为255',
            'name.string' => '系列名称必须string类型',

            'description.string' => '系列描述必须string类型',
            'description.nullable' => '系列描述可为null',
            'description.max' => '系列描述最大长度为255',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'status.required' => '状态必填',
            'status.boolean' => '状态必须布尔类型',
        ];
    }

    public function attributes()
    {
        return [
            'suppliers_id' => '供应商id',
            'code' => '系列代码',
            'name' => '系列名称',
            'description' => '系列描述',
            'remark' => '备注',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
