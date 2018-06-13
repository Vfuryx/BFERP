<?php

namespace App\Http\Requests\Api;


class DistributionMethodRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|between:5,32'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|between:5,32',
                    'id'=>'exists:distribution_methods'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => '配送方式名称必填',
            'name.between' => '配送方式名称长度[5-32]位',
            'name.string' => '配送方式名称必须string类型',
            'id.exists'=>'需要更改的数据id在数据库中未找到',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '配送方式名称'
        ];
    }


}
