<?php

namespace App\Http\Requests\Api;

class EditStatuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
                return [
                    'ids' => 'required|string',
                    'status' => 'required|boolean'
                ];
                break;
            default:
                return [];
                break;
        }
    }

    public function messages()
    {
        return [
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型',
            'status.boolean' => '状态必须布尔类型',
            'status.required' => '状态必填',
        ];
    }

    public function attributes()
    {
        return [
            'ids' => 'id组',
        ];
    }

}
