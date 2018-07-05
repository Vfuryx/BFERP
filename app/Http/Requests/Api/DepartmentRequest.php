<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;
use App\Models\Department;

class DepartmentRequest extends FormRequest
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
                    'dept_no' => 'required|string|max:255|unique:departments',
                    'name' => 'required|string|max:255',
                    'p_dept' =>  [
                        'required', 'integer',
                        function($attribute, $value, $fail) {
                            if ($value === '0' || Department::whereId($value)->where('status',1)->where('is_verify',1)->count()) { 
                                return true;
                            }
                            return $fail('需要添加的id在数据库中未找到或未启用或未验证');
                        },
                    ],
                    'remark' => 'string|nullable|max:255',
                    'is_verify' => 'integer',
                    'status' => 'integer',
                ];
                break;
            case 'PATCH':
                return [
                    'dept_no' => [
                        'string','max:255',
                        Rule::unique('departments')->ignore($this->department->id),
                   ],
                    'name' => 'string|max:255',
                    'p_dept' =>  [
                        'integer',
                        function($attribute, $value, $fail) {
                            if ($value === '0' || Department::whereId($value)->where('status',1)->count()) { 
                                return true;
                            }
                            return $fail('需要添加的id在数据库中未找到或未启用或未验证');
                        },
                    ],
                    'remark' => 'string|nullable|max:255',
                    'is_verify' => 'integer',
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
            'dept_no.required' => '部门代码必填',
            'dept_no.string' => '部门代码必须string类型',
            'dept_no.max' => '部门代码最大长度为255',
            'dept_no.unique' => '部门代码不能重复',

            'name.required' => '部门名称必填',
            'name.max' => '部门名称最大长度为255',
            'name.string' => '部门名称必须string类型',
            
            'p_dept.required' => '所属主部门id必填',
            'p_dept.integer' => '所属主部门必须int类型',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',
            
            'is_verify.integer' => '是否验证必须int类型',

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
            'dept_no' => '部门代码',
            'name' => '部门名称',
            'p_dept' => '所属主部门',
            'remark' => '备注',
            'is_verify' => '是否验证',
            'status' => '状态',
        ];
    }

}
