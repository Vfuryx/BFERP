<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class SaveableProductRequest extends FormRequest
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
                    'warehouses_id' => [
                        'required','integer',
                        Rule::exists('warehouses','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'warehouses_id.required' => '仓库id必填',
            'warehouses_id.integer' => '仓库id必须int类型',
            'warehouses_id.exists' => '需要添加的id在数据库中未找到或未启用',
        ];
    }

    public function attributes()
    {
        return [
            'warehouses_id' => '仓库id',
        ];
    }

}
