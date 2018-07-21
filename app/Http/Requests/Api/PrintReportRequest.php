<?php

namespace App\Http\Requests\Api;

class PrintReportRequest extends FormRequest
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
                    'file' => 'required|string|max:255',
                    'name' => 'required|string|max:255',
                    'paper_format' => 'required|string|max:255',
                    'status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
                    'file' => 'string|max:255',
                    'name' => 'string|max:255',
                    'paper_format' => 'string|max:255',
                    'status' => 'integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'file.required' => '报表文件必填',
            'file.string' => '报表文件必须string类型',
            'file.max' => '报表文件最大长度为255',

            'name.required' => '报表名称必填',
            'name.string' => '报表名称必须string类型',
            'name.max' => '报表名称最大长度为255',

            'paper_format.required' => '报表格式必填',
            'paper_format.string' => '报表格式必须string类型',
            'paper_format.max' => '报表格式最大长度为255',

            'status.integer' => '状态必须int类型',
            'status.required' => '状态必填'
        ];
    }

    public function attributes()
    {
        return [
            'file' => '报表文件',
            'name' => '报表名称',
            'paper_format' => '报表格式',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
